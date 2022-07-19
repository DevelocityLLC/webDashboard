<?php

use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\BranchController;
use App\Http\Controllers\Api\Admin\NewsController;
use App\Http\Controllers\Api\Admin\NewsTypeController;
use App\Http\Controllers\Api\Admin\SectionController;
use App\Http\Controllers\Api\Admin\TaskController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\ComplaintController;
use App\Http\Controllers\Api\Admin\RequirementController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

    // Auth admins
    Route::group(['prefix' => 'admin'] , function(){
        Route::post('/register' , [AdminController::class , 'register']);
        Route::post('/login' , [AdminController::class , 'login']);
    });



    Route::group(['middleware' => 'auth.guard:admin-api'] , function(){

        // admins
        Route::group(['prefix' => 'admins'] , function(){
            Route::get('/' , [AdminController::class , 'index']);
            Route::get('/get-admin/{id}' , [AdminController::class , 'getAdmin']);
            Route::post('/update/{id}' , [AdminController::class , 'update']);
            Route::post('/delete/{id}' , [AdminController::class , 'destroy']);
        });


        //branches
        Route::group(['prefix' => 'branches'] , function(){
            Route::get('/' , [BranchController::class , 'index']);
            Route::post('/create' , [BranchController::class , 'store']);
            Route::post('/update/{id}' , [BranchController::class , 'update']);
            Route::post('/delete/{id}' , [BranchController::class , 'destroy']);
        });

        //sections
        Route::group(['prefix' => 'sections'] , function(){
            Route::get('/' , [SectionController::class , 'index']);
            Route::post('/create' , [SectionController::class , 'store']);
            Route::post('/update/{id}' , [SectionController::class , 'update']);
            Route::post('/delete/{id}' , [SectionController::class , 'destroy']);
        });


        // users
        Route:: group(['prefix' => 'users'] , function(){
            Route::get('/' , [UserController::class , 'index']);
            Route::post('/create' , [UserController::class , 'register']);
            Route::get('/get-user/{id}' , [UserController::class , 'getUser']);
            Route::post('/delete/{id}' , [UserController::class , 'destroy']);
        });

         //tasks
         Route::group(['prefix' => 'tasks'] , function(){
            Route::get('/' , [TaskController::class , 'index']);
            Route::post('/create' , [TaskController::class , 'store']);
            Route::post('/update/{id}' , [TaskController::class , 'update']);
            Route::post('/delete/{id}' , [TaskController::class , 'destroy']);
        });

         //news-type
         Route::group(['prefix' => 'news-type'] , function(){
            Route::get('/' , [NewsTypeController::class , 'index']);
            Route::post('/create' , [NewsTypeController::class , 'store']);
            Route::post('/update/{id}' , [NewsTypeController::class , 'update']);
            Route::post('/delete/{id}' , [NewsTypeController::class , 'destroy']);
        });


         //news
         Route::group(['prefix' => 'news'] , function(){
            Route::get('/' , [NewsController::class , 'index']);
            Route::post('/create' , [NewsController::class , 'store']);
            Route::post('/update/{id}' , [NewsController::class , 'update']);
            Route::post('/delete/{id}' , [NewsController::class , 'destroy']);
        });

        // complaint-user
        Route::get('/user-complaints' , [ComplaintController::class , 'index']);

         // user-requirements
        Route::get('/user-requirements' , [RequirementController::class , 'index']);


























        // logout
        Route::post('admin/logout' , [AdminController::class , 'logout']);
    });



