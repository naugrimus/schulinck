<?php

declare(strict_types=1);

namespace App\Order;

use App\Repository\OrderRepository;

class OrderProvider
{

    protected OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository) {
        $this->orderRepository = $orderRepository;

    }
    public function fetchOrdersFromCustomer(Customer $customer): array {
        return $this->orderRepository->findBy(['customer' => $customer]);
    }
}
