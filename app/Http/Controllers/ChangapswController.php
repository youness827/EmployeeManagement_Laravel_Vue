<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangepswRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ChangapswController extends Controller
{
    public function change(UserChangepswRequest $request, User $user){
         $user->password = Hash::make($request->password);
         $user->save();

        return redirect()->route('users.index')->with('message','User Password Updated!!');



    }
}
