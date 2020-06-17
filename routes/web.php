<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

/*
 * Aufruf der Haupt-URL (/) sowie /home geben Home-View zurück
 */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/*
 * Automatische Routs für Auth()
 */
Auth::routes();

/*
 * Resouceful Routes für die diversen Models
 */
Route::resource('itemCondition', 'ItemConditionController');
Route::resource('itemType', 'ItemTypeController');
Route::resource('warehouse', 'WarehouseController');
Route::resource('storage_location', 'StorageLocationController');
Route::resource('storage_place', 'StoragePlaceController');
Route::resource('brand', 'BrandController');


/*
 * Routes für Item
 */
Route::resource('item', 'ItemController');
Route::get('/item/search', 'ItemController@search')->name('item.search');
Route::get('/item/result', 'ItemController@result')->name('item.result');
