<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
     protected $fillable = ['picture_name', 'picture_url','user_id'];

    public function user()
    {
        // Pictureを持つUserは1人（多対1)
        return $this->belongsTo(User::class);
    }
    public function favorite_users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function comment(){
        return $this->hasMany(Comment::class);    
    }
}