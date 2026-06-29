<?php

use App\Livewire\Servers\Index as ServerIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('server', ServerIndex::class)->name('server.list');
});

require __DIR__ . '/settings.php';
