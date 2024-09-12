<?php

namespace App\Form\Type;

use App\Entity\Customer;
use App\Entity\PizzaBottom;
use App\Entity\Pizzeria;
use App\Entity\Topping;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class OrderType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('POST')
            ->add('pizzeria', EntityType::class ,
            [
                'class' => Pizzeria::class,
                'choice_label' => 'name',
            ])
            ->add('pizzabottom', EntityType::class ,
                [
                    'class' => PizzaBottom::class,
                    'choice_label' => 'name',
                ])
            ->add('topping', EntityType::class ,
                [
                    'class' => Topping::class,
                    'choice_label' => 'name',
                ])
            ->add('customer', CustomerType::class)
            ->add('save', SubmitType::class,
            [
                'label' => 'Plaats bestelling'
            ]);



    }
}