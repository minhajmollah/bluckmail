<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BluckMailControleer;
use Illuminate\Support\Facades\Mail;
use App\Mail\test;

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
Route::get('/wel', function () {
    $content="minhaj";
  

    Mail::to('mdmi9haj@gmail.com')->send(new test($content));
    
  
});



Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/sendbluck',[BluckMailControleer::class, 'store'])->name('bluckmail');
    Route::post('/upload',[BluckMailControleer::class, 'upload'])->name('upload');
  
});


require __DIR__.'/auth.php';
