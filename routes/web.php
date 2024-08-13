<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'servicios' => Servicio::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('medicos', MedicoController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('citas', CitaController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('productos', ProductoController::class);
    Route::post('/servicios/tipo-servicio/store', [ServicioController::class, 'storeTipoServicio'])->name('servicios.storeTipoServicio');
    Route::get('agenda', [CitaController::class, 'showAgenda'])->name('agenda');

    Route::get('/estudios', [EstudioController::class, 'index'])->name('estudios.index');
    Route::post('/estudios/store', [EstudioController::class, 'store'])->name('estudios.store');
});

Route::get('/consultas/create/{cita}', [ConsultaController::class, 'create'])->name('consultas.create')->middleware(['auth', 'verified']);
Route::resource('consultas', ConsultaController::class)->middleware(['auth', 'verified'])->except([
    'create'
]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::match(['get', 'post'], '/receive-data', [DataController::class, 'receiveData'])->name('dataset');
Route::post('/actualizar-dataset', [DataController::class, 'actualizarData'])->name('actualizar.dataset');
Route::post('/send-data', [DataController::class, 'predecir'])->name('predecir');
Route::get('/mostrar-salida/{salida}', [DataController::class, 'mostrarSalida'])->name('mostrarSalida');


Route::get('/download-file', function () {
    $file = storage_path('datasets/dataset.csv');
    return response()->download($file);
});


require __DIR__ . '/auth.php';

