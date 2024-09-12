<?php

declare(strict_types=1);

namespace App\Controller;


use App\Customer\CustomerProvider;
use App\Form\Type\OrderType;
use App\Entity\Order;

use App\Order\OrderProvider;
use App\Order\OrderSaver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends  AbstractController
{
    protected OrderSaver $saver;

    protected CustomerProvider $customerProvider;

    protected OrderProvider $orderProvider;

    public function __construct(OrderSaver $saver, CustomerProvider $customerProvider, OrderProvider $orderProvider) {
        $this->saver = $saver;
        $this->customerProvider = $customerProvider;
        $this->orderProvider = $orderProvider;
    }

    public function index(Request $request): Response
    {
        $customer = null;
        $orders = null;

        if($request->get('customer')) {
           $customer = $this->customerProvider->fetch((int)($request->get('customer')));
           $orders = $this->orderProvider->fetchOrdersFromCustomer($customer);
        }

        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if($customer) {
                $form->setData(['customer_id' => (int)($request->get('customer'))]);
            }
          $this->saver->save($form->getData());
          return $this->redirect('/?customer=' . $order->getCustomer()->getId());
        }


        return $this->render('index.html.twig',
            [
                'form' => $form->createView(),
                'orders' => $orders
            ]
        );
    }
}
