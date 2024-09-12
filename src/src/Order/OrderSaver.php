<?php

declare(strict_types=1);

namespace App\Order;


use App\Customer\CustomerProvider;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use NotificationProviderInterface;
use Symfony\Component\Workflow\WorkflowInterface;
use App\Factories\NotificationFactory;

class OrderSaver
{
    protected EntityManagerInterface $em;

    protected CustomerProvider $customerProvider;

    protected WorkflowInterface $workflow;

    protected NotificationFactory $factory;

    protected NotificationProviderInterface $provider;
    public function __construct(EntityManagerInterface $em, WorkflowInterface $orderStates, NotificationFactory $factory) {
        $this->em = $em;
        $this->workflow = $orderStates;
        $this->factory = $factory;
    }

    public function save(?Order $order = null) {
        // save the entity
       $this->em->persist($order);
       $this->em->flush();
        $this->provider = $this->factory->create($order->getCustomer()->getPreferredNotification());
       // the workflow should be triggered


    }

    public function toPrepare(Order $order): void
    {
        $this->workflow->apply($order, 'to_prepare');
        $this->provider->send('Your order is prepared');

    }

    public function toOven(Order $order) {
        $this->workflow->apply($order, 'to_oven');
        $this->provider->send('Is going to the oven');
    }

    public function delivery(Order $order) {
        $this->workflow->apply($order, 'delivery_in_progress');
        $this->provider->send('Is going to be delivered');
    }

    public function delivered(Order $order) {
        $this->workflow->apply($order, 'delivered');
    }




}
