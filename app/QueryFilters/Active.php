<?php

namespace App\Queryfilters;

class Active extends Filter
{
  
    protected function applyFilter($builder)
    {
      return $builder->where($this->filterName(), request($this->filterName()));
    }

    // if(!request()->has('active')){

    //   return $next($request); // se nao houver active no request chama o proximo request
    // }

    // $builder = $next($request); // do contrario chama o proximo request que tera um valor definido aqui dentro
    // $builder->where('active', request('active'));

    // return $builder;

  

}