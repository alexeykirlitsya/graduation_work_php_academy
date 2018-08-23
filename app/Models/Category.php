<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = ['title', 'description'];

    public function sluggable()
    {
        return ['slug' => ['source' => 'title']];
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post')->orderBy('id','desc');
    }
}
