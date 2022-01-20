<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{

  public function all(){

    return Customer::orderBy('id', 'asc')->where('active', 1)->with('user')->get();

  }

  public function findById($customerId){

    return Customer::where('id', $customerId)->where('active', 0)->firstOrFail()->format();

  }

  public function findByUsername(){

  }

  public function update($customerId)
  {

    $customer = Customer::where('id', $customerId)->firstOrFail();

    $customer->update(request()->only('name'));

  }

  public function delete($customerId)
  {

    $customer = Customer::where('id', $customerId)->delete();

  }

}