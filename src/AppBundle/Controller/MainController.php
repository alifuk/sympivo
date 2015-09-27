<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hospoda;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller {

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction() {
        $hospody = $this->getDoctrine()
                ->getRepository('AppBundle:Hospoda')
                ->findAllOrderedByRank();

        return ['hospody' => $hospody];
    }

    /**
     * @Route("/pridat-hospodu")
     * @Template()
     */
    public function pridatHospoduAction() {

        return [];
    }

    /**
     * @Route("/nova-hospoda-ulozit")
     * @Template("AppBundle::Main/pridatHospodu.html.twig")
     */
    public function ulozitNovouHospoduAction() {
        
        $request = Request::createFromGlobals();
        $jmeno = $request->request->get('jmeno');
        $adresa = $request->request->get('adresa');

        $hospoda = new Hospoda();
        $hospoda->setJmeno($jmeno);
        $hospoda->setAdresa($adresa);

        $em = $this->getDoctrine()->getManager();
        $em->persist($hospoda);
        $em->flush();
        //dump($form);
        return [];
    }

    /**
     * @Route("/onas")
     * @Template()
     */
    public function onasAction() {
        return array(
                // ...
        );
    }

    /**
     * @Route("/jak-hodnotime")
     * @Template()
     */
    public function jakHodnotimeAction() {
        return array(
                // ...
        );
    }

    /**
     * @Route("/napiste-nam")
     * @Template()
     */
    public function napisteNamAction() {
        return array(
                // ...
        );
    }

    /**
     * @Route("/hospody", name="hospody")
     * @Template()
     */
    public function hospodyAction() {
        return [];
    }
    
    /**
     * @Route("/hospoda/{hospoda}", defaults={"hospoda" = "Klintn"})
     * @Template()
     */
    public function hospodaAction($hospoda) {
        return ['hospoda' => $hospoda];
    }

}
