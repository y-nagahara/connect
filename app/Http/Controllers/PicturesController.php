<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PicturesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $pictures = $user->feed_pictures()->orderBy('created_at', 'desc')->paginate(10);
            
            
            $data = [
                'user' => $user,
                'pictures' => $pictures,
            ];
        }
        
        return view('welcome', $data);
    }
    public function show($id)
    {
        $picture = \App\Picture::find($id);
        $user =\Auth::user();

        return view('pictures.details', [
            'user' => $user,
            'picture' => $picture,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'picture_name' => 'required|max:191',
            'picture_url' => 'required|max:191',
            ]);
        
        $request->user()->pictures()->create([
            'picture_name'=>$request->picture_name,
            'picture_url'=>$request->picture_url,
            ]);
            
            return back();
    }
    
    
    public function destroy($id)
    {
        $pictures = \App\Picture::find($id);
        // user_idと一緒か確認
        if(\Auth::id() === $pictures->user_id){
            $pictures->delete();
        }
        
        return back();
    }
}
