<?php

use App\Http\Controllers\CampanaController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\InscritoController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacunaController;
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

//PAGINAS
Route::get('/', [PaginasController::class, 'home'])->name('home');
Route::get('/nosotros', [PaginasController::class, 'nosotros'])->name('pages.nosotros');
Route::get('/contactanos', [PaginasController::class, 'contactanos'])->name('pages.contactanos');

//VACUNAS
Route::get('/vacunas/index', [VacunaController::class, 'index'])->middleware(['auth', 'verified'])->name('vacunas.index');
Route::get('/vacunas/create', [VacunaController::class, 'create'])->middleware(['auth', 'verified'])->name('vacunas.create');
Route::get('vacunas/{vacuna}/edit', [VacunaController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacunas.edit');
Route::get('vacunas/{vacuna:nombre}', [VacunaController::class, 'show'])->middleware(['auth', 'verified'])->name('vacunas.show');

//CAMPAÑAS
Route::get('/dashboard', [CampanaController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('campanas.index');
Route::get('/campanas/create', [CampanaController::class, 'create'])->middleware(['auth', 'verified'])->name('campanas.create');
Route::get('/campanas/{campana}/edit', [CampanaController::class, 'edit'])->middleware(['auth', 'verified'])->name('campanas.edit');
Route::get('/campanas/{campana:titulo}', [CampanaController::class, 'show'])->middleware(['auth', 'verified'])->name('campanas.show');;

//INSCRITOS
Route::get('/inscritos/{campana}', [InscritoController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('inscritos.index');
Route::get('/inscritos/{inscrito}/edit', [InscritoController::class, 'edit'])->middleware(['auth', 'verified', 'rol.admin'])->name('inscritos.edit');

//NOTIFICACIONES
Route::get('/notificaciones', NotificacionController::class)->middleware('auth', 'verified', 'rol.admin')->name('notificaciones');

//---------------------------------------------USUARIOS--------------------------------------------------------
//PERSONAS
Route::get('/personas', [PersonaController::class, 'index'])->middleware(['auth', 'verified', 'rol.persona'])->name('personas.index');
Route::get('/personas/{campana:titulo}', [PersonaController::class, 'show'])->middleware(['auth', 'verified', 'rol.persona'])->name('personas.show');

//MASCOTAS
Route::get('/mascotas', [MascotaController::class, 'index'])->middleware(['auth', 'verified', 'rol.mascota'])->name('mascotas.index');
Route::get('/mascotas/{campana:titulo}', [MascotaController::class, 'show'])->middleware(['auth', 'verified', 'rol.mascota'])->name('mascotas.show');

//HISTORIALES
Route::get('/historiales', [HistorialController::class, 'index'])->middleware(['auth', 'verified', 'rol.usuario'])->name('historiales.index');
Route::get('/historiales/pdf', [HistorialController::class, 'pdf'])->middleware(['auth', 'verified', 'rol.usuario'])->name('historiales.pdf');
Route::get('/historiales/{inscrito}', [HistorialController::class, 'show'])->middleware(['auth', 'verified', 'rol.usuario'])->name('historiales.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });

require __DIR__.'/auth.php';