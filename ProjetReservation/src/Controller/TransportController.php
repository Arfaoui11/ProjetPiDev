<?php

namespace App\Controller;


use App\Repository\TransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransportController extends AbstractController
{
    /**
     * @Route("/transport", name="transport")
     */
    public function index(): Response
    {
        return $this->render('transport/index.html.twig', [
            'controller_name' => 'TransportController',
        ]);
    }
    /**
     * @param TransportRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/Affichetrans", name="AffiTrans")
     */
    public function Affiche(TransportRepository $repository)
    {

        $transport = $repository -> findAll();

        return $this -> render('transport/afficherr.html.twig',['transport' =>$transport]);
    }

/*
    /**
     * @param TransportRepository $repository
     * @param Request $request
     * @return Response
     * @Route("/SarchTrans",name="search")
     */
    /*
    function SearchType(TransportRepository $repository,Request $request)
    {

        if($request->get("rech") == null)
        {

            $transport = $repository -> findAll();
        }else
        {
            $type =$request->get('rech');
            $transport = $repository->SearchType($type);
        }

        return $this -> render('transport/afficherr.html.twig',['transport' =>$transport]);

    }
*/
}
