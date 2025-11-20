<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function index()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon?limit=20');
        $pokemons = $response->json()['results'];

        return view('pokemons.index', compact('pokemons'));
    }

    public function show($name)
    {
        $pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/$name")->json();
        return view('pokemons.show', compact('pokemon'));
    }

    public function evolution($name)
    {
        $pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/$name")->json();
        $species = Http::get($pokemon['species']['url'])->json();
        $evolutionChain = Http::get($species['evolution_chain']['url'])->json();

        return view('pokemons.evolution', compact('evolutionChain', 'name'));
    }
}
