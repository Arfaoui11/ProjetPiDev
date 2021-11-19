<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
    /**
     * @Route("/hotel", name="hotel")
     */
    public function index(): Response
    {
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController',
        ]);
    }

    /**
     * @param ReservationRepository $repReservation
     * @param HotelRepository $repHotel
     * @param $id
     * @return Response
     * @Route("/ListByhotel/{id}")
     */
    function listReservationByHotel(ReservationRepository $repReservation,HotelRepository $repHotel,$id)
    {
        $hotel = $repHotel->find($id);
        $reservation = $repReservation->listReservationByHotel($hotel->getIdh());
        return $this->render("reservation/afficher.html.twig",['c'=>$hotel,'res'=>$reservation]);
    }


    /**
     * @param HotelRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/Affichehotel", name="AffiHotel")
     */
    public function Affiche(HotelRepository $repository)
    {

        $hotel = $repository -> findAll();

        return $this -> render('hotel/afficherS.html.twig',['hotel' =>$hotel]);
    }
/*
    /**
     * @param HotelRepository $repository
     * @param Request $request
     * @return Response
     * @Route("/SarchHotel",name="search")
     */
    /*
    function SearchLieu(HotelRepository $repository,Request $request)
    {

        if($request->get("rech") == null)
        {

            $hotel = $repository -> findAll();
        }else
        {
            $lieu =$request->get('rech');
            $hotel = $repository->SearchLieu($lieu);
        }

        return $this -> redirectToRoute('AffiHotel');

    }
*/

}
