<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Blog;

class Post extends Controller
{
    public function index()
    {
        $data['results']=Blog::where('status',1)->paginate(10);
        $data['style']=1;
       // dd($data['results']);
        return view('post.index',$data);
    }
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            
            $insert_arr=array(
                'title'=>$request->title,
                'description'=>$request->description,
                'author_id'=>$request->author
            );


            Blog::create($insert_arr);

            return redirect()->route('posts')->with('success','Blog created successfully');
        }
        $data['authors']=User::all();
        $data['style']=2;
        return view('post.add',$data);
    }
    public function view($id)
    {
        $post_id=decrypt($id);
        
        $data['view_data']=Blog::find($post_id);

        return view('post.view',$data);
    }
    public function edit(Request $request,$id)
    {
        $post_id=decrypt($id);

        $editdata=Blog::find($post_id);

        if($request->isMethod('post'))
        {
            $editdata->title=$request->title;

            $editdata->description=$request->description;

            $editdata->author_id=$request->author;

            $editdata->save();

            return redirect()->route('posts')->with('success','Blog updated successfully');
        }

        $data['edit_data']=$editdata;
        $data['authors']=User::all();

        return view('post.edit',$data);
    }
    public function delete($id)
    {
        $post_id=decrypt($id);

        $editdata=Blog::find($post_id);

        $editdata->status=2;
        $editdata->save();

        return redirect()->route('posts')->with('success','Blog deleted successfully');
    }
}
