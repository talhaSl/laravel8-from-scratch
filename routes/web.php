<?php

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
    return view('hello');
});
route::get('hello/{hello2}',function($slug){
    // return $slug;
$hello2=__DIR__ ."/../resources/hello/".$slug.".html";

    if(!file_exists($hello2))
    {
        return redirect('/');
    }
   $hello2= cache()->remember("hello.{hello2}",5,function() use($hello2){

        return file_get_contents($hello2);
    
    });




    return view('hello2',[
        'hello2'=>$hello2
]);


})->where('hello2','[A-z_-]+');
Route::get('/', function () {
    return view('layout');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
