<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UpdateInventoryController;
use App\Http\Controllers\ConsumptionInventoryController;
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
    // return view('welcome');
    return redirect('login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
    Route::view('addparts', 'addparts')->name('addparts');
   
    
    Route::get('insert-parts', [ InventoryController::class, "insert" ])->name('insert-parts');
    Route::get('EditItem/{id}', [ InventoryController::class, "EditItem" ])->name('EditItem'); 
    Route::get('DeleteItem/{id}', [ InventoryController::class, "DeleteItem" ])->name('DeleteItem'); 
    Route::post('/addItems', [ InventoryController::class, "addItems" ])->name('/addItems');
    Route::post('/saveItems', [ InventoryController::class, "saveItems" ])->name('/saveItems');

    Route::get('UpQuantity', [ UpdateInventoryController::class, "update" ])->name('UpQuantity');
    Route::post('/UpdateQuantity', [ UpdateInventoryController::class, "Quantity" ])->name('/UpdateQuantity');

    Route::get('consumption', [ ConsumptionInventoryController::class, "consumptionmain" ])->name('consumption');
    Route::post('/useConsumption', [ ConsumptionInventoryController::class, "userConsumption" ])->name('/useConsumption');
    Route::post('/adminConsumption', [ ConsumptionInventoryController::class, "adminConsumption" ])->name('/adminConsumption');
    Route::post('/userkeluar', [ ConsumptionInventoryController::class, "userkeluar" ])->name('/usekeluar');
    Route::get('return/{id}', [ ConsumptionInventoryController::class, "return" ])->name('return'); 
    
    
});
