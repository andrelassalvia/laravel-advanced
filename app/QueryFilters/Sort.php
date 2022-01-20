<?php

namespace App\Queryfilters;

class Sort extends Filter
{

  protected function applyFilter($builder)
  {
    return $builder->orderBy('title', request($this->filterName()));
  }

  // public function handle($request, Closure $next){

  //   if(!request()->has('sort')){

  //     return $next($request);
  //   }

  //   $builder = $next($request);
  //   $builder = $builder->orderBy('title', request('sort'));
  //   return $builder;

  // }

}