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
        'name', 'email', 'age', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    public function approvings() {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id');
    }
    
    public function approve($postId) {
        $exists = $this->is_approving($postId);
        
        if($exists) {
            return false;
        }
        else {
            $this->approvings()->attach($postId);
            return true;
        }
    }
    
    public function disapprove($postId) {
        $exists = $this->is_approving($postId);
        
        if($exists) {
            $this->approvings()->detach($postId);
            return true;
        }
        else {
            return false;
        }
    }
    
    public function is_approving($postId) {
        return $this->approvings()->where('post_id', $postId)->exists();
    }
}
