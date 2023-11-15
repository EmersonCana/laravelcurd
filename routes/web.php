<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-testimonial', [TestimonialsController::class, 'viewForm']);
    Route::post('/create-testimonial', [TestimonialsController::class, 'submitForm']);

    Route::get('/edit-testimonial/{id}', [TestimonialsController::class, 'viewEditForm']);
    Route::patch('/edit-testimonial/{id}', [TestimonialsController::class, 'submitEditForm']);

    Route::delete('/delete-testimonial/{id}', [TestimonialsController::class, 'deleteTestimonial']);
});

require __DIR__.'/auth.php';
