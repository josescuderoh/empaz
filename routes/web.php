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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::get('/registro', 'ProfileController@registro');
Route::post('/registro', 'ProfileController@saveRegistro');
Route::get('/registro/exito', 'ProfileController@registroExito');
Route::get('/restablecer', 'Auth\ResetPasswordController@restablecerSent')->name('auth.passwords.reset_sent');
Route::get('/restablecer/exito', 'Auth\ResetPasswordController@resetPasswordSuccess')->name('auth.passwords.reset_success');
Route::get('/home', function () { return redirect('/');});
Route::get('/login', function () { return redirect('/');});
Route::resource('glosario', 'GlosarioController');
Route::resource('faqs', 'FaqController');
Route::get('/acerca', 'AcercaController@index')->name('acerca');
Route::get('/manual', 'ManualController@index')->name('manual');
Route::get('/admin', 'AdmController@index')->name('admin');
Route::get('/users/{id}/activate/{code}', 'ProfileController@activateAccount');

Route::group(array('prefix' => 'files'), function() {
  Route::get('/', 'FilesController@index');
  Route::post('/', 'FilesController@store');
});

Route::get('/genealabs/laravel-caffeine/drip', function() {
    return response(null, 204);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/user', 'ProfileController@profileUser');
    // Reportes
    Route::get('reportes/{cuest_id}', 'DashboardController@resultadoCuestionario');

    Route::middleware(['empresa'])->group(function () {
        Route::get('/profile/{id}/edit', 'ProfileController@editEmpresa');
        Route::post('/profile/{id}/edit', 'ProfileController@updateEmpresa');
        Route::get('/profile/empresa', 'ProfileController@profileEmpresa');
        Route::post('/profile/empresa/{id}', 'ProfileController@saveEmpresa');
        // Responder Cuestionario Routes
        Route::get('/responder', 'ResponderController@all');
        Route::get('/responder/{id}', 'ResponderController@index');
        Route::post('/responder/{id}', 'ResponderController@store');
        Route::get('/responder/edit/{id}', 'ResponderController@edit');
        Route::post('/responder/edit/{id}', 'ResponderController@update');
    });

    Route::middleware(['superadmin'])->group(function () {
        // Users Routes
        Route::get('/users', 'UserController@index');
        Route::get('/users/new/{role}', 'UserController@create');
        Route::post('/users', 'UserController@store');
        Route::get('/users/{id}/edit', 'UserController@edit');
        Route::post('/users/{id}', 'UserController@update');
        Route::get('/users/{id}', 'UserController@show');
        Route::get('/users/{id}/delete', 'UserController@delete');
        Route::post('/users/{id}/delete', 'UserController@deleteConfirm');
    });

    Route::middleware(['consulta'])->group(function () {
        Route::get('/dashboard', 'DashboardController@index');
        Route::get('/dashboard/{cuest_respuesta_id}', 'DashboardController@view');
        Route::get('/dashboard/cuestionario/{cuest_id}', 'DashboardController@indexCuest');
    });

    Route::middleware(['experto'])->group(function () {
         // Dimensiones Routes
        Route::get('/dimensiones', 'DimensionesController@index');
        Route::get('/dimensiones/new/', 'DimensionesController@create');
        Route::post('/dimensiones', 'DimensionesController@store');
        Route::get('/dimensiones/{id}/edit', 'DimensionesController@edit');
        Route::post('/dimensiones/{id}/indicadores/{indicador_id}/delete',
                'DimensionesController@deleteIndicadores');
        Route::post('/dimensiones/{id}', 'DimensionesController@update');
        Route::get('/dimensiones/{id}', 'DimensionesController@show');
        Route::get('/dimensiones/{id}/delete', 'DimensionesController@delete');
        Route::post('/dimensiones/{id}/delete', 'DimensionesController@deleteConfirm');

    // Indicadores Routes
        Route::get('/indicadores', 'IndicadoresController@index');
        Route::get('/indicadores/new/', 'IndicadoresController@create');
        Route::post('/indicadores', 'IndicadoresController@store');
        Route::get('/indicadores/{id}/edit', 'IndicadoresController@edit');
        Route::post('/indicadores/{id}/preguntas/{pregunta_id}/delete',
                'IndicadoresController@deletePreguntas');
        Route::post('/indicadores/{id}', 'IndicadoresController@update');
        Route::get('/indicadores/{id}', 'IndicadoresController@show');
        Route::get('/indicadores/{id}/delete', 'IndicadoresController@delete');
        Route::post('/indicadores/{id}/delete', 'IndicadoresController@deleteConfirm');

    // Preguntas Routes
        Route::get('/preguntas', 'PreguntasController@index');
        Route::get('/preguntas/new/', 'PreguntasController@create');
        Route::post('/preguntas', 'PreguntasController@store');
        Route::get('/preguntas/{id}/edit', 'PreguntasController@edit');
        Route::post('/preguntas/{id}', 'PreguntasController@update');
        Route::get('/preguntas/{id}', 'PreguntasController@show');
        Route::get('/preguntas/{id}/delete', 'PreguntasController@delete');
        Route::post('/preguntas/{id}/delete', 'PreguntasController@deleteConfirm');

        // Cuestionarios Routes
        Route::get('/cuestionarios', 'CuestionariosController@index');
        Route::post('/cuestionarios', 'CuestionariosController@store');
        Route::get('/cuestionarios/{id}/edit', 'CuestionariosController@edit');
        Route::post('/cuestionarios/{id}/dimensiones/{dimension_id}', 'CuestionariosController@storeDimensiones');
        Route::post('/cuestionarios/{id}/dimensiones/{dimension_id}/delete',
                'CuestionariosController@deleteDimensiones');
        Route::post('/cuestionarios/{id}', 'CuestionariosController@update');
        Route::get('/cuestionarios/{id}/copy', 'CuestionariosController@getCopy');
        Route::post('/cuestionarios/{id}/copy', 'CuestionariosController@postCopy');
        Route::get('/cuestionarios/{id}/delete', 'CuestionariosController@delete');
        Route::post('/cuestionarios/{id}/delete', 'CuestionariosController@deleteConfirm');

        // Wizard Steps
        Route::get('/cuestionarios/new', 'WizardController@new');
        Route::get('/cuestionarios/{cuest_id}/dimensiones/',
                'WizardController@dimensiones');
        Route::get('/cuestionarios/{cuest_id}/dimensiones/validate', 'WizardController@validateDimensiones');
        Route::get('/cuestionarios/{cuest_id}/indicadores', 'WizardController@indicadores');
        Route::post('/cuestionarios/{id}/indicadores/{indicador_id}', 'DimensionesController@storeIndicadores');
        Route::get('/cuestionarios/{cuest_id}/preguntas/', 'WizardController@preguntas');
        Route::get('/cuestionarios/{cuest_id}/preguntas/validate', 'WizardController@validatePreguntas');
        Route::post('/cuestionarios/{id}/preguntas/{pregunta_id}', 'IndicadoresController@storePreguntas');

        // Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('/password/email', 'Auth\ResetPasswordController@sendResetLinkEmail')->name('password.email');

        // Route::get('/password/reset{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    });
});
