<?php
namespace Cupon\OfertaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\OfertaBundle\Entity\Oferta;

class Ofertas implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 400; $i++){
            $entidad = new Oferta();

            $entidad->setNombre('Oferta '.$i);
            $entidad->setFechaPublicacion(new \DateTime());
            $entidad->setCondiciones('Buenas');
            $entidad->setFoto('foto'.mt_rand(1,20).'.jpg');
            $entidad->setPrecio(rand(1, 100));
            $entidad->setDescuento($entidad->getPrecio() * (mt_rand(10, 70) / 100));

        }
    }
}