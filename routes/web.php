<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\DenyBlockedUsers;

use App\Models\Track;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Genre;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); // intentionally named "login" per "auth" middleware
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/invoices/{id}', [InvoiceController::class, 'show']);
Route::get('/albums/new', [AlbumController::class, 'create'])->name('album.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware([DenyBlockedUsers::class])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

        Route::view('/blocked', 'blocked')->name('blocked');
    });
});

Route::get('/eloquent-playground', function() {
    // QUERYING many records from a table
    // return Artist::all();
    // return Track::all();
    // return Artist::orderBy('Name', 'desc')->get();
    // return Track::where('UnitPrice', '>', 0.99)->orderBy('Name')->get();

    // QUERYING a record by the primary key column
    // return Artist::find(4);

    // CREATING
    // $genre = new Genre();
    // $genre->Name = 'Hip Hop';
    // $genre->save();
    // return Genre::all();

    // DELETING
    // Genre::where('Name', '=', 'Hip Hop')->delete();
    // return Genre::all();

    // UPDATING
    // $genre = Genre::where('Name', '=', 'Alternative & Punk')->first();
    // $genre->Name = 'Alternative and Punk';
    // $genre->save();
    // return Genre::all();

    // RELATIONSHIPS (ONE TO MANY)
    // return Artist::find(50); // 50 = Metallica
    // return Artist::find(50)->albums;
    // return Album::find(152)->artist; // 152 = Master of Puppets

    // return Track::find(1837); // 1837 = Seek and Destroy
    // return Track::find(1837)->genre;
    // return Genre::find(3)->tracks; // 3 = Metal

    return view('eloquent-playground', [
        // Lazy loading
        'tracks' => Track::where('UnitPrice', '>', 0.99)
            ->orderBy('Name')
            ->limit(20)
            ->get()

        // Eager loading
        // 'tracks' => Track::with(['genre', 'album'])
        //     ->where('UnitPrice', '>', 0.99)
        //     ->orderBy('Name')
        //     ->limit(20)
        //     ->get()
    ]);
});