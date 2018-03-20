<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CategoriesMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->categoriesMenu();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function categoriesMenu()
    {
        View::composer('pages.sidebar', function ($view){
            //Sorting the main menu items
            $view->with('cat_menu', \App\Models\CategoriesMenuParent::where('parent_id','=', 0)->orderBy('weight', 'asc')->get());
        });
    }
}
