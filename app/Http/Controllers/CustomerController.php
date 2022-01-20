<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    //

    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        
    }
    public function index(){

        $customers = $this->customerRepository->all();

       

        // dd($customers);

        return view ('customer.customers', compact('customers'));
    }

    public function show($customerId){

        return $this->customerRepository->findById($customerId);
    }

    public function update($customerId)
    {

        $this->customerRepository->update($customerId);

        return redirect('/customers/'.$customerId);

    }

    public function destroy($customerId)
    {

        $this->customerRepository->delete($customerId);

        return redirect('/customers');

    }
}
