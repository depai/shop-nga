<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable=[
        'name',
        'parent_id',
        'url'
    ];

    public function posts () {
        return $this->hasMany(Post::class, 'id');
    }
}
