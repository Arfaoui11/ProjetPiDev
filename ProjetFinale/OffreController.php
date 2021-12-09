<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Form\SearchType;
use App\Repository\OffreRepository;
use App\Service\QrCodeService;
use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;



class OffreController extends AbstractController
{

    /**
     * @Route("/page", name="offer_index", methods={"GET"})
     */

    public function index(Request $request , PaginatorInterface $paginator): Response
    {

        $offers = $this->getDoctrine()
            ->getRepository(Offre::class)
            ->findAll();
        $offers = $paginator->paginate(
            $offers,
            $request->query->getInt('page',1),
            3
        );

        return $this->render('offre/index.html.twig', [
            'offers' => $offers,

        ]);
    }

  /*

     /**
     * @param OffreRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/AfficheOffre", name="AfficherOffre")
     */
/*
    public function Affiche(OffreRepository $repository)
    {
        $offre=null;
        $offre = $repository -> findAll();

        return $this -> render('offre/afficher.html.twig',['offers' =>$offre]);
    }
*/
/*
    /**
     * @param OffreRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/AfficheOffreFront", name="AfficherOffreFront")
     */
/*
    public function AfficheFront(OffreRepository $repository)
    {
        $offre = $repository -> findAll();

        return $this -> render('offre/AfficheFrontOff.html.twig',['offers' =>$offre]);
    }
*/


    /**
     * @Route("/Add",  name="add_offer",methods={"GET","POST"})
     */
    public function add(Request $request ,FlashyNotifier $flashy) : Response
    {
        $offre = new Offre();
        $form = $this -> createForm(OffreType::class,$offre);
      /*  $form -> add('Ajouter',SubmitType::class);*/
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $flashy->message('offre created  ', 'http://your-awesome-link.com');
            $em = $this ->getDoctrine()->getManager();
            $em -> persist( $offre);
            $em -> flush();
            return $this -> redirectToRoute('offer_index');
        }
        return $this -> render( 'offre/Add.html.twig',[
            'offre'=>$offre,
            'form' => $form -> createView()
        ]);

    }

    /**
     * @param $id
     * @param OffreRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/{id}",name="delete")
     */
    function Delete($id,OffreRepository  $repository,FlashyNotifier $flashy):Response
    {
        $offre=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($offre);
        $em->flush();

        $flashy->error('Produit supprimée  :( ', 'http://your-awesome-link.com');



        //redirection vers la meme vue
        return $this->redirectToRoute("offer_index");
    }



    /**
     * @param OffreRepository $repository
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/{id}/edit",name="updateOffre",methods={"GET","POST"})
     */
    public function Update(OffreRepository $repository,$id,Request $request,FlashyNotifier $flashy):Response
    {

        $offre = $repository -> find($id);
        $form = $this -> createForm(OffreType::class,$offre);
        $form -> add('Modifier',SubmitType::class);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $flashy->warning('Produit modifié "Bien" ! ', 'http://your-awesome-link.com');
            $em = $this ->getDoctrine()->getManager();
            $em -> flush();
            return $this -> redirectToRoute('offer_index');
        }
        return $this -> render( 'offre/Update.html.twig',[
            'form' => $form -> createView()
        ]);

    }


/*
    /**
     * @param OffreRepository $repository
     * @param Request $request
     * @return Response
     * @Route("/SarchOffref",name="searchoffref")
     */
/*
    function SearchTitref(OffreRepository $repository,Request $request)
    {


        if($request->get("search1") == null)
        {

            $offre = $repository -> findAll();
        }else
        {
            $title =$request->get('search1');
            $offre = $repository->SearchTitre($title);
        }

        return $this -> render('offre/AfficheFrontOff.html.twig',['offers' =>$offre]);


    }



*/
    /*

    /**
     * @param OffreRepository $repository
     * @param Request $request
     * @return Response
     * @Route("/SarchOffre",name="searchoffre")
     */
/*
    function SearchTitre(OffreRepository $repository,Request $request)
    {

       // $qrCode=null;

        if($request->get("searchO") == null)
        {

            $offre = $repository -> findAll();

        }else
        {
            $title =$request->get('searchO');
            $offre = $repository->SearchTitre($title);
          // $qrCode = $qrcodeService->qrcode($title);

        }

        return $this -> render('offre/index.html.twig',[
            'offers' =>$offre
           // 'qrCode'=>$qrCode
        ]);

    }
*/
    /*
    /**
     * @param OffreRepository $repository
     * @return Response
     * @Route("order/ListDQL")
     */
/*
    function OrderByMailDQL(OffreRepository $repository)
    {
        $offre = $repository->OrderByMailDQL();
        return $this->render('offre/index.html.twig',['offers' =>$offre]);
    }
/*
    /**
     * @param OffreRepository $repository
     * @return Response
     * @Route("offre/ListQB")
     */
/*
    function OrderByMailQB(OffreRepository $repository)
    {
        $offre = $repository->OrderByMailQB();
        return $this->render('offre/index.html.twig',['offers' =>$offre]);
    }
*/






/*
    /**
     * @param $id
     * @param Request $request
     * @param QrcodeService $qrcodeService
     * @return Response
     * @Route("/Qr/{id}",name="Qrpage")
     */
/*
    public function QrCode($id, QrcodeService $qrcodeService): Response
    {

        $qrCode = null;


        if($qrCode!=null)
        {
            $qrCode = $qrcodeService->qrcode($id);



        }


        return $this->render('offre/afficherQr.html.twig',['qrCode' =>$qrCode]);

    }



*/




}
