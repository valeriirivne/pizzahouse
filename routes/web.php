<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

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


// Route::get('/pizzas', function () {
//     // get data from a database
//     // $pizzas = [
//     //     'type' => 'hawaiian', 'price' => 10
//     // ];

//     // return view('pizzas', $pizzas);

//     $pizzas = [
//         ['type' => 'hawaiian', 'base' => 'cheesy crust'],
//         ['type' => 'volcano', 'base' => 'garlic crust'],
//         ['type' => 'veg supreme', 'base' => 'thin & crispy']
//     ];
//     return view('pizzas', ['pizzas' => $pizzas]);
// });


// Route::get('/pizzas/{id}', function ($id) {
//     // use the $id variable to query the db for a record
//     return view('details', ['id' => $id]);
// });


// Route::get('/pizzas', 'PizzaController@index');
// Route::get('/pizzas/{id}', 'PizzaController@show');


#pizza view using PizzaController
Route::get('/pizzas', [PizzaController::class, 'index'])->middleware('auth');
Route::get('/pizzas/create', [PizzaController::class, 'create']);

Route::post('/pizzas', [PizzaController::class, 'store']);
#wildcards using PizzaController
Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->middleware('auth');
Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])->middleware('auth');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
