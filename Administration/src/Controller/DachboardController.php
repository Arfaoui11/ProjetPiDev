<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DachboardController extends AbstractController
{
    /**
     * @Route("/dachboard", name="dachboard")
     */
    public function index(): Response
    {
        return $this->render('acuille.html.twig', [
            'controller_name' => 'DachboardController',
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function index2(): Response
    {
        return $this->render('contact.html.twig', [

        ]);
    }


}
