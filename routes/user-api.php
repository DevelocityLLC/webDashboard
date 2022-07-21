<?php

use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\User\ComplaintController;
use App\Http\Controllers\Api\User\RequiremetController;
use App\Http\Controllers\Api\User\StaticController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


    // users
    Route:: group(['prefix' => 'user'] , function(){
        Route::post('/login' , [UserController::class , 'login']);
    });
    
    Route::group(['middleware' => 'auth.guard:user-api'] , function(){


        // users
        Route:: group(['prefix' => 'user'] , function(){
            Route::get('/profile' , [UserController::class , 'profile']);
            Route::post('/update' , [UserController::class , 'update']);
        });

        // complaints
        Route:: group(['prefix' => 'complaints'] , function(){
            Route::get('/' , [ComplaintController::class , 'index']);
            Route::post('/create' , [ComplaintController::class , 'store']);
            Route::post('/update/{id}' , [ComplaintController::class , 'update']);
            Route::post('/delete/{id}' , [ComplaintController::class , 'destroy']);

        });

        // requirements
        Route:: group(['prefix' => 'requirements'] , function(){
            Route::get('/' , [RequiremetController::class , 'index']);
            Route::post('/create' , [RequiremetController::class , 'store']);
            Route::post('/update/{id}' , [RequiremetController::class , 'update']);
            Route::post('/delete/{id}' , [RequiremetController::class , 'destroy']);

        });
        
        // news
        Route::get('/user-news' , [StaticController::class , 'news']);
        
         // tasks
        Route::get('/user-tasks' , [StaticController::class , 'tasks']);

    });


