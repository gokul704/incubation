<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=user::all();
        return view('users.userindex',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.createuser');
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
        $request->validate([
            'name'=>'required',
            'rollno'=>'required',
            'email' => 'required',
            'password'=>'required',
            'role'=>'required',
        ]);
        $user=new user([
            'name'=>$request->get('name'),
            'rollno'=>$request->get('rollno'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),

            'role'=>$request->get('role'),




        ]);
        $user->save();
        return redirect()->route('user.index')->with('success','user Added');



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
        $user=user::find($id);
        return view('users.edituser',compact('user'));

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
        $request->validate([
            'name'=>'required',
            'rollno'=>'required',
            'email' => 'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        $user = user::find($id);
            $user->name=$request->get('name');
            $user->rollno=$request->get('rollno');
            $user->email=$request->get('email');
            $user->password=$request->get('password');
            $user->role=$request->get('role');

            $user->save();

        return redirect()->route('user.index')->with('success','user updated');




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
        $user=user::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','user updated');


    }
}
