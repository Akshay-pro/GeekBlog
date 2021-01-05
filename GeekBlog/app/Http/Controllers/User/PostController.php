<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpanel.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('adminpanel.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*  
        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->post_content,
            'status'=>$request->status,
            'excerpt'=>$request->excerpt,
            'user_id'=>1,
            'category_id'=>$request->category_id
        ]);
    */
    
        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->post_content;
        $post->status=$request->status;
        $post->excerpt=$request->excerpt;
        $post->user_id=1;
        $post->category_id=$request->category_id;
        $post->save();

        return redirect()->route('post.index')->with('success','Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function trashPost(){

    }
    public function restorePost($post){
        
    }
    public function permaDeletePost($post){
        
    }
    public function uploadPhoto(Request $request){
        
        $filename_org= pathinfo($request->upload->getClientOriginalName(),PATHINFO_FILENAME);
        $ext=$request->upload->getClientOriginalExtension();
        $filename=$filename_org.'_'.time().'.'.$ext;

        $request->upload->move(storage_path('app/public/blog/images'),$filename);

        $CKEditorFuncNum=$request->input('CKEditorFuncNum');

        $url=asset('storage/blog/images/'.$filename);
        $message="Your photo uploaded";

        $res="<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$message')</script>";
        @header('Content-Type:text/html; charset=utf-8');

        echo $res;
        
    }
}
