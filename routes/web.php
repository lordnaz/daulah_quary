<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UpdateInventoryController;
use App\Http\Controllers\ConsumptionInventoryController;
use App\Http\Controllers\MaintenanceController;

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
    // Route::view('calendar', 'calendar')->name('calendar');
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
    Route::get('History', [ ConsumptionInventoryController::class, "History" ])->name('History');

    Route::get('/report', [ MaintenanceController::class, "index" ])->name('report');
    Route::post('/add_report', [ MaintenanceController::class, "add_report" ])->name('add_report');
    Route::get('/view_report', [ MaintenanceController::class, "view_report"])->name('view_report');

    //Category Data view
    Route::get('PlantSpare', [ InventoryController::class, "PlantSpare" ])->name('PlantSpare');
    Route::get('machinery', [ InventoryController::class, "Machinery" ])->name('machinery');
    Route::get('Tool', [ InventoryController::class, "Tool" ])->name('Tool');
    Route::get('Consumeable', [ InventoryController::class, "Consumeable" ])->name('Consumeable');

    //Quantity plus and minus
    Route::get('Plus/{id}', [ InventoryController::class, "Plus" ])->name('Plus'); 
    Route::get('Minus/{id}', [ InventoryController::class, "Minus" ])->name('Minus'); 
    Route::get('Plus1/{id}', [ InventoryController::class, "Plus1" ])->name('Plus1'); 
    Route::get('Minus1/{id}', [ InventoryController::class, "Minus1" ])->name('Minus1'); 
    Route::get('Plus2/{id}', [ InventoryController::class, "Plus2" ])->name('Plus2'); 
    Route::get('Minus2/{id}', [ InventoryController::class, "Minus2" ])->name('Minus2'); 
    Route::get('Plus3/{id}', [ InventoryController::class, "Plus3" ])->name('Plus3'); 
    Route::get('Minus3/{id}', [ InventoryController::class, "Minus3" ])->name('Minus3'); 
    Route::get('Plus4/{id}', [ InventoryController::class, "Plus4" ])->name('Plus4'); 
    Route::get('Minus4/{id}', [ InventoryController::class, "Minus4" ])->name('Minus4'); 

    //ACTION REPORT
    Route::get('EditReport/{id}', [ MaintenanceController::class, "EditReport" ])->name('EditReport');
    Route::get('DeleteReport/{id}', [ MaintenanceController::class, "DeleteReport" ])->name('DeleteReport'); 
    Route::post('/save_report', [ MaintenanceController::class, "save_report" ])->name('save_report'); 



    
    
});
