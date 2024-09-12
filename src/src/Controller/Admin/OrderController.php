<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends  AbstractController
{
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
}
