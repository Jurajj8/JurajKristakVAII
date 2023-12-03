<?php 

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TortaController;
use App\Http\Controllers\TortaAjaxController;
use App\Http\Controllers\ShoppingCartController;




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Zde můžete registrovat webové trasy pro vaši aplikaci. Všechny tyto
| trasy jsou nahrány prostřednictvím middleware 'web'. Příště budeme
| něco skvělého!
|
*/

// Domovská stránka
Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    // Přidání nové trasy pro profil
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('/profile/torty', [TortaController::class, 'getTorty'])->name('profile.torty');
    Route::get('/profile/create', [TortaController::class, 'create'])->name('profile.create');
    Route::get('/torty/{torta}/edit', [TortaController::class, 'edit'])->name('torty.edit');
    Route::patch('/torty/{torta}', [TortaController::class, 'update'])->name('torty.update');
    Route::delete('/torta-ajax/{id}', [TortaAjaxController::class, 'deleteTorta'])
    ->name('torta-ajax.delete');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/torty', [TortaController::class, 'store'])->name('torty.store');
    Route::get('/torty', [TortaController::class, 'index'])->name('torty.index');
    Route::get('/torty/{torta}/edit', [TortaController::class, 'edit'])->name('torty.edit');
    Route::put('/torty/{torta}', [TortaController::class, 'update'])->name('torty.update');
    Route::get('/get-torty', [TortaController::class, 'getTorty'])->name('torty.get');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/shopping-cart', [ShoppingCartController::class, 'index'])->name('shopping-cart.index');
    Route::post('/shopping-cart/add/{tortaId}', [ShoppingCartController::class, 'addToCart'])->name('shopping-cart.add');
    Route::delete('/shopping-cart/remove/{tortaId}', [ShoppingCartController::class, 'removeFromCart'])->name('shopping-cart.remove');
    Route::put('/shopping-cart/update/{tortaId}', [ShoppingCartController::class, 'updateQuantity'])->name('shopping-cart.update');

});



