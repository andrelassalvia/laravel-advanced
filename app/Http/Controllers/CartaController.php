<?php

namespace App\Http\Controllers;


use App\Models\Carta;


class CartaController extends Controller
{
    public function index(){

        $cartas = Carta::allCartas();

        return view('post.index', compact('cartas'));

        /*
        $cartas = Carta::query();
        
        // dd($cartas);
        if(request()->has('active')){

            $cartas->where('active', request('active'));
        }

        if(request()->has('sort')){

            $cartas->orderBy('title', request('sort'));
        }

        $cartas = $cartas->get();

        return view('post.index', compact('cartas'));
        */

    }
}
