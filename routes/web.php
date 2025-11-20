<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/', function () {
    return redirect('/pokemons');
});

Route::get('/pokemons', [PokemonController::class, 'index']);
Route::get('/pokemons/{name}', [PokemonController::class, 'show']);
Route::get('/pokemons/{name}/evolution', [PokemonController::class, 'evolution']);
