<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Blog::with('categories')->get();
        return view('back-end.blog.post',[
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('back-end.blog.addPost',[
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $postImage=$request->file('post_image');
        $imageName=$postImage->getClientOriginalName();
        $directory='backend/post/images/';
        $imagUrl=$directory.$imageName;
        $postImage->move($directory,$imageName);
        $blog= new Blog();


        $blog->post_title=$request->post_title;
        $blog->post_title=$request->post_title;
        $blog->post_author=$request->post_author;
        $blog->cat_id=$request->cat_id;
        $blog->post_author=$request->post_author;
        $blog->post_desc=$request->post_desc;
        $blog->status=$request->status;
        $blog->post_image=$imagUrl;


        $blog->save();

        return redirect('/blog')->with('message','post added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('status',1)->get();
        $blog=Blog::find($id);
        return view('back-end.blog.edit-Post',[
           'categories'=>$categories ,
            'blog'=>$blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog=Blog::find($id);

        $blogImage=$request->file('post_image');
        if ($blogImage){
            if ($blog->post_image){
                unlink($blog->post_image);
            }
            $imageName=$blogImage->getClientOriginalName();
            $directory='backend/Blog/images/';
            $imagUrl=$directory.$imageName;
            $blogImage->move($directory,$imageName);



            $blog->post_title = $request->post_title;
            $blog->post_image = $imagUrl;
            $blog->cat_id=$request->cat_id;
            $blog->post_author=$request->post_author;
            $blog->post_desc=$request->post_desc;
            $blog->status=$request->status;

            $blog->save();

        }else{


            $blog->cat_id = $request->cat_id;
            $blog->post_author=$request->post_author;
            $blog->post_desc=$request->post_desc;
            $blog->post_title = $request->post_title;
            $blog->status = $request->status;

            $blog->save();
        }
        return redirect('/blog')->with('message','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function published($id){
        $blog = Blog::find($id);

        $blog->status = 1;
        $blog->save();

        return back();

    }
    public function unpublished($id){
        $blog= Blog::find($id);

        $blog->status = 0;
        $blog->save();

        return back();

    }
}
