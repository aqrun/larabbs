<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use Auth;
use App\Http\Requests\TopicRequest;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        config([self::MAIN_MENU => 1]);
    }

    public function index(Request $request, Topic $topic)
    {
        $order = $request->order;
        $topics = Topic::withOrder($order)
            ->with(['user', 'category'])
            ->paginate(20);
        return view('topics.index', compact('topics', 'order'));
    }

    public function show(Request $request, Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    public function create(Request $request, Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->route('topics.show', $topic->id)->with('success', '帖子创建成功！');
    }

    public function edit(){}

    public function update(){}

    public function delete(){}

    public function uploadImage(Request $request, ImageUploadHandler $uploadHandler)
    {
        // init back data, default is false
        $data = [
            'success' => false,
            'msg' => '上传失败！',
            'file_path' => ''
        ];

        if($file = $request->upload_file) {
            $result = $uploadHandler->save($file, 'topics', \Auth::id(), 1024);
            if($result){
                $data['file_path'] = $result['path'];
                $data['msg'] = '上传成功!';
                $data['success'] = true;
            }
        }
        return $data;
    }

}
