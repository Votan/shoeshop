<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductCardRepository;
use Twig\Environment;

class ShopController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Environment $twig, ProductCardRepository $productRepository): Response
    {
      return new Response($twig->render('shop/index.html.twig', [
        'products' => $productRepository->findByPopularArrivalsField(true),
      ]));
    }
}
