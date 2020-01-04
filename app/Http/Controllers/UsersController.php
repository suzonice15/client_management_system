<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Users ';
        $data['active'] = 'View User ';
        $data['users'] = User::all();
        return view('users.users_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Users';
        $data['active'] = 'Add User';
        $data['title'] = 'User registration form';
        return view('users.users_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $data['name']= $request->name;
       $data['email']= $request->email;
       $data['password']= md5($request->password);
        $result = DB::table('users')->insert($data);
        if ($result) {
            return redirect()->route('users.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('users.create')
                ->with('error', 'Some problem to insert data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['main'] = 'Users';
        $data['active'] = 'Update User';
        $data['title'] = 'User registration form';
        return view('users.users_edit', $data, compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required',
        ]);

 $data['name']=  $request->name;
 $data['email']=  $request->email;
 $password=  $request->password;
        $id=  $request->id;
        if($password){
            $data['password']=  md5($request->password);
        }
        
        $result =DB::table('users')->where('id',$id)->update($data);
       
        return redirect()->route('users.index')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')

            ->with('success','deleted successfully');
    }
}
