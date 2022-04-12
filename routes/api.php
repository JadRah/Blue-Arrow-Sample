<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('GetAllNotes',[App\Http\Controllers\ApiController\notesapicontroller::class,'index'])->name('AllNotes');
Route::post('CreateNotes/{user_id}', [App\Http\Controllers\ApiController\notesapicontroller::class,'store'])->name('CreateNotes');
Route::put('UpdateNotes/{user_id}', [App\Http\Controllers\ApiController\notesapicontroller::class,'update'])->name('UpdateNotes');
Route::get("softdelete/{id}",[App\Http\Controllers\ApiController\notesapicontroller::class,'destroy'])->name('DestroyNotes');
