<?php

namespace App\Queryfilters;

use Closure;
use Illuminate\Support\Str;


abstract class Filter
{
  
  public function handle($request, Closure $next){

    if(!request()->has($this->filterName())){

      return $next($request);
    }

      $builder = $next($request);
      
      return $this->applyFilter($builder);
      
  }

  protected abstract function applyFilter($builder);

  protected function filterName(){

    $string = Str::snake(class_basename($this)); // helper:snake()
    
    return Str::lower($string);

  }
}