<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('user/{id}', 'UserController@show');

Route::get('/',function(){
    return 'Home page';
});

Route::prefix('admin/users/login')->group(function(){
    Route::get('/',[LoginController::class,'index']);
    Route::post('/store',[LoginController::class,'store']);
});

Route::prefix('admin/') -> group(function (){
    Route::get('/',[MainController::class,'index']) -> name('admin');
    Route::get('/main',[MainController::class,'index']);

    #menu
    Route:: prefix('menus') -> group(function (){
        Route::get('add',[MenuController::class,'create']);
        Route::post('/add',[MenuController::class,'store']);
        Route::get('/list',[MenuController::class,'index']);
        Route::get('edit/{menu}',[MenuController::class,'show']);
        Route::post('edit/{menu}',[MenuController::class,'update']);
        Route::DELETE('destroy',[MenuController::class,'destroy']);
    });

    #product
    Route::prefix('products') -> group(function (){
        Route::get('add', [ProductController::class, 'create']);
        Route::post('add', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('edit/{product}', [ProductController::class, 'show']);
        Route::post('edit/{product}', [ProductController::class, 'update']);
        Route::DELETE('destroy', [ProductController::class, 'destroy']);
    });

    #Slider
    Route::prefix('sliders')->group(function () {
        Route::get('add', [SliderController::class, 'create']);
        Route::post('add', [SliderController::class, 'store']);
        Route::get('list', [SliderController::class, 'index']);
        Route::get('edit/{slider}', [SliderController::class, 'show']);
        Route::post('edit/{slider}', [SliderController::class, 'update']);
        Route::DELETE('destroy', [SliderController::class, 'destroy']);
    });

    #Upload
    Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);


});
#menu
Route::prefix('admin/menus') -> group(function (){

});
