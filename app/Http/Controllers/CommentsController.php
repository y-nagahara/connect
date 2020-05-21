<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'comment' => 'required|max:191',

            ]);
   
   
        $request->user()->comments()->create([
            'comment'=>$request->comment,
            'picture_id'=> $request->picture_id,
            'user_id'=>\Auth::id(),
            ''
            ]);
            
            return back();
    }
    
        public function show($id)
    {
        $comment = \App\Comment::find($id);
        $user =\Auth::user();

        return view('pictures.details', [
            'user' => $user,
            'comment' => $comment,
        ]);
    }
    
    
    public function destroy($id)
    {
        $comment = \App\Comment::find($id);
        // user_idと一緒か確認
        if(\Auth::id() === $comment->user_id){
            $comment->delete();
        }
        
        return back();
    }
}
