<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post=Post::all();
        return view('author.posts.postindex',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('author.posts.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $name=Auth::user()->name;
        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'image'         =>  'required|image|max:2048',
            'body'=>'required',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $post=new post([

            'title'=>$request->get('title'),
            'subtitle'=>$request->get('subtitle'),
            'image'=>$new_name,
            'body'=>$request->get('body'),
            'postedby'=>$name,
        ]);


$post->save();
        return redirect()->route('post.index')->with('success','Post Added');


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
        $post=Post::find($id);
        return view('author.posts.editpost',compact('post'));


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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        $name=Auth::user()->name;
        if($image!=0){
            $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
                'image'         =>  'image|max:2048',
                'body'=>'required',

            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        }
        else{
            $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
                'body'=>'required',

            ]);


        }

        $post = post::find($id);
        $post->title=$request->get('title');
         $post->subtitle=$request->get('subtitle');
           $post->image=$image_name;
            $post->body=$request->get('body');
            $post->postedby=$name;



$post->save();
        return redirect()->route('post.index')->with('success','Post Added');

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
        $post = post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success','Post Added');

    }

}
