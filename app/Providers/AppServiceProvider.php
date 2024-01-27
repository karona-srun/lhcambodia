<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\Models\ProductSubCategoory;
use App\Models\SystemProfile;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $profile = SystemProfile::first();
        $productCategory = ProductCategory::get();
        $productSubCategory = ProductSubCategoory::get();
        View::share(['profile' => $profile, 'menu' => $productCategory,'submenu' => $productSubCategory]);

        Schema::defaultStringLength(191);
    }
}
