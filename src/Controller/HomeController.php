<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController


{

    public function bonjour()
    {
        return new Response("bonjour à toutes et à tous");
    }

    public function aurevoir()
    {
        return $this->redirectToRoute('accueil');
    }

    public function redirecToLinkedIn()
    {
        return $this->redirect('https://www.linkedin.com');
    }

    public function showtemplate()
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/products", name="products_list")
     */
    public function showproduct()
    {

        $products = ['ordinateur', 'telephone', 'radio', 'cassette'];
        return $this->render('product.html.twig', ['products' => $products]);
    }

    #[Route('/customers', name:'customers_list')]
    public function showCustomers()
    {
        $customers = ['laurent','yves','alain','gérard'];
        return $this->render('customer.html.twig',['customers' => $customers]);
    }

    #[Route('/category/{id<\d+>}', name:"category")]
    public function getCategorie(int $id)
    {
        $category_id = $id;

        return $this->render('category.html.twig', ['id_category' => $category_id]);
    }
    #[Route('/pages', name: "pages")]
    public function getPages()
    {
        return $this->render('page.html.twig', []);
    }

}
