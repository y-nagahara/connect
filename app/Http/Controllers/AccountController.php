<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AccountController extends Controller
{
    public function deleteData(Request $request)
  {
      $users = User::find($request);
      
    if(\Auth::id() === $users->id){
        $user = Users::find($request->input('id'));
        $user->delete();
    }
    
    else{
        return('/');
    }
  }
}
