<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable=[
        'user_id',
        'title',
        'description_short',
        'seo_title',
        'image_thumb',
        'category_id',
        'description',
        'status',
        'view'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
