<?php
namespace Cupon\OfertaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\OfertaBundle\Entity\Oferta;

class Ofertas implements FixtureInterface
{
    public function getOrder()
    {
        return 3;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 400; $i++){
            $entidad = new Oferta();

            $entidad->setNombre('Oferta '.$i);
            $entidad->setDescripcion('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
            $entidad->setCondiciones('Excelente');
            $entidad->setFoto('foto'.$i.'.jpg');
            $entidad->setPrecio(rand(1,100));
            $entidad->setDescuento(rand(0, 10) + 1 /10);

            // Una fecha se publica hoy, el resto se rearten entre pasado y el futuro
            if (0 == $i) {
                $fecha = 'today';
                $entidad->setRevisada(true);
            } elseif ($i < 10) {
                $fecha = 'now - '.($i-1).' days';
                // el 80% de las ofertas pasadas se marcan como revisadas
                $entidad->setRevisada((rand(1, 1000) % 10) < 8);
            } else {
                $fecha = 'now + '.($i - 10 + 1).' days';
                $entidad->setRevisada(true);
            }

            $fechaPublicacion = new \DateTime($fecha);
            $fechaPublicacion->setTime(23, 59, 59);
            $entidad->setFechaPublicacion($fechaPublicacion);

            $entidad->setFechaExpiracion($fechaPublicacion);
            $entidad->setCompras(0);
            $entidad->setUmbral(rand(25, 100));

        }
    }
}