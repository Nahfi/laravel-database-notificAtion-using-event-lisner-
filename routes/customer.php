<?php

use App\Http\Controllers\customer\auth\CustomerForgotPasswordController;
use App\Http\Controllers\customer\auth\CustomerLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\customer\auth\LoginController;
use App\Http\Controllers\customer\CustomerHomeController;

Route::middleware('PreventBackHistory')->prefix('customer')->name('customer.')->group(function(){

    //customer guest route
    Route::middleware(['guest:customer'])->group(function(){
            Route::controller(CustomerLoginController::class)->group(function(){
                  Route::get('/login','showLoginForm')->name('login');
                  Route::post('/login/customer','login')->name('customer_login');
                  //reset password form
                  Route::controller(CustomerForgotPasswordController::class)->group(function(){
                        Route::get('/password/reset','showForgetPasswordForm')->name('PasswordReset');
                        Route::get('/password/reset/form/{token}','resetPasswordForm')->name('resetPassword');
                        Route::post('/password/reset','submitForgetPasswordForm')->name('SendPasswordResetLink');
                        Route::post('/password/reset/done','submitResetPasswordForm')->name('submitResetPasswordForm');
                  });
            });
      });
        
    Route::middleware('auth:customer')->group(function(){
                  Route::controller(CustomerLoginController::class)->group(function(){
                  Route::post('/logout','logout')->name('logout');
            });

      });

//customer home route
      Route::middleware(['auth:customer'])->group(function(){
            Route::controller(CustomerHomeController::class)->group(function(){
                  Route::get('/home','index')->name('home');
                  Route::post('/update','update')->name('updatePassword');
                  Route::post('/store','store')->name('storeProduct');
                  Route::get('/serach','serach')->name('serach');
            });
      });
});

Route::fallback(function(){
      return view('auth.login');
});