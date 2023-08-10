<?php

use App\Http\Controllers\CustomRegisteredUserController;
use App\Http\Controllers\EspectadorRegisterController;
use App\Http\Controllers\ParticipanteRegisterController;
use App\Http\Controllers\PropuestasAprobadasController;
use App\Http\Livewire\Administrador\FormValidarPropuestaParticipante;
use App\Http\Livewire\CategoriasComponent;
use App\Http\Livewire\FormPropuestaNueva;
use App\Http\Livewire\FormPropuestasAprobadas;
use App\Http\Livewire\FormPropuestasEnviadas;
use App\Http\Livewire\Administrador\PropuestasAdmin;
use App\Http\Livewire\PropuestasParticipante;
use App\Http\Livewire\PropuestasPublicadas;
use App\Http\Livewire\ShowPropuestas;
use App\Http\Livewire\UsersTable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/register-espectador', [EspectadorRegisterController::class, 'create'])->name('register-espectador.create');
Route::post('/register-espectador', [EspectadorRegisterController::class, 'store'])->name('register-espectador.store');

// Ruta para procesar la solicitud de registro de administradores
Route::get('/register', [CustomRegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [CustomRegisteredUserController::class, 'store']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/users', UsersTable::class)->name('users');  // --> Navegation users - table
    Route::post('/register-participante', [ParticipanteRegisterController::class, 'store'])->name('register-participante.store');
    Route::get('/propuestas-participante', PropuestasParticipante::class)->name('propuestas-participante');
    Route::get('/propuesta-nueva', FormPropuestaNueva::class)->name('propuesta-nueva');
    Route::get('/propuestas-aprobadas', FormPropuestasAprobadas::class)->name('propuestas-aprobadas');
    Route::get('/propuestas-enviadas', FormPropuestasEnviadas::class)->name('propuestas-enviadas');


    Route::get('/propuestas-admin', PropuestasAdmin::class)->name('propuestas-admin');
    Route::get('/propuestas-revision', FormValidarPropuestaParticipante::class)->name('propuestas-revision');
    Route::get('/dashboard', PropuestasPublicadas::class)->name('dashboard');


    Route::get('/show-propuestas/{user_id}', ShowPropuestas::class)
    ->name('show-propuestas');





});

