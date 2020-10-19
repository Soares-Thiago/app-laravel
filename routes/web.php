<?php

use Illuminate\Support\Facades\Route;
Route::any('products/search', 'ProductController@search')->name('products.search')->middleware('auth');

Route::resource("products", "ProductController")->middleware(['auth','check.is.admin']);

/*
Route::get('products/{id}/edit', "ProductController@edit")->name("products.edit");

Route::get('products/create', "ProductController@create")->name("products.create");

//redirecionando para um controller (app/http/controler/)
Route::get('products', "ProductController@index")->name("products.show");

Route::get('products/{id}', "ProductController@show")->name("products.index");

Route::post('products', "ProductController@store")->name("products.store");
Route::put('products/{id}', "ProductController@update")->name("products.update");
Route::delete('products/{id}', "ProductController@delete")->name("products.delete");
*/

//rota com name
Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/name-url', function () {
    return 'hey';
})->name('url.name');


//match e any
Route::match( ['post','get'], '/match', function(){
    return 'Match';
});

Route::any('/any',function(){
    return 'Any';
});

//views...
Route::view("/view",'welcome');

/*Route::get('/view', function () {
    return view('welcome');
    
});*/

//redirecionamento...
Route::get('/redirect1', function () {
    return redirect('/redirect2');
});

Route::get('redirect2', function () {
    return 'redirect 2';
    
});

//parametros de url
//opcional coloca ?
Route::get('/produtos/{idProduct?}', function ($idProduct="Todos os produtos") {
    return "produtos: ".$idProduct;
});

//parametro obrigatorio {} e depois outra url
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: ".$flag;
});

//parametro obrigatorio {}
Route::get('/categoria/{flag}', function ($flag) {
    return $flag;
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
    
});

//login
Route::get('/login', function () {
    return 'Login';
    
})->name('login');

//grupos de rotas...
//middleware é um filtro do laravel, o auth redireciona pra rota login
//rota login definida acima
/*
Route::middleware([])->group(function(){

    Route::prefix('admin')->group(function(){
       
        Route::get('/dashboard', function () {
            return 'Home Admin';
            
        });
        
        Route::get('/financeiro', function () {
            return 'Home Financeiro';
            
        });
        
        Route::get('/produtos', function () {
            return 'Home Produto';
            
        });
        Route::namespace('Admin')->group(function(){
            Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');
        
            Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');
            
            Route::get('/produtos', 'TesteController@teste')->name('admin.produtos');

            //controller
            Route::get('/','TesteController@teste')->name('admin.home');
        });

    });
    
});
*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
],function(){
    Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');
        
    Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');
            
    Route::get('/produtos', 'TesteController@teste')->name('admin.produtos');

    //controller
    Route::get('/','TesteController@teste')->name('admin.home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
