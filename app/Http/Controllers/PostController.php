<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class PostController extends Controller
{
    public function create(){

       

        return view ('post.create');

    }
}
