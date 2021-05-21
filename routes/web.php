<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;

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
    return view('home');
})->name('/');

Route::get('listUser',            'App\Http\Controllers\UserController@listUser')->name('listUser');
Route::get('addUser',             'App\Http\Controllers\UserController@addUser')->name('addUser');
Route::post('storeUser',          'App\Http\Controllers\UserController@storeUser')->name('storeUser');
Route::get('deleteUser/{userid}', 'App\Http\Controllers\UserController@deleteUser')->name('deleteUser');
Route::get('viewUser/{userid}',   'App\Http\Controllers\UserController@viewUser')->name('viewUser');
Route::get('joinUser/{userid}',   'App\Http\Controllers\UserController@joinUser')->name('joinUser'); // teste de relacionamentos

Route::get('listProfile',               'App\Http\Controllers\ProfileController@listProfile')->name('listProfile');
Route::get('addProfile',                'App\Http\Controllers\ProfileController@addProfile')->name('addProfile');
Route::post('editProfile/{profile}',     'App\Http\Controllers\ProfileController@editProfile')->name('editProfile');
Route::post('storeProfile',             'App\Http\Controllers\ProfileController@storeProfile')->name('storeProfile');
Route::get('deleteProfile/{profileid}', 'App\Http\Controllers\ProfileController@deleteProfile')->name('deleteProfile');
Route::get('viewProfile/{profile}',   'App\Http\Controllers\ProfileController@viewProfile')->name('viewProfile');

//Fazer a localização dos verbos das rotas geradas via resource
Route::resourceVerbs([
    'create' => 'adicionar',
    'edit' => 'editar',
]);

// Criar todas as rotas usando o auxiliar do Laravel, afim de ficar evitando criar rotas de forma manual como acima
// quando se para a propriedade names, muda-se o prefixo do nome das rotas, parameter muda o nome da variavel
// se usar como parameters e nao parameter como abaixo, tem que se passar um array associativo, exemplo 'usuarios' => 'user'
Route::resource('post', 'App\Http\Controllers\PostController')->names('post')->parameter('post', 'postid');//->except(['index']);
// Criado rota para teste de relacionamento de modelos
Route::get('joinPost/{post}', 'App\Http\Controllers\PostController@joinPost')->name('joinPost');