<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;
use App\Queryfilters\Active;
use App\Queryfilters\Sort;
use App\Queryfilters\MaxCount;

class Carta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function allCartas(){

        $cartas = app(Pipeline::class)->send(Carta::query())->through([Active::class, Sort::class, MaxCount::class])->thenReturn()->get();

        return $cartas;
    }
}
