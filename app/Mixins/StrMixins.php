<?php

namespace App\Mixins;

use Illuminate\Support\Str;

class StrMixins 
{
  public function partNumber(){

    return function($part){
      return 'ORDER-'.Str::substr($part, 0, 5).':'.Str::substr($part, 5);
    };
  }

  
}