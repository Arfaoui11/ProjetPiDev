<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
    /**
     * @Route("/hotel", name="hotel")
     */
    public function index()
    {
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController',
        ]);
    }

    /**
     * @param HotelRepository $repository
     * @return Response
     * @Route ("/aff",name="aff")
     */
    public function Affiche(HotelRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(Hotel::class);
        $hotel=$repository->findAll();
        return $this->render("hotel/afficher.html.twig",['hotel'=>$hotel]);
    }

    /**
     * @param HotelRepository $repository
     * @return Response
     * @Route ("/affFront",name="affFront")
     */
    public function AfficheFront(HotelRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(Hotel::class);
        $hotel=$repository->findAll();
        return $this->render("hotelFront/afficherFront.html.twig",['hotel'=>$hotel]);
    }


    /**
     * @Route ("/Supp/{id}",name="del")
     */
    function Delete($id,HotelRepository $repository){
        $hotel=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($hotel);
        $em->flush();
        return $this->redirectToRoute('aff');
    }

    /**
     * @param Request $request
     * @return Response
     * @Route ("/Add",name="Add")
     */
    function  Add(Request $request){
        $hotel = new Hotel();
        $form=$this->createForm(HotelType::class,$hotel);
        $form->add('ajouter',SubmitType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($hotel);
            $em->flush();
            return $this->redirectToRoute('aff');
        }
        return $this->render('hotel/add.html.twig',[
            'form'=>$form->createView()
        ]);

    }
    /**
     * @Route ("/hotelUpdate/{id}",name="mise")
     */
    function Update(HotelRepository $repository,$id,Request $request){
        $hotel=$repository->find($id);
    $form=$this ->createForm(HotelType::class,$hotel);
        $form->add('Update',SubmitType::class);
    $form->handleRequest($request);



    if($form->isSubmitted()&&$form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->flush();
        return $this->redirectToRoute("aff");
    }
    return $this->render('hotel/update.html.twig',[
        'form'=>$form->createView()
    ]);
    }

    /**
     * @param HotelRepository $repository
     * @Route ("hotelRecherche",name="recherche")
     */
    function Recherche(HotelRepository $repository,Request $request){
        $data=$request->get('search');

        $hotel=$repository->findBy(['lieu'=>$data]);
        return $this->render("hotel/afficher.html.twig",['hotel'=>$hotel]);


    }
    /**
     * @param HotelRepository $repository
     * @Route ("hotelRechercheFront",name="rechercheFront")
     */
    function RechercheFront(HotelRepository $repository,Request $request){
        $data=$request->get('rechFront');

        $hotel=$repository->findBy(['lieu'=>$data]);
        return $this->render("hotelFront/afficherFront.html.twig",['hotel'=>$hotel]);


    }


}
