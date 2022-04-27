<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsibilityController;

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
        Route::get('/creatresponsibility', 'create')->name('createresponsibility');
        Route::get('/editresponsibility/{responsibility}', 'edit')->name('editresponsibility');
        Route::get('responsibility/{id}/p', 'show')->name('showresponsibility');

    });
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/projects', 'index')->name('projects');
        Route::get('/archived_projcets', 'archivedProjects')->name("achivedProjects");
    });
});
