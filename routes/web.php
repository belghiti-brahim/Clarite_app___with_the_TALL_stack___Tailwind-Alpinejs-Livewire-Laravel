<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsibilityController;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::controller(ResponsibilityController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/define_responsibility', 'create')->name('createresponsibility');
        Route::get('/edit_responsibility/{responsibility}', 'edit')->name('editresponsibility');
        Route::get('responsibility/{id}', 'show')->name('showresponsibility');
    });
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/active_projects', 'index')->name('projects');
        Route::get('/archived_projcets', 'archivedProjects')->name('achivedProjects');
        Route::get('new_project_for_responsibility/{id}', 'createFromResponsibility')->name('createprojectfromresponsibility');
        Route::get('/edit_project/{Project}', 'edit')->name('editProject');
        Route::get('/show_project/{id}', 'show')->name('showProject');
    });
    Route::controller(ActionController::class)->group(function () {
        Route::get('/todays_actions', 'todaysActions')->name('todaysActions');
        Route::get('/this_week_actions', 'thisWeekActions')->name('thisWeekActions');
        Route::get('/edit_action/{id}', 'edit')->name('editAction');
        Route::get('new_action_for_project/{id}', 'createFromProject')->name('createActionFromProject');
    });
});
