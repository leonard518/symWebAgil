<?php

namespace Cupon\OfertaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
     * @Route("/{ciudad}", defaults={"ciudad" = 1}, name="portada", )
     */
    public function portadaAction($ciudad = null)
    {
        if ($ciudad == null){
            $ciudad = $this->container
                            ->getParameter('cupon.ciudad_por_defecto');

            return new RedirectResponse(
                $this->generateUrl('portada', array('ciudad' => $ciudad))
            );
        }
        $em = $this->getDoctrine()->getManager();
        
        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            'ciudad'            => $this->container->getParameter('cupon.ciudad_por_defecto'),
            // 'fecha_publicacion' => new \DateTime('today')
        ));

        if (!$oferta){
            throw $this->createNotFoundException('No se ha encontrado la oferta del día en la ciudad seleccionada');
        }

        return $this->render(
            'OfertaBundle:Default:portada.html.twig',
            array('oferta' => $oferta)
        );

        $log = $this->get('logger');
        $log->addInfo('Generaba la portada en '.$tiempo.' milisegundos');
    }
}
