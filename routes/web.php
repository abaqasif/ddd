<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/user','UserController');
Route::resource('/page','PageController');
Route::resource('/access','AccessController');
Route::resource('/inventory','InventoryController');
Route::resource('/production/recipe', 'RecipeController');
Route::resource('/production/batch', 'BatchController');
Route::resource('/production/batch/{batch}/tests','Test');
Route::resource('/production/recipe/{recipe}/rm','RMController');
Route::resource('/production/batch/{batch}/fill', 'FillingController');
Route::resource('/production/wastage','WastageController');


Route::get('/production', 'ProductionController@home');



//User
Route::get('/user/home','UserController@home');
Route::get('/user/done', 'UserController@done');
Route::get('/user/updateList', 'UserController@updateList');
Route::get('/user/delete', 'UserController@delete');

//Page
Route::get('/page/home', 'PageController@home');
Route::get('/page/done', 'PageController@done');
Route::get('/page/updateList', 'PageController@updateList');
Route::get('/page/delete', 'PageController@delete');


//Access Rights
Route::get('/access/home', 'AccessController@home');
Route::get('/access/updateList', 'AccessController@updateList');
Route::get('/access/delete', 'AccessController@delete');




//batch stuff
Route::get('/production/batch/{batch}/update_home', 'BatchController@update_home');
Route::post('/production/batch/{batch}/update_rm', 'BatchController@update_rm');
Route::get('/production/batch/{batch}/update_add/{raw_material}', 'BatchController@update_add');
Route::get('/production/batch/{batch}/complete_batch', 'BatchController@complete_batch');
Route::get('/production/batch/{batch}/update_header', 'BatchController@update_header');
Route::patch('/production/batch/{batch}/header_update_store', 'BatchController@header_update_store');
Route::patch('/production/batch/{batch}/update_add/{raw_material}/rm_update_store', 'BatchController@rm_update_store');
Route::post('/production/batch/{batch}', 'BatchController@additional_rm');
Route::get('/production/batch/{batch}/del_rm/{raw_material}', 'BatchController@delete_rm');
Route::get('/production/batch/{batch}/del_update/{raw_material}', 'BatchController@delete_update');
Route::post('/production/batch/{batch}/done', 'BatchController@batch_done');

//Filling of a batch
Route::get('/production/batch/{batch}/lock_filling', 'FillingController@lock');
Route::get('/production/batch/{batch}/fill', 'FillingController@home');

//Batch Test
//Route::get('/production/batch/{batch}/tests/create_home', 'Test@lock');


//Items
Route::get('/production/item', 'ItemController@home');
Route::post('/production/item/rtrv', 'ItemController@rtrv_item');

//Inventory
Route::get('/inventory' , 'InventoryController@control_screen');

//Recipe
Route::get('/production/recipe/{recipe}/update', 'RecipeController@update_home');
Route::get('/production/recipe/{recipe}/rm_list', 'RecipeController@rm_list');


Route::post('/production/recipe/{recipe}/update_done', 'RecipeController@update_recipe_done');
Route::get('/production/recipe/{recipe}/{raw_material_id}/delete', 'RecipeController@delete_rm');
Route::get('/production/recipe/{recipe}/add_rm', 'RMController@add_rm');

//Reports
Route::get('production/dpr', 'ReportController@dpr_home');
Route::post('production/dpr_get', 'ReportController@get_dpr');
Route::get('production/mixing_paper/select_batch', 'ReportController@mixing_home');
Route::post('production/mixing_paper', 'ReportController@get_mixing_paper');
Route::get('production/mixing_cost/select_batch', 'ReportController@mixing_cost_home');
Route::post('production/mixing_paper_cost', 'ReportController@get_mixing_cost');


