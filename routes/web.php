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

Route::get('/', function () {
    return view('index');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('movimiento/caja/{id_caja}', 'MovimientoController@caja')->name('movimiento.caja');
Route::get('sucursal/caja/{id_sucursal}', 'CajaController@cajas')->name('sucursal.caja');
Route::get('caja/detalle/{id_caja}', 'DetalleController@historico')->name('Detalle.caja');
Route::get('cuenta/historico/{id_cuenta}', 'CuentaController@historico')->name('cuenta.historico');
Route::get('cliente/reporte', 'ClienteController@reporteCreate');
Route::post('cliente/reporte/ver', 'ClienteController@reporteStore')->name('cliente.reporteStore');


Route::resource('banco', 'BancoController');
Route::resource('banco', 'BancoController');
Route::resource('cliente', 'ClienteController');
Route::resource('sucursal', 'SucursalController');
Route::resource('caja', 'CajaController');
Route::resource('detalle', 'DetalleController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cliente', 'ClienteController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cliente', 'ClienteController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cuenta', 'CuentaController');
Route::resource('cuenta', 'CuentaController');
Route::resource('tipo-cuenta', 'TipoCuentaController');
Route::resource('movimiento', 'MovimientoController');
Route::resource('transaccion', 'TransaccionController');
Route::resource('historico', 'HistoricoController');
Route::resource('moneda', 'MonedaController');
Route::resource('cambio', 'CambioController');
Route::resource('banco-moneda', 'BancoMonedaController');
Route::resource('usuario', 'UsuarioController');
Route::resource('rol', 'RolController');
Route::resource('modulo', 'ModuloController');
Route::resource('menu', 'MenuController');
Route::resource('caso-uso', 'CasoUsoController');
Route::resource('usuario-banco', 'UsuarioBancoController');
Route::resource('rol-cu', 'RolCuController');
Route::resource('banco-modulo', 'BancoModuloController');
Route::resource('backup-restore', 'BackupRestoreController');
Route::resource('bitacora', 'BitacoraController');
Route::get('/pdf', 'PDFcontroller@pdf');
Route::get('/excel', 'ExcelCntroller@excel');


//rutas Web Services Android
Route::get('login/{correo}', 'ConsultasWSController@login');
Route::get('bancos', 'ConsultasWSController@bancos');
Route::get('datos/{correo}', 'ConsultasWSController@datos');
Route::get('historia/{correo}', 'ConsultasWSController@historia');
Route::get('saldo/{correo}', 'ConsultasWSController@saldo');
Route::get('transaccion/{banco}/{fecha}/{monto}/{cuentaO}/{cuentaD}', 'ConsultasWSController@transaccion');
Route::get('mapa/{correo}', 'ConsultasWSController@mapa');


Route::resource('atm', 'AtmController');
Route::resource('atm', 'AtmController');
Route::resource('credito', 'CreditoController');
Route::resource('pago', 'PagoController');
Route::resource('dpf', 'DpfController');
Route::resource('tipo-dpf', 'TipoDpfController');
Route::resource('dpf', 'DpfController');
Route::resource('tipo-dpf', 'TipoDpfController');