<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Post;
use App\newsletter;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $post=post::all();
        // $newsletter=newsletter::all();
        $contact=Contact::latest()->paginate(5);
        return view('home',compact('contact'));

        // return view('frontend.index',compact('post','newsletter'));    }
    }
    public function front()
    {
        $post=Post::paginate(5);
        $newsletter=newsletter::all();
        return view('frontend.index',compact('post','newsletter'));

    }
}
