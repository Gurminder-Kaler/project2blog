<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use App\Http\Requests\ProfileRequest;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        return view('admin.users.profile')->with('user',$user);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(ProfileRequest $request)
    {
        //
        $user = Auth::user();
        if($request->hasFile('avatar')){
        $avatar = $request->avatar;
        $name = time().$avatar->getClientOriginalName();
        $avatar->move('uploads/admin' , $name);
        $user->profile->avatar = 'uploads/admin'.$name ;
        $user->profile->save();
        }
        $user->name = $request->name;
        $user->email= $request->email;
        $user->profile->facebook =$request->facebook;
        $user->profile->youtube =$request->youtube;
        $user->profile->save();
        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Session::flash('success','User Profile Updated');
        return redirect()->route('users');
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
