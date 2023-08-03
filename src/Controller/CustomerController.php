<?php

namespace App\Controller;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 


class CustomerController extends AbstractController
{
    #[Route('/formcustomer', name: 'formcustomer')]
    public function index()
    {
        $customerform = $this->createForm(CustomerType::class);
        return $this->render('customer/index.html.twig', [
            'customerform' => $customerform->createView()
        ]);
    }
}
