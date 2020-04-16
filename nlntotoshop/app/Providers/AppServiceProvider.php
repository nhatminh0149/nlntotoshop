<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Fix 1071 error
use Illuminate\Pagination\Paginator;
use App\LoaiSanPham;
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
        // Sử dụng giao diện Bootstrap 4 để hiển thị các LINK phân trang (pagination link)
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    
        view()->composer('frontend.layouts.partials.header',function($view){
            $loai_sp = LoaiSanPham::all();
            $view->with('loai_sp', $loai_sp);
        });
    }
}
