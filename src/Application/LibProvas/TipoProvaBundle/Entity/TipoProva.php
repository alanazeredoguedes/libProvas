<?php

namespace App\Application\LibProvas\TipoProvaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;



/**
 * TipoProva
 * @ApiResource()
 * @ORM\Table(name="tipo_prova")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\TipoProvaBundle\Repository\TipoProvaRepository")

 */

class TipoProva
{
    /**
     * @var int  
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(name="tipo", type="string")
     */
    private $tipo;
    
    public function __construct() {
        
    }
         
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getStringId(): ?String
    {
        return (String) $this->id;
    }
    
   
    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }
    }
