<?php

namespace App\Controller;
use App\Entity\Gvol;
use App\Form\GvolType;
use App\Repository\VolRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GvolController extends AbstractController
{
    /**
     * @Route("/gvol", name="gvol")
     */
    public function index()
    {
        return $this->render('gvol/index.html.twig', [
            'controller_name' => 'GvolController',
        ]);
    }

    /**
     * @param VolRepository $repository
     * @return Response
     * @Route ("/affi",name="affi")
     */
   public function Affichev(VolRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(Hotel::class);
        $vol=$repository->findAll();
        return $this->render("gvol/afficher.html.twig",['vol'=>$vol]);
    }

    /**
     * @Route ("/Supp1/{id}",name="d1")
     */
    function Deletev($id,VolRepository $repository){
        //recuperer l'objet a suprrimer
        $vol=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($vol);
        $em->flush();
        //redirection vers la meme vue
        return $this->redirectToRoute("affi");
    }

    /**
     * @param Request $request
     * @return Response
     * @Route ("addv",name="ajoutvol")
     */
    function addvol (Request $request){
        $gvol=new Gvol();
        $form=$this->createForm(GvolType::class,$gvol);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($gvol);
            $em->flush();
            return $this->redirectToRoute('affi');
        }
        return $this->render('gvol/addv.html.twig',[
            'f'=>$form->createView()
        ]);

    }


    /**
     * @Route("gvol/updatevol/{id}",name="updatev")
     */

    function updatevol (VolRepository $repository, $id, Request $request){

        $vol =$repository->find($id);
        $form=$this->createForm(GvolType::class,$vol);
        $form->add('Update', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return$this->redirectToRoute("affi");

        }

        return $this->render('gvol/updatev.html.twig',[
            'f1'=>$form->createView()
        ]);

    }

    /**
     * @param VolRepository $repository
     * @param Request $request
     * @return Response
     * @Route ("/recherchev",name="recherchev")
     */
    function Recherchev (VolRepository $repository,Request $request){
        $data=$request->get('search');
        $vol=$repository->findBy(['numv'=>$data]);
        return $this->render("gvol/afficher.html.twig",['vol'=>$vol]);
    }

}
