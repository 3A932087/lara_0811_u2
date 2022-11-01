<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function() {    //回傳view
    return view('welcome');
});

Route::get('/', function() {    //回傳字串
    return 'welcome';
});

Route::get('r1', function() {   //設定跳轉路由
    return redirect('r2');
});
Route::get('r2', function() {
    return view('welcome');
});

Route::get('hello/{name?}', function($name = 'Everybody') {    //修改參數成選擇性
    return 'Hello, '.$name;
})->name('hello.index');

Route::get('kk', function() {   //test route:list
    return 'kk';
});

Route::get('dashboard', function() {
    return 'dashboard';
});
Route::group(['prefix' => 'admin'], function() {    //字首為admin之下的所有路徑
    Route::get('dashboard', function() {        //路徑為/admin/dashboard
        return 'admin dashboard';
    });
});

Route::get('home', [HomeController::class, 'index'])->name('home.index');

