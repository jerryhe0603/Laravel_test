<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Blog;
use Redirect;
use Validator;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Blog::all();
        $posts = Blog::paginate(3);
        
        return View::make('blog/home')
            ->with('title', 'My Blog')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('blog/create')
            ->with('title', '新增文章');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = Input::all();
        $input = $request->all();
       $validator = Blog::checkNotNull($input);

        // $rules = [  'title'  => 'required|min:5',
        //             'content'=> 'required'
        //          ];
        // $messages = [
        //             'title.required' => '標題欄位不能空白',
        //             'content.required' => '內容不能空白',
        //             'min'=>'不可小於5個字'
        //             ];
        // $validator = Validator::make($input, $rules, $messages);


        if ($validator->passes()){
            $post = new Blog;
            $post->title = $input['title'];
            $post->content = $input['content'];
            $post->save();
            return Redirect::to('blog');
        }
        return Redirect::to('blog/create')
            ->withInput()
            ->withErrors($validator);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::find($id);
        return View::make('blog/show')
                ->with('title', 'My Blog - '. $post->title)
                ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::find($id);
        return View::make('blog/edit')
                ->with('title', '編輯文章')
                ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = Blog::find($id);
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();
        return Redirect::to('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blog::find($id);
        $post->delete();
        return Redirect::to('blog');
    }
}
