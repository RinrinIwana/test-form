<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Responses\ViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use App\Http\Responses\RegisterViewResponse as CustomRegisterViewResponse;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(RegisterViewResponse::class, CustomRegisterViewResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    Fortify::loginView(function () {
        return view('auth.login');
    });

    // カスタムログインコントローラを使いたい場合のみ
    // app()->router->post('/login', [CustomAuthenticatedSessionController::class, 'store'])
    //     ->middleware(['web'])
    //     ->name('login');
}
}
