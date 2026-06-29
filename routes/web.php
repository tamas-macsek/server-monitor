<?php

use App\Livewire\Servers\Create as ServerCreate;
use App\Livewire\Servers\Edit as ServerEdit;
use App\Livewire\Servers\Index as ServerIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('server', ServerIndex::class)->name('server.list');
    Route::livewire('server/create', ServerCreate::class)->name('server.create');
    Route::livewire('server/{server}', ServerEdit::class)->name('server.edit');
});

require __DIR__ . '/settings.php';
