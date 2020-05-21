<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function pictures()
    {
        // UserはPictureを複数持てる(１対多)
        return $this->hasMany(Picture::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class,'user_follow','user_id','follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_follow','follow_id','user_id')->withTimestamps();
    }
    
    public function follow($user_id)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($user_id);
        // 
        $its_me = $this->id == $user_id;
        
        if ($exist || $its_me){
            // すでにフォローしていれば何もしない
            return false;
        }else{
            // 未フォローであればフォローする
            $this->followings()->attach($user_id);
            return true;
        }
    }
    
    public function unfollow($user_id)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($user_id);
        // 
        $its_me = $this->id == $user_id;
        
        if ($exist && !$its_me){
            // すでにフォローしていればフォローをはずす
            $this->followings()->detach($user_id);
            return true;
        }else{
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($user_id)
    {
        return $this->followings()->where('follow_id',$user_id)->exists();
    }
    
    public function feed_pictures()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Picture::whereIn('user_id', $follow_user_ids);
    }
    
    
    // お気に入り
    // pictureクラスを呼び出す
        
    public function favoritings()
    {
        // favoritesテーブルのuser_idとpicture_idを返す
        return $this->belongsToMany(Picture::class, 'favorites', 'user_id', 'picture_id')->withTimestamps();
    }


    public function favorite($picture_id)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($picture_id);
        
        if ($exist){
            // すでにお気に入りしていれば何もしない
            return false;
        }else{
            // お気に入りをしていなければお気に入りにする
            $this->favoritings()->attach($picture_id);
            return true;
        }
    }
    
    public function unfavorite($picture_id)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_favoriting($picture_id);
        
        if ($exist ){
            // すでにお気に入りにしていたらお気に入りをはずす
            $this->favoritings()->detach($picture_id);
            return true;
        }else{
            //  お気に入りをしていなければ何もしない
            return false;
        }
    }
    
    public function is_favoriting($picture_id)
    {
        return $this->favoritings()->where('picture_id',$picture_id)->exists();
    }
    
    
    // comment
    public function comments()
    {
        // UserはCommentを複数持てる(１対多)
        return $this->hasMany(Comment::class);
    }
}

