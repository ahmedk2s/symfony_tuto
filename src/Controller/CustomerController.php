<?php

namespace App\Controller;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Customer;
use App\Service\MyHelper;
use Psr\Log\LoggerInterface;

class CustomerController extends AbstractController
{
    #[Route('/formcustomer', name: 'formcustomer')]
    public function index(Request $request, ManagerRegistry $doctrine, LoggerInterface $logger, MyHelper $helper)
    {
        $date =$helper->getTheDate();
        $customer = new Customer();
        $customerform = $this->createForm(CustomerType::class);

        $customerform->handleRequest($request);

        if($customerform->isSubmitted() && $customerform->isValid())
        {
           $entitymanager = $doctrine->getManager();
           $client = $customerform->getData();
           $logger->log('info','un client a été ajouté');
           
           $entitymanager->persist($client);
           $entitymanager->flush();
        }

        return $this->render('customer/index.html.twig', [
            'customerform' => $customerform->createView(),
            'date' => $date
        ]);
    }
}
