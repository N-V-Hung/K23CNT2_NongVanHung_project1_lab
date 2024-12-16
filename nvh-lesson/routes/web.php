<?php

use App\Http\Controllers\NvhAccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return "<h1> hello<h1>";
});
Route::redirect('/here','/three');
Route::get('/three', function () {
    return '<h1>redirect to three</h1>';
});


Route::get('/van-hung', function () {
    return view('vanhung');
});

Route::get('/devmaster/{id}' , function ($id){
return "<h1>devmaster" .$id . "</h1>";
});

Route::get('/dev/{name?}' , function ($name="Văn Hưng"){
    return "<h1>Xin Chào" .$name . "</h1>";
    });


    //lesson 3
 Route::get('/nvh-account' ,[NvhAccountController::class,'index'])->name('nvhAccount.index');
        
       
 Route::get('/nvh-account-create', [NvhAccountController::class,'nvhcreate'])->name('nvhAccount.nvhcreate');

 Route::get('/nvh-account-showData',[NvhAccountController::class,'nvhshowDataa'])->name('nvhaccount.nvhshowData');

 Route::get('/nvh-account-list' ,[NvhAccountController::class,'nvhlist'])->name('nvhlists.list');
        
 Route::get('/nvh-account-all' ,[NvhAccountController::class,'nvhGetAll'])->name('nvhlists.getallaccount');