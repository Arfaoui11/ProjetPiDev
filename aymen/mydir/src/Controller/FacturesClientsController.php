<?php

namespace App\Controller;

use App\Entity\FacturesClients;
use App\Form\FactureCType;
use App\Repository\BooksRepository;
use App\Repository\FacturesClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FacturesClientsController extends AbstractController
{
    /**
     * @Route("/factures/clients", name="factures_clients")
     */
    public function index(): Response
    {
        return $this->render('factures_clients/indexF.html.twig', [
            'controller_name' => 'FacturesClientsController',
        ]);
    }

    /**
     * @param FacturesClientsRepository $repository
     * @return Response
     * @Route ("FactureAff",name="affF")
     */
    public function Affiche(FacturesClientsRepository $repository){
        $facture=$repository->findAll();
        return $this->render("factures_clients/afficherF.html.twig",['facture'=>$facture]);
    }

    /**
     * @Route ("FactureSupp/{id}",name="dF")
     * @param $id
     * @param FacturesClientsRepository $repository
     * @return Response
     */
    function Delete($id,FacturesClientsRepository $repository){
        //recuperer l'objet a suprrimer
        $books=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($books);
        $em->flush();
        //redirection vers la meme vue
        return $this->redirectToRoute("affF");
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("FactureAdd", name="ajoutF")
     */
    function ADD(Request $request){
        $facture=new FacturesClients();
        $form=$this->createForm(FactureCType::class,$facture);
        $form->add('Ajouter',SubmitType::class);
        $form -> handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($facture);
            $em->flush();
            return $this->redirectToRoute('affF');
        }
        return $this->render('factures_clients/AddF.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("FactureUpdate/{id}",name="updateF")
     * @param FacturesClientsRepository $repository
     * @param $id
     * @param Request $request
     * @return Response
     */
    function Update(FacturesClientsRepository $repository,$id,Request $request){
        $facture=$repository->find($id);
        $form=$this->createForm(FactureCType::class,$facture);
        $form->add('Update',SubmitType::class );
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('affF');
        }
        return $this->render('factures_clients/UpdateF.html.twig',[
            'form'=>$form->createView()

        ]);
    }

    /**
     * @param FacturesClientsRepository $repository
     * @param Request $request
     * @return Response
     * @Route ("FactureRech",name="rechercheF")
     */
    function Recherche(FacturesClientsRepository $repository,Request $request){
        $data=$request->get('search');
        $facture=$repository->findBy(['idFac'=>$data]);

        return $this->render("factures_clients/afficherF.html.twig",['facture'=>$facture]);
    }
    /**
     * @param FacturesClientsRepository $repository
     * @return Response
     * @Route ("FactureListTri",name="triF")
     */
    function OrderByPriceDQL(FacturesClientsRepository  $repository){
        $facture=$repository->OrderByPriceDQL();
        return $this->render("factures_clients/afficherF.html.twig",['facture'=>$facture]);
    }
}

