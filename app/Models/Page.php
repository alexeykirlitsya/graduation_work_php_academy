<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use Sluggable;

    protected $table = 'pages';

    protected $fillable = ['title', 'description', 'text'];

    public function sluggable()
    {
        return ['slug' => ['source' => 'title']];
    }

}