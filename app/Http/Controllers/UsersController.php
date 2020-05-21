<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        // Userモデルid順で並び替える
        $users = User::orderBy('id','desc')->paginate(10);
        
        // usersのindex.blade.phpに値を返す
        return view('users.index',[
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $pictures = $user->feed_pictures()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show',[
            'user' => $user,
            'pictures' =>$pictures,
        ]);
    }
    
     public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        $pictures = $user->feed_pictures()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'users' => $followings,
            'pictures' => $pictures,
            
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        $pictures = $user->feed_pictures()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
            'pictures' => $pictures,    
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    
     public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favoritings()->paginate(10);
        $pictures = $user->feed_pictures()->orderBy('created_at', 'desc')->paginate(10);
        
        
        $data = [
            'user' => $user,
            'favorites' => $favorites,
            'pictures' => $pictures,

 
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
    
     public function comments($id)
    {
        $user = User::find($id);
        $comments = $user->comments()->paginate(10);

        $data = [
            'user' => $user,
            'comments' => $comments,
        ];

        $data += $this->counts($user);

        return view('users.comments', $data);
    }

}
