<?php

declare(strict_types=1);

namespace App\Order;


use App\Customer\CustomerProvider;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Customer;
use Symfony\Component\Workflow\WorkflowInterface;

class OrderSaver
{
    protected EntityManagerInterface $em;

    protected CustomerProvider $customerProvider;

    protected WorkflowInterface $workflow;
    public function __construct(EntityManagerInterface $em, CustomerProvider $customerProvider, WorkflowInterface $orderStates) {
        $this->em = $em;
        $this->customerProvider = $customerProvider;
        $this->workflow = $orderStates;
    }

    public function save(?Order $order = null) {
        // save the entity
        if($order['customerId']) {
            /** @var  Customer $customer */
            $customer = $this->customerProvider->fetch($order['customerId']);
        } else {
            $customer = new Customer();
        }

       $this->em->persist($order);
       $this->em->flush();

    }

    public function toPrepare(Order $order): void
    {
        $this->workflow->apply($order, 'to_prepare');
    }

    public function toOven(Order $order) {
        $this->workflow->apply($order, 'to_oven');
    }

    public function delivery(Order $order) {
        $this->workflow->apply($order, 'delivery_in_progress');
    }

    public function delivered(Order $order) {
        $this->workflow->apply($order, 'delivered');
    }




}
