<?php

namespace App\Repositories\Impl;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryImpl;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ICustomerRepository;

class CustomerRepository extends EloquentRepository implements ICustomerRepository
{

    public function getModel()
    {
        return Customer::class;
    }
}
