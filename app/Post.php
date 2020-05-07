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
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id');
    }
    
}
