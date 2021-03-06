<?php

namespace App\Controller;

use App\Entity\Gvol;
use App\Form\GvolType;
use App\Repository\VolRepository;

use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use App\Mail\MailerApi;
use Dompdf\Dompdf;
use Dompdf\Options;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;


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
    function addvol (Request $request,MailerInterface $mailer)
    {
        $gvol=new Gvol();
        $form=$this->createForm(GvolType::class,$gvol);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($gvol);
            $em->flush();

            $this ->addFlash(
                'info',
                'Vol ajout?? !'
            );
            $email = new MailerApi();
            $email->sendEmail( $mailer,'tunisport32@gmail.com','nourhene.maaouia@esprit.tn','testing email','Moyen de Transport Cr??er avec success');
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

            $this ->addFlash(
                'info',
                'Vol modifi?? !'
            );
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
        return $this->render("gvol/afficherv.html.twig",['vol'=>$vol]);
    }


    /**
     * @Route("/gvol/pdf", name="imprimer_index")
     */


    public function imprimevol(VolRepository $volRepository): Response

    {
                // Configure Dompdf according to your needs
                $pdfOptions = new Options();
                $pdfOptions->set('defaultFont', 'Arial');

                // Instantiate Dompdf with our options
                $dompdf = new Dompdf($pdfOptions);

                $vol = $volRepository->findAll();

                // Retrieve the HTML generated in our twig file
                $html = $this->renderView('gvol/pdf.html.twig', [
                    'vol' => $vol,
                ]);

                // Load HTML to Dompdf
                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
                $dompdf->setPaper('A4', 'portrait');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser (inline view)
                $dompdf->stream("Liste  vol.pdf", [
                    "Attachment" => true
                ]);
            }


            // stat

    /**
     * @Route("/statistiques",name="statistiques")
     * @param VolRepository $repository
     * @return Response
     */

    public function statistiques(VolRepository $repository)
    {

        $nbs = $repository->getART();
        $data = [['rate', 'VOL']];
        foreach($nbs as $nb)
        {
            $data[] = array($nb['volt'], $nb['cvol']);
        }
        $bar = new barchart();
        $bar->getData()->setArrayToDataTable(
            $data
        );

        $bar->getOptions()->getTitleTextStyle()->setColor('#07600');
        $bar->getOptions()->getTitleTextStyle()->setFontSize(50);
        return $this->render('gvol/statvol.html.twig', array('barchart' => $bar,'nbs' => $nbs));

    }

}
