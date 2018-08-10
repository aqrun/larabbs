<?php
namespace App\Handlers;

use Image;

class ImageUploadHandler
{
    // 只允许以下后缀文件名上传
    protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];
    
    public function save($file, $folder, $file_prefix, $max_width=false)
    {
        // 构建存储的文件夹规则 如： uploads/images/avatars/201709/21/
        // 文件夹切割能让查找更效率
        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());
        
        // 文件具体存储的物理路径 `public_path()` 获取的是 `public` 文件夹的物理位置
        // 值如： /home/.../larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;
        
        // 获取文件的后缀名 因图片从剪贴板里粘贴时后缀名为空，所以此处确保后缀名一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        
        // 拼接文件名， 加前缀是为了增加辨析度前缀可以是相关数据模型的 ID
        // 值如： 1_1324234_324234.png
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;
        
        // 如果上传的不是图片将终止操作
        if(!in_array($extension, $this->allowed_ext)) {
            return false;
        }
        
        // 将图片移动到我们的目标存储路径中
        $file->move($upload_path, $filename);
        
        // 如果限制了图片宽度就进行裁剪
        if($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path . '/' . $filename, $max_width);
        }
        
        return [
            'path' => "/$folder_name/$filename",
        ];
    }
    
    public function reduceSize($file_path, $max_width) 
    {
        // 先用文件物理路径实例化
        $image = Image::make($file_path);
        
        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {
            //设定宽度是$max_width 高度等比绽放
            $constraint->aspectRatio();
            
            // 防止裁图时图片变大
            $constraint->upsize();
        });
        
        //修改后保存
        $image->save();
    }
    
    
    
}