<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;








Route::group([ 'middleware' => 'auth:user' ,  'prefix' => 'user' ] , function(){
    Route::get('/dashboard' , [DashboardController::class , 'index'])->name('user-dashboard');
});
