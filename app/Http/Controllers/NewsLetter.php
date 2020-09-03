<?php

namespace App\Http\Controllers;

use App\newsletter as AppNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsLetter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $newsletter=AppNewsletter::all();
        return view('newsletter.newsletterindex',compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('newsletter.createnewsletter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title'=>'required',
                'subtitle'=>'required',
                'body'=>'required',

            'file' => 'required|max:10000|mimes:png,jpeg,jpg,pdf,docx',
        ]);

        $reqData = $request->input();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time() . rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('docs');
            $file->move($destinationPath, $name);
            $names=Auth::user()->name;
            $request->validate([
                          ]);

            $newsletter=new AppNewsletter([

                'title'=>$request->get('title'),
                'subtitle'=>$request->get('subtitle'),
                'file'=>$name,
                'body'=>$request->get('body'),
                'postedby'=>$names,
            ]);


        }

        $newsletter=new AppNewsletter([

            'title'=>$request->get('title'),
            'subtitle'=>$request->get('subtitle'),
            'file'=>$name,
            'body'=>$request->get('body'),
            'postedby'=>$names,
        ]);


$newsletter->save();
        return redirect()->route('newsletter.index')->with('success','Post Added');


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
        $newsletter=AppNewsletter::find($id);
        return view('newsletter.editnewsletter',compact('newsletter'));



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

        $validatedData = $request->validate([
            'title'=>'required',
                'subtitle'=>'required',
                'body'=>'required',

            'file' => 'required|max:10000|mimes:png,jpeg,jpg,pdf,docx',
        ]);
        $reqData = $request->input();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time() . rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('docs');
            $file->move($destinationPath, $name);
            $names=Auth::user()->name;
            $request->validate([
                          ]);

            $newsletter=new AppNewsletter([

                'title'=>$request->get('title'),
                'subtitle'=>$request->get('subtitle'),
                'file'=>$name,
                'body'=>$request->get('body'),
                'postedby'=>$names,
            ]);


        }

        $newsletter = AppNewsletter::find($id);
        $newsletter->title=$request->get('title');
        $newsletter->subtitle=$request->get('subtitle');
        $newsletter->file=$name;
        $newsletter->body=$request->get('body');
        $newsletter->postedby=$names;

        $newsletter->save();


        return redirect()->route('newsletter.index')->with('success','Post Added');



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
}
