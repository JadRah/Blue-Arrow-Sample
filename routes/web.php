<?php

use App\Http\Controllers\NoteController;
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;


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


Route::get('/', [App\Http\Controllers\NoteController::class,'welcome'])->name('welcome');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/CreateNotes',[App\Http\Controllers\NoteController::class,'create'])->name('CreateNote');
Route::post('/AddNotes',[App\Http\Controllers\NoteController::class,'store'])->name('AddNotes');
Route::get('/EditNotes/{id}',[App\Http\Controllers\NoteController::class,'edit'])->name('EditNotes');
Route::put('/UpdateNote/{id}',[App\Http\Controllers\NoteController::class,'update'])->name('UpdateNote');
Route::get("softdelete/{id}",[App\Http\Controllers\NoteController::class,'destroy'])->name('DestroyNotes');
Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
 Route::get("get_deleted_record", function(){
    return Note::onlyTrashed()->get();
 });
 Route::get("restore", function(){
    Note::withTrashed()->restore();
 });

 Route::get("forcedelete", function(){
    Note::withTrashed()->find(1)->forceDelete();
 });



 //clear cache
Route::get('/route-cache', function() {
   $exitCode = Artisan::call('route:cache');
   return 'Routes cache cleared';
});
Route::get('/config-cache', function() {
   $exitCode = Artisan::call('config:cache');
   return 'Config cache cleared';
});
Route::get('/clear-cache', function() {
   $exitCode = Artisan::call('cache:clear');
   return 'Application cache cleared';
});
Route::get('/view-clear', function() {
   $exitCode = Artisan::call('view:clear');
   return 'View cache cleared';
});