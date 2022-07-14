<?php

use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\User\ComplaintController;
use App\Http\Controllers\User\RequirementController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\Admin\NotificationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // Admin Company
        Route::get('/dashboard-company' , [DashboarController::class , 'index'])->middleware(['auth:user'])->name('dashboard-company');
        Route::group(['prefix' => 'user'  , 'middleware' => 'auth:user'] , function(){

            //tasks
            Route::get('/user-tasks/{task_id?}' , [HomeController::class , 'index'])->name('tasks.users');
            Route::get('/user-tasks-edit/{id}' , [HomeController::class , 'editTask'])->name('tasks.users.edit');
            Route::put('/user-tasks-update/{id}' , [HomeController::class , 'taskUpdate'])->name('tasks.users.update');

            // rates
            Route::get('/user-rates' , [HomeController::class , 'rates'])->name('rates.user');

            // complaints
            Route::resource('complaints' , ComplaintController::class);

            // requirements
            Route::resource('requirements' , RequirementController::class);

            //news
            Route::prefix('news')->name('users.news.')->group(function () {
                Route::get('/', [NewsController::class,'index'])->name('index');
                Route::get('/{id}/show', [NewsController::class,'show'])->name('show');

            });

        });

        Route::get('task-details/{id?}' , [TaskController::class , 'task_details'])->name('task-details');
        Route::get('requirement-details/{id?}' , [RequirementController::class , 'show'])->name('requirement-details');
        Route::get('requirements-details/{id?}' , [RequirementController::class , 'requirements_details'])->name('requirement-user-details');
        Route::get('MarkAsRead_all', [NotificationController::class , 'MarkAsRead_all'])->name('MarkAsRead_all');

        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get('/',[NotificationController::class,'index'])->name('index');
            Route::get('/ajax',[NotificationController::class,'notifications_ajax'])->name('ajax');
            Route::post('/see',[NotificationController::class,'notifications_see'])->name('see');
        });

        
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('edit', [UserController::class,'edit_profile'])->name('edit');
            Route::put('update', [UserController::class,'update_profile'])->name('update');

        });

            
        Route::get('activate_account/{activation_code}', [UserController::class,'activate_account'])->name('activate_account');

    });











