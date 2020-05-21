<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['picture_id', 'comment','user_id'];
        public function user()
    {
        // commentを持つUserは1人（多対1)
        return $this->belongsTo(User::class);
    }
    public function picture()
    {
        // Pictureを持つUserは1人（多対1)
        return $this->belongsTo(Picture::class);
    }
    
}
