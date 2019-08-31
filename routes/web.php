<?php

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

Route::get('/', 'PagesController@inicio') -> name('index');

//Para probar las rutas debajo, hay que comentar las demás.

// //Funcion que usa el método get para retornar una vista
// Route::get('hola', function(){
//     return 'Hola Mundo!';
// });

// Route::get('hello/{name}', function($name){
//     return 'Hello '.$name;
// });

// //Rutas con parametros desde la url
// Route::get('photos/{index}', function($index){
//     return 'Photo '.$index;
// });

// //Si queremos que el número sea una opción, el valor de la variable numero debe tener una asignación.
// Route::get('photos/{index?}', function($num = 'no escribiste un indice para la foto.'){
//     return 'Photo '.$num;
// });

// //Si queremos restringir que el parámetro sea de un tipo especifico, debemos añadir su expresión regular.
// //NOTE: la expresion regular, a pesar de que tiene la opcionalidad no tener un index, la funcion get() 
// //primero asigna el valor por default y lo muestra como una vista al usuario.
// Route::get('photos/{index?}', function($index = 'no escribiste un indice para la foto.'){
//     return 'Photo '.$index;
// })->where('index', '[0-9]*');

// //Para no usar explicitamente una funcion, se usa view() para las vistas.
// //NOTE: para pasar variables a las vistas se usan arreglos asociativos
// Route::view('photos', 'photos', ['numero' => 125]);

//Pagina del curso
//-----------------------------------------
Route::get('photos', 'PagesController@photos') -> name('photo');// Les asignamos un nombre para ahorrarnos la escritura de la ruta

Route::get('blog', 'PagesController@blog') -> name('blog');

Route::get('nosotros/{nombre?}', 'PagesController@nosotros') -> name('nosotros');

Route::post('/', 'PagesController@crear') -> name('notas.crear');

Route::get('notas/{id}', 'PagesController@detalle') -> name('notas.detalle');

Route::get('notas/edit/{id}', 'PagesController@edit') -> name('notas.edit');

Route::put('notas/edit/{id}', 'PagesController@update') -> name('notas.update');

Route::delete('notas/delete/{id}', 'PagesController@delete') -> name('notas.delete');
//-----------------------------------------

Route::get('operadores/+/{n1}/{n2}', function($n1, $n2){
    return 'Resultado: '.($n1 + $n2);
}) ->name('add');

Route::get('controlador/{name}', 'MyController@index');


// Route::get('ejemplo/blade',function(){
//     return view('ejemplo');
// });

Route::get('ejemplo/blade','MyController@mostrarVista');

Route::get('ejemplo/bienvenido','Welcome@msgWelcome');

//Ruta para controlador MultiplicaController -> se va al index
//Rute tipo resource accede mas facil a los metodos del controlador mas facil sin necesidad de poner @
Route::resource('doMultiplica', 'MultiplicaController')->names([
    'create' => 'multiplica', 
    'store' => 'result'
]);

Route::resource('operaciones', 'OperacionesController') ->names([
    'create' => 'operaciones',
    'store' => 'resultado'
]);
