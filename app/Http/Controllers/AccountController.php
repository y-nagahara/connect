<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AccountController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();
        $data=['user'=>$user];
        return view('delete.delete',$data);
    }
    
    public function destroy($id) {
        // 退会処理
        //    当該ユーザーのレコードを削除(物理削除)
        $user = User::find($id);
        // user_idと一緒か確認
        
        if(\Auth::id() == $user->id){
            $user->delete();
            // HOMEにリダイレクトする
           
            return redirect()->to('/');
        }



    }
}
