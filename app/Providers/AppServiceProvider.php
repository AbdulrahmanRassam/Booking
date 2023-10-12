<?php

namespace App\Providers;

use App\Http\BookingApp\Services\AuthService;
use App\Http\BookingApp\Services\BookingService;
use App\Http\BookingApp\Services\CategoryService;
use App\Http\BookingApp\Services\JobApplyService;
use App\Http\BookingApp\Services\JobService;
use App\Http\BookingApp\Services\RoomService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('CategoryService',function(){
            return new CategoryService();
        });
        $this->app->bind('AuthService',function(){
            return new AuthService();
        });
        $this->app->bind('RoomService',function(){
            return new RoomService();
        });
        $this->app->bind('BookingService',function(){
            return new BookingService();
        });
        $this->app->bind('JobService',function(){
            return new JobService();
        });
        $this->app->bind('JobApplyService',function(){
            return new JobApplyService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
