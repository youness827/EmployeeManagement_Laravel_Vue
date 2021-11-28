<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserChangepswRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        if($request->has('search')){
            $users = User::where('username','like',"%{$request->search}%")->get();

        }

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
            $newuser = new User;
            $newuser->username  = $request->input('username');
            $newuser->firstname = $request->input('firstname');
            $newuser->lastname  = $request->input('lastname');
            $newuser->email     = $request->input('email');
            $newuser->password     = Hash::make($request->input('password'));
            $newuser->save();
            return redirect()->route('users.index')->with('message','User Registred Succesfully');
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
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return  view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id )
    {
        $spesificuser = User::find($id);
        $spesificuser->username  = $request->input('username');
        $spesificuser->firstname = $request->input('firstname');
        $spesificuser->lastname  = $request->input('lastname');
        $spesificuser->email     = $request->input('email');
        $spesificuser->save();

        return redirect()->route('users.index')->with('message','User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spesificuser = User::find($id);
        $spesificuser->delete();

        return redirect()->route('users.index')->with('message','User Deleted Succesfully');

    }


}
