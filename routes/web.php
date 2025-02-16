<?php

use App\Http\Controllers\employeesController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\positionController;
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
    return view('welcome');
});


Route::get('app', function () {
    return view('source.sesion');
})->name('app');

Route::get('registerU', function () {
    return view('source.register');
})->name('registerU');
Route::get('index', function () {
    return view('source.index');
})->name('index');

Route::post('/register', [loginController::class, 'registerUser'])->name('register_u');
Route::post('/login', [loginController::class, 'loginUser'])->name('login');
Route::post('/logout', [loginController::class, 'logoutUser'])->name('logout');


//Espacio para rutas de empleados

Route::get('/registerEc', [employeesController::class, 'employeeR'])->name('registerEc');
Route::get('/getCities/{stateId}', [employeesController::class, 'getCities']);
Route::post('/registerE', [employeesController::class, 'registerEmployee'])->name('register_e');
Route::get('/employees', [employeesController::class, 'searchEmployee'])->name('employeesList');
Route::get('/employeesE/{id}', [employeesController::class, 'searchEmployeeE'])->name('employeesEdit');
Route::post('/editEmp/{id}', [employeesController::class, 'editEmployee'])->name('edit_e');
Route::get('/deleteEmp/{id}', [employeesController::class, 'deleteEmployee'])->name('delete_e');

// Espacio para rutas de Cargos

Route::get('/positions', [positionController::class, 'positionEmployee'])->name('positionList');
Route::get('/registerP', [positionController::class, 'positionR'])->name('registerP');
Route::post('/registerEP', [positionController::class, 'registerPosition'])->name('register_ep');
Route::get('/getPositions/{areaId}/{roleId}', [PositionController::class, 'validateArea'])->name('getPositions');
Route::get('/positionsE/{id}', [PositionController::class, 'searchPositionE'])->name('positionsEdit');
Route::post('/editPos/{id}', [PositionController::class, 'editPosition'])->name('edit_pos');
Route::get('/deletePos/{id}', [PositionController::class, 'deletePosition'])->name('delete_pos');









