<?php
namespace  Cupon\CiudadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Ciudad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string", length=100)*/
    protected $slug;

    /** @ORM\Column(type="string", length=100)*/
    protected $name;


    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
         $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setSlug($slug)
    {
        return $this->slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }

}