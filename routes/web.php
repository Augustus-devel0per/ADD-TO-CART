<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TicketController::class, 'index'])->name('index.view');

Route::get('/add-ticket/', [TicketController::class, 'addTicket'])->name('ticket.add'); 

Route::post('/create-ticket', [TicketController::class, 'createTicket'])->name('ticket.create');

Route::get('/tickets', [TicketController::class, 'getTickets'])->name('ticket.get'); 

Route::get('/tickets/{id}', [TicketController::class, 'getTicketById'])->name('ticket.single'); 

Route::get('/cart-checkout', [CartController::class, 'cart'])->name('cart.checkout'); 


// ADD TO CART
Route::post('/insert-to-cart', [CartController::class, 'cartStore']); 





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
