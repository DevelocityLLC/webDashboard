<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsTypeController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\TaskStatusController;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // welcome - Home page
        //Route::get('/' , [DashboardController::class , 'welcome']);


        Route::group([ 'middleware' => 'auth:admin' ,  'prefix' => 'admin' ] , function(){


            //Home Dashboard
            Route::get('/dashboard' , [DashboardController::class , 'index'])->name('dashboard');

            // admins
            Route::resource('/admins' , AdminController::class);


            // branches
            Route::resource('/branches' , BranchController::class);

            // sections
            Route::resource('/sections' ,SectionController::class);

            // sections
            // Route::resource('/sections' ,SectionController::class);

            // users
            Route::resource('users' , UserController::class);
            Route::get('/user-section/{id}' , [UserController::class , 'get_sections']);
            Route::get('export/{user_id}' , [UserController::class , 'export']);
            Route::get('user/uploadcsv', [UserController::class , 'uploadcsv'])->name('users.uploadcsv');
            Route::post('users/importcvs', [UserController::class , 'importcvs'])->name('users.importcvs');;
            Route::get('/perfect_employee' , [UserController::class , 'perfect_employee'])->name('perfect_employee');

            // tasks
            Route::resource('tasks' , TaskController::class );
            Route::get('/task-users/{id}' , [TaskController::class , 'get_users']);
            Route::get('task-details/{id?}' , [TaskController::class , 'task_details'])->name('task-details');
            Route::get('task/uploadcsv', [TaskController::class , 'uploadcsv'])->name('tasks.uploadcsv');
            Route::post('task/importcvs', [TaskController::class , 'importcvs'])->name('tasks.importcvs');
            Route::post('task/rate/{task}', [TaskController::class , 'rate_task'])->name('task.rate');

            // task-status
            Route::get('/task-waiting' , [TaskStatusController::class , 'task_waiting'])->name('task_waiting');
            Route::get('/task-rejected' , [TaskStatusController::class , 'task_rejected'])->name('task_rejected');
            Route::get('/task-approve' , [TaskStatusController::class , 'task_approve'])->name('task_approve');
            Route::get('/task-complete' , [TaskStatusController::class , 'task_complete'])->name('task_complete');
            Route::get('/task-edit' , [TaskStatusController::class , 'task_edit'])->name('task_edit');


            // complaints
            Route::get('/complaints-users' , [ComplaintController::class , 'complaints'])->name('complaints');

            Route::get('/complaints-task' , [ComplaintController::class , 'compalint_task'])->name('compalint_task');

            Route::get('/complaints-general' , [ComplaintController::class , 'compalint_general'])->name('compalint_general');
            // requirements
            Route::get('/requirements' , [RequirementController::class , 'index'])->name('admin.requirements.index');
            Route::put('/requirment/{id}' , [RequirementController::class , 'changStatus'])->name('requirment.changStatus');

             // Requiremrnts status
            Route::get('/requirements-waiting' , [RequirementController::class , 'Requirements_waiting'])->name('Requirements_waiting');
            Route::get('/requirements-rejected' , [RequirementController::class , 'Requirements_rejected'])->name('Requirements_rejected');
            Route::get('/requirements-approve' , [RequirementController::class , 'Requirements_approve'])->name('Requirements_approve');

            // news Type
            Route::resource('/news-type' , NewsTypeController::class);
            Route::resource('/news' , NewsController::class);

        });
    });



require __DIR__.'/auth.php';
