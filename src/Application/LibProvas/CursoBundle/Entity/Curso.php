<?php

namespace App\Application\LibProvas\CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Curso
 * @ApiResource()
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\CursoBundle\Repository\CursoRepository")
 * @UniqueEntity(fields={"nome"}) 

 */

class Curso
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
     * @ORM\Column(name="nome", type="string", unique=true)
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;
    
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
    
   
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    
   
    public function getAtivo()
    {
        return $this->ativo;
    }
    
    public function setAtivo($ativo): void
    {
        $this->ativo = $ativo;
    }
    }
