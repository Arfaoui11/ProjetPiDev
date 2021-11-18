<?php

namespace App\Controller;

use App\Entity\Transport;
use App\Form\TransportType;
use App\Repository\TransportRepository;
//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
     * @return Response
     * @Route ("/aff",name="aff")
     */
    public function Affiche(TransportRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(Transport::class);
        $transport=$repository->findAll();
        return $this->render("transport/transport.html.twig",['transport'=>$transport]);
    }
    /**
     * @param TransportRepository $repository
     * @return Response
     * @Route ("/affront",name="afffront")
     */
    public function affront (TransportRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(Transport::class);
        $transport=$repository->findAll();
        return $this->render("testfront.html.twig",['transport'=>$transport]);
    }
    /**
     * @Route ("/Supp/{id}",name="d")
     */
    function Delete($id,TransportRepository $repository){
        //recuperer l'objet a suprrimer
        $transport=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($transport);
        $em->flush();
        //redirection vers la meme vue
        return $this->redirectToRoute("aff");
    }



    /**
     * @param Request $request
     * @return Response
     * @Route ("add",name="ajouttransport")
     */
    function add(Request $request){
        $transport=new Transport();
        $form=$this->createForm(TransportType::class,$transport);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($transport);
            $em->flush();
            return $this->redirectToRoute('aff');
        }
        return $this->render('transport/add.html.twig',[
            'form'=>$form->createView()
        ]);

    }



    /**
     * @Route("transport/update/{id}",name="update")
     */

    function update (TransportRepository $repository, $id, Request $request){

        $transport =$repository->find($id);
        $form=$this->createForm(TransportType::class,$transport);
        $form->add('Update', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return$this->redirectToRoute("aff");

        }

        return $this->render('transport/update.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     * @param TransportRepository $repository
     * @param Request $request
     * @return Response
     * @Route ("/recherche",name="recherche")
     */
    function Recherche(TransportRepository $repository,Request $request){
        $data=$request->get('search');
        $transport=$repository->findBy(['id'=>$data]);
        return $this->render("transport/transport.html.twig",['transport'=>$transport]);
    }


    /**
     * @param TransportRepository $repository
     * @return Response
     * @Route ("/transport/ListDQL",name="tri")
     */
    function OrderByPriceDQL(TransportRepository  $repository){
        $transport=$repository->OrderByPriceDQL();
        return $this->render("transport/transport.html.twig",['transport'=>$transport]);
    }
}
