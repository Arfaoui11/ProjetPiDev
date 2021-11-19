<?php

namespace App\Controller;

use App\Entity\Events;
use App\Form\EventsType;
use App\Repository\EventsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Test\Constraint\RequestAttributeValueSame;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

class EventsController extends AbstractController
{
    /**
     * @Route("/events", name="events")
     */
    public function index(): Response
    {
        return $this->render('events/index.html.twig', [
            'controller_name' => 'EventsController',
        ]);
    }

    /**
     * @param EventsRepository $repository
     * @return Response
     * @Route ("event/AfficheE",name="affiche")
     */

    public function affiche(EventsRepository $repository){
        //$repo=$this->getDoctrine().getRepositoy(Events::class);
        $events=$repository->findAll();
        return $this->render("events/afficheBack.html.twig",['events'=>$events]);
    }
    /**
     * @param EventsRepository $repository
     * @return Response
     * @Route ("events/AfficheEV",name="Afficher")
     */

    public function afficheE(EventsRepository $repository){
        //$repo=$this->getDoctrine().getRepositoy(Events::class);
        $events=$repository->findAll();
        return $this->render("events/front.html.twig",['events'=>$events]);
    }

    /**
     * @param $id
     * @param EventsRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/Supp/{id}",name="deleteevent")
     */

    function Delete($id,EventsRepository $repository){
        //recuperer l'objet a suprrimer
        $events=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($events);
        $em->flush();
        //redirection vers la meme vue
        return $this->redirectToRoute("affiche");
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("event/add")
     */
    public function add(Request $request)
    {
        //faire une instance de notre entity
        $events = new Events();
        //appeler notre formulaire
        $form = $this -> createForm(EventsType::class,$events);
        //ajouter button add
        $form -> add('Ajouter',SubmitType::class);
        //parcourir la requete
        $form -> handleRequest($request);
        //verifier si le formulaire s'il est bien soumis et les champs sont valides

        if($form -> isSubmitted() && $form -> isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em -> persist( $events);
            $em -> flush();
            //redirection ce cet condition uniquement
            return $this -> redirectToRoute('affiche');
        }
        return $this -> render( 'events/add.html.twig',[
            'form' => $form -> createView()
        ]);

    }

    /**
     * @Route ("/event/{id}",name="updateevent")
     */

    public function Update(EventsRepository $repository,$id,Request $request){
        $events = $repository -> find($id);
        $form = $this -> createForm(EventsType::class,$events);
        $form -> add('Modifier',SubmitType::class);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em -> flush();
            return $this -> redirectToRoute('affiche');
        }
        return $this -> render( 'events/Update.html.twig',[
            'updateF' => $form -> createView()
        ]);

    }

    /**
     * @param EventsRepository $repository
     * @param Request $request
     * @return Response
     * @Route ("/searchevent",name="searchevent")
     */
    function Recherche(EventsRepository $repository,Request $request){
        //pour recuperer ce qui a ete saisie dans input
        $data=$request->get('search');
        var_dump($data);
        $events=$repository->findBy(['name'=>$data]);
        //copier coller de la vue de l'affichage
        return $this->render("events/afficheBack.html.twig",['events'=>$events]);

    }
    /**
     * @param EventsRepository $repository
     * @param Request $request
     * @return Response
     * @Route ("/recherhcer",name="rechercher")
     */
    function RechercheE(EventsRepository $repository,Request $request){
        //pour recuperer ce qui a ete saisie dans input
        $data=$request->get('search');
        var_dump($data);
        $events=$repository->findBy(['name'=>$data]);
        //copier coller de la vue de l'affichage
        return $this->render("events/front.html.twig",['events'=>$events]);

    }

    /**
     * @param EventsRepository $repository
     * @return Response
     * @Route ("/ListDQL")
     */
    function OrderByPriceDQL(EventsRepository $repository){
        $events=$repository->OrderByPriceDQL();
        return $this->render("events/afficheBack.html.twig",['events'=>$events]);
    }
    /**
     * @param EventsRepository $repository
     * @return Response
     * @Route ("/events/ListQB")
     */
    function OrderByPriceQB(EventsRepository $repository){
        $events=$repository->OrderByPriceQB();
        return $this->render("events/afficheBack.html.twig",['events'=>$events]);
    }


    /**
     * @param EventsRepository $repository
     * @param Request $request
     * @return Response
     * @Route("events/SearchPrice",name="search")
     */
    function SearchIdevent(EventsRepository  $repository,Request $request)
    {


        if($request->get("search") == null)
        {

            $events = $repository -> findAll();
        }else
        {
            $price =$request->get('search');
            $events = $repository->SearchPRICE($price);
        }



        return $this->render("events/affiche.html.twig",['events'=>$events]);

    }

    /**
     * @param EventsRepository $repository
     * @return Response
     * @Route ("/events/affichedate")
     */
    function AfficheByDate(EventsRepository $repository){
        $events=$repository->OrderByDATE();
        return $this->render("events/afficheBack.html.twig",['events'=>$events]);

    }








}
