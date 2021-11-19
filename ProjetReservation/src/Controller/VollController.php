<?php

namespace App\Controller;


use App\Repository\VolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VollController extends AbstractController
{
    /**
     * @Route("/voll", name="voll")
     */
    public function index(): Response
    {
        return $this->render('voll/index.html.twig', [
            'controller_name' => 'VollController',
        ]);
    }

    /**
     * @param VolRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/Affichevol", name="AffiVoll")
     */
    public function Affiche(VolRepository $repository)
    {

        $voll = $repository -> findAll();
        return $this -> render('voll/affichervoll.html.twig',['voll' =>$voll]);
    }
/*
    /**
     * @param VolRepository $repository
     * @param Request $request
     * @return Response
     * @Route("voll/SarchVol",name="search")
     */
/*
    function SearchType(VolRepository $repository,Request $request)
    {

        if($request->get("rech") == null)
        {

            $voll = $repository -> findAll();
        }else
        {
            $nom =$request->get('rech');
            $voll = $repository->SearchNom($nom);
        }

        return $this -> render('voll/affichervoll.html.twig',['voll' =>$voll]);

    }
*/

}
