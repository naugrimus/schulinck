<?php

namespace App\Customer;

use App\Repository\CustomerRepository;
use App\Components\Interfaces\ProviderInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerProvider implements \ProviderInterface
{
    protected CustomerRepository $repository;

    public function __construct(CustomerRepository $repository) {
        $this->repository = $repository;
    }

    public function fetch(int $providedId) {
        $customer = $this->repository->find($providedId);
        if(!$customer) {
            throw new HttpException(404, 'NOT FOUND');
        }
        return $customer;
    }
}