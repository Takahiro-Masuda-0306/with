<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'image', 'description'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function approvers() {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id')->withTimestamps();
    }
    
    public function commenters() {
        return $this->belongsToMany(User::class, 'comments', 'post_id', 'user_id')->withTimestamps();
    }
    
    public function count_approvers() {
        return $this->approvers()->count();
    }
    
    public function count_commenters() {
        return $this->commenters()->count();
    }
    
}
