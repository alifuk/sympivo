<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Atrakce;
use AppBundle\Entity\Hospoda;
use AppBundle\Entity\Lokace;
use AppBundle\Entity\ZnackaPiva;
use AppBundle\Entity\Pivo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminController extends Controller {

    /**
     * @Route("/")
     * @Template()
     */
    public function adminAction() {
        $hospody = $this->getDoctrine()
                ->getRepository('AppBundle:Hospoda')
                ->findAllOrderedByName();

        return ['hospody' => $hospody];
    }

    /**
     * @Route("/pridat-hospodu")
     * @Template()
     */
    public function pridatHospoduAction() {

        $lokace = $this->getDoctrine()
                ->getRepository('AppBundle:Lokace')
                ->findAllOrderedByName();

        $piva = $this->getDoctrine()
                ->getRepository('AppBundle:ZnackaPiva')
                ->findAll();

        $atrakce = $this->getDoctrine()
                ->getRepository('AppBundle:Atrakce')
                ->findAll();

        return ["lokace" => $lokace, "piva" => $piva, "atrakce" => $atrakce];
    }
    
    
    /**
     * @Route("/upravit-hospodu/{hospodaId}")
     * @Template()
     */
    public function upravitHospoduAction($hospodaId) {

        $lokace = $this->getDoctrine()
                ->getRepository('AppBundle:Lokace')
                ->findAllOrderedByName();

        $piva = $this->getDoctrine()
                ->getRepository('AppBundle:ZnackaPiva')
                ->findAll();

        $atrakce = $this->getDoctrine()
                ->getRepository('AppBundle:Atrakce')
                ->findAll();
        
        $hospoda = $this->getDoctrine()
                ->getRepository('AppBundle:Hospoda')
                ->find($hospodaId);

        return ["lokace" => $lokace, "piva" => $piva, "atrakce" => $atrakce, "hospoda" => $hospoda];
    }
    

    /**
     * @Route("/ulozit-novou-hospodu")
     */
    public function ulozitNovouHospoduAction() {
        $em = $this->getDoctrine()->getManager();
        
        
        $request = Request::createFromGlobals();
        $jmeno = $request->request->get('jmeno');
        $adresa = $request->request->get('adresa');
        $obsluha = $request->request->get('obsluha');
        $prostredi = $request->request->get('prostredi');
        $celkem = $request->request->get('celkem');
        $popis = $request->request->get('popis');
        $lokaceId = $request->request->get('lokace');

        $lokace = $this->getDoctrine()
                ->getRepository('AppBundle:Lokace')
                ->find($lokaceId);

        $hospoda = new Hospoda();

        foreach ($request->request->get('piva') as $znackaId => $cena) {

            $znacka = $this->getDoctrine()
                    ->getRepository('AppBundle:ZnackaPiva')
                    ->find($znackaId);

            $pivo = new Pivo();
            $pivo->setZnacka($znacka);
            $pivo->setHospoda($hospoda);
            $pivo->setCena($cena);
            $em->persist($pivo);
            $hospoda->addPiva($pivo);
        }
        
        foreach ($request->request->get('atrakce') as $atrakceId => $val) {

            $atrakce = $this->getDoctrine()
                    ->getRepository('AppBundle:Atrakce')
                    ->find($atrakceId);
            
            $hospoda->addAtrakce($atrakce);
        }

        $hospoda->setJmeno($jmeno);
        $hospoda->setAdresa($adresa);
        $hospoda->setObsluha($obsluha);
        $hospoda->setProstredi($prostredi);
        $hospoda->setCelkem($celkem);
        $hospoda->setLokace($lokace);
        $hospoda->setPopis($popis);
        
        $em->persist($hospoda);
        $em->flush();

        return $this->redirect($this->generateUrl("app_admin_admin"));
    }

    /**
     * @Route("/piva")
     * @Template()
     */
    public function pivaAction() {
        $piva = $this->getDoctrine()
                ->getRepository('AppBundle:ZnackaPiva')
                ->findAll();

        return ['piva' => $piva];
    }

    /**
     * @Route("/pivo-ulozit")
     */
    public function pivoUlozitAction() {
        $request = Request::createFromGlobals();
        $nazev = $request->request->get('nazev');

        $znackaPiva = new ZnackaPiva();
        $znackaPiva->setNazev($nazev);

        $em = $this->getDoctrine()->getManager();
        $em->persist($znackaPiva);
        $em->flush();


        return $this->redirect($this->generateUrl("app_admin_piva"));
    }

    /**
     * @Route("/pivo-smazat/{pivoId}")
     */
    public function pivoSmazatAction($pivoId) {

        $znackaPiva = $this->getDoctrine()
                ->getRepository('AppBundle:ZnackaPiva')
                ->find($pivoId);

        $em = $this->getDoctrine()->getManager();
        $em->remove($znackaPiva);
        $em->flush();


        return $this->redirect($this->generateUrl("app_admin_piva"));
    }

    /**
     * @Route("/lokace")
     * @Template()
     */
    public function lokaceAction() {
        $lokace = $this->getDoctrine()
                ->getRepository('AppBundle:Lokace')
                ->findAllOrderedByName();

        return ['lokace' => $lokace];
    }

    /**
     * @Route("/lokace-ulozit")
     * @Template()
     */
    public function lokaceUlozitAction() {
        $request = Request::createFromGlobals();
        $jmeno = $request->request->get('jmeno');

        $lokace = new Lokace();
        $lokace->setJmeno($jmeno);

        $em = $this->getDoctrine()->getManager();
        $em->persist($lokace);
        $em->flush();


        return $this->redirect($this->generateUrl("app_admin_lokace"));
    }

    /**
     * @Route("/lokace-smazat/{lokaceId}")
     */
    public function lokaceSmazatAction($lokaceId) {

        $lokaceId = $this->getDoctrine()
                ->getRepository('AppBundle:Lokace')
                ->find($lokaceId);

        $em = $this->getDoctrine()->getManager();
        $em->remove($lokaceId);
        $em->flush();


        return $this->redirect($this->generateUrl("app_admin_lokace"));
    }

    /**
     * @Route("/atrakce")
     * @Template()
     */
    public function atrakceAction() {
        $atrakce = $this->getDoctrine()
                ->getRepository('AppBundle:Atrakce')
                ->findAllOrderedByName();

        return ['atrakce' => $atrakce];
    }

    /**
     * @Route("/atrakce-ulozit")
     * @Template()
     */
    public function atrakceUlozitAction() {
        $request = Request::createFromGlobals();
        $jmeno = $request->request->get('jmeno');

        $atrakce = new Atrakce();
        $atrakce->setJmeno($jmeno);

        $em = $this->getDoctrine()->getManager();
        $em->persist($atrakce);
        $em->flush();


        return $this->redirect($this->generateUrl("app_admin_atrakce"));
    }

    /**
     * @Route("/atrakce-smazat/{atrakceId}")
     */
    public function atrakceSmazatAction($atrakceId) {

        $atrakceId = $this->getDoctrine()
                ->getRepository('AppBundle:Atrakce')
                ->find($atrakceId);

        $em = $this->getDoctrine()->getManager();
        $em->remove($atrakceId);
        $em->flush();


        return $this->redirect($this->generateUrl("app_admin_atrakce"));
    }

}
