<?php
namespace App\Handlers;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

class ImageUploadHandler {

    protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save(UploadedFile $file, String $folder, $file_prefix, $max_width = false){
        // uploads/images/avatars/201709/21/

        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());
        $upload_path = public_path() . '/' . $folder_name;
        $extension = strtolower($file->getClientOriginalExtension()) ?:'png';
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        if(!in_array($extension, $this->allowed_ext)){
            return false;
        }

        $file->move($upload_path, $filename);

        if($max_width && $extension != 'gif'){
            $this->reduceSize($upload_path.'/'.$filename, $max_width);
        }

        return [
            'path' => config('app.url') . "/$folder_name/$filename",
        ];
    }

    public function reduceSize(string $file_path, $max_width){
        $image = Image::make($file_path);
        $image->resize($max_width, null, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();
    }

}