<?php

namespace App\Http\Controllers;
use App\Profile;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //
        $users =User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password')
            ]);
        $profile =Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/admin/man2.png'
        ]);
        Session::flash('info','User Created successfully');
        return redirect()->route('users');
    }

    public function admin($id){
        $user = User::findorFail($id);
        $user->admin = 1;
        $user->save();
        Session::flash('info','User has been made admin by Administrator');
        return redirect()->back();
    }
    public function not_admin($id){
        $user = User::findorFail($id);
        $user->admin = 0;
        $user->save();
        Session::flash('info','User permissions have been changed by Administrator');
        return redirect()->route('users');
    }

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
}
