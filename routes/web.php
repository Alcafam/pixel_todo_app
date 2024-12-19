<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::get('/get_todo', [TodoController::class, 'get_todo_by_id']);

Route::post('/create_edit_todo', [TodoController::class, 'create_edit_todo']);
Route::put('/update_todo/{todo}', [TodoController::class, 'update_todo']);
Route::delete('delete_todo/{todo}', [TodoController::class, 'destroy_todo']);
