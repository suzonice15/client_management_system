<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Session::get('id');
        if($id){
          return  redirect('dashboard');
        }
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
       $result= DB::table('users')->where('email',$request->email)->where('password',md5($request->password))->first();
       if($result){
Session::put('id',$result->id);
Session::put('name',$result->name);
return redirect('/dashboard');

       }else{

         return   redirect('/')->with('error','Invalid Password or Email try again');
       }


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
    public function destroy()
    {
       Session::put('id','');
       return redirect('/')->with('success','You are successfully Logout !');
    }
}
