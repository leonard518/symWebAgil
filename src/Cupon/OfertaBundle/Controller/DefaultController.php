<?php

namespace Cupon\OfertaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/sitio/{pagina}/", name="pagina_estatica")
     */
    public function ayudaAction()
    {
        return $this->render('OfertaBundle:Default:ayuda.html.twig');
    }
    
    /**
     * @Route("/", name="portada")
     */
    public function portadaAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            'ciudad'            => 1,
            // 'fecha_publicacion' => new \DateTime('today')
        ));

        return $this->render(
            'OfertaBundle:Default:portada.html.twig',
            array('oferta' => $oferta)
        );
    }
}
