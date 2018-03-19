<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesMenuParent extends Model
{
    protected $table = 'categories_menu_parents';

    public function children()
    {
        return $this->hasMany('App\Models\CategoriesMenuParent','parent_id');
    }
}
