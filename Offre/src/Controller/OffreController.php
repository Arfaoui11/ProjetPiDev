<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Form\OffType;
use App\Repository\OffreRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OffreController extends AbstractController
{

    /**
     * @Route("/offre", name="offre")
     */
    public function index(): Response
    {
        return $this->render('offre/index.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }

    /**
     * @param OffreRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/AfficheOffre", name="AfficherOffre")
     */
    public function Affiche(OffreRepository $repository)
    {
        $offre = $repository -> findAll();

        return $this -> render('offre/afficher.html.twig',['liste' =>$offre]);
    }
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/Add")
     */
    public function add(Request $request)
    {
        $offre = new Offre();
        $form = $this -> createForm(OffreType::class,$offre);
        $form -> add('Ajouter',SubmitType::class);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em -> persist( $offre);
            $em -> flush();
            return $this -> redirectToRoute('AfficherOffre');
        }
        return $this -> render( 'offre/Add.html.twig',[
            'form' => $form -> createView()
        ]);

    }

    /**
     * @param $id
     * @param OffreRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/offres/{id}",name="delete")
     */
    function Delete($id,OffreRepository  $repository){
        $offre=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($offre);
        $em->flush();
        //redirection vers la meme vue
        return $this->redirectToRoute("AfficherOffre");
    }



    /**
     * @param OffreRepository $repository
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/offre/{id}",name="updateOffre")
     */

    public function Update(OffreRepository $repository,$id,Request $request)
    {

        $offre = $repository -> find($id);
        $form = $this -> createForm(OffreType::class,$offre);
        $form -> add('Modifier',SubmitType::class);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em -> flush();
            return $this -> redirectToRoute('AfficherOffre');
        }
        return $this -> render( 'offre/Update.html.twig',[
            'form' => $form -> createView()
        ]);

    }



    /**
     * @param OffreRepository $repository
     * @param Request $request
     * @return Response
     * @Route("/SarchOffre",name="searchoffre")
     */

    function SearchTitre(OffreRepository $repository,Request $request)
    {


        if($request->get("searchO") == null)
        {

            $offre = $repository -> findAll();
        }else
        {
            $title =$request->get('searchO');
            $offre = $repository->SearchTitre($title);
        }

        return $this -> render('offre/afficher.html.twig',['liste' =>$offre]);

    }


    /**
     * @param OffreRepository $repository
     * @return Response
     * @Route("order/ListDQL")
     */

    function OrderByMailDQL(OffreRepository $repository)
    {
        $offre = $repository->OrderByMailDQL();
        return $this->render('offre/afficher.html.twig',['liste' =>$offre]);
    }

    /**
     * @param OffreRepository $repository
     * @return Response
     * @Route("offre/ListQB")
     */

    function OrderByMailQB(OffreRepository $repository)
    {
        $offre = $repository->OrderByMailQB();
        return $this->render('offre/afficher.html.twig',['liste' =>$offre]);
    }












}
