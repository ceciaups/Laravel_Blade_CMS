<?php

use App\Models\Project;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\CareerTypesController;
use App\Http\Controllers\SkillsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome', [
        'projects' => Project::all(),
    ]);
});

Route::get('/project/{project:slug}', function (Project $project) {
    return view('project', [
        'project' => $project,
    ]);
})->where('project', '[A-z\-]+');

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/console/careers/list', [CareersController::class, 'list'])->middleware('auth');
Route::get('/console/careers/add', [CareersController::class, 'addForm'])->middleware('auth');
Route::post('/console/careers/add', [CareersController::class, 'add'])->middleware('auth');
Route::get('/console/careers/edit/{career:id}', [CareersController::class, 'editForm'])->where('career', '[0-9]+')->middleware('auth');
Route::post('/console/careers/edit/{career:id}', [CareersController::class, 'edit'])->where('career', '[0-9]+')->middleware('auth');
Route::get('/console/careers/delete/{career:id}', [CareersController::class, 'delete'])->where('career', '[0-9]+')->middleware('auth');
Route::get('/console/careers/image/{career:id}', [CareersController::class, 'imageForm'])->where('career', '[0-9]+')->middleware('auth');
Route::post('/console/careers/image/{career:id}', [CareersController::class, 'image'])->where('career', '[0-9]+')->middleware('auth');

Route::get('/console/career_types/list', [CareerTypesController::class, 'list'])->middleware('auth');
Route::get('/console/career_types/add', [CareerTypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/career_types/add', [CareerTypesController::class, 'add'])->middleware('auth');
Route::get('/console/career_types/edit/{career_type:id}', [CareerTypesController::class, 'editForm'])->where('career_type', '[0-9]+')->middleware('auth');
Route::post('/console/career_types/edit/{career_type:id}', [CareerTypesController::class, 'edit'])->where('career_type', '[0-9]+')->middleware('auth');
Route::get('/console/career_types/delete/{career_type:id}', [CareerTypesController::class, 'delete'])->where('career_type', '[0-9]+')->middleware('auth');

Route::get('/console/skills/list', [SkillsController::class, 'list'])->middleware('auth');
Route::get('/console/skills/add', [SkillsController::class, 'addForm'])->middleware('auth');
Route::post('/console/skills/add', [SkillsController::class, 'add'])->middleware('auth');
Route::get('/console/skills/edit/{skill:id}', [SkillsController::class, 'editForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/console/skills/edit/{skill:id}', [SkillsController::class, 'edit'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/console/skills/delete/{skill:id}', [SkillsController::class, 'delete'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/console/skills/logo/{skill:id}', [SkillsController::class, 'logoForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/console/skills/logo/{skill:id}', [SkillsController::class, 'logo'])->where('skill', '[0-9]+')->middleware('auth');
