<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';

    public function sluggable()
    {
        return ['slug' => ['source' => 'title']];
    }
}
