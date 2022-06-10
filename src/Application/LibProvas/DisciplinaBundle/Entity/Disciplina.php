<?php

namespace App\Application\LibProvas\DisciplinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Disciplina
 * @ApiResource()
 * @ORM\Table(name="disciplina")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\DisciplinaBundle\Repository\DisciplinaRepository")
 * @UniqueEntity(fields={"codigo"}) 

 */

class Disciplina
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
     * @ORM\Column(name="periodo", type="integer", nullable=true)
     */
    private $periodo;

    /**
     *
     * @ORM\Column(name="codigo", type="string", unique=true)
     */
    private $codigo;

    /**
     *
     * @ORM\Column(name="nome", type="string")
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     *
     * @ORM\Column(name="grade", type="string")
     */
    private $grade;
    
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
    
   
    public function getPeriodo()
    {
        return $this->periodo;
    }
    
    public function setPeriodo($periodo): void
    {
        $this->periodo = $periodo;
    }
    
   
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
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
    
   
    public function getGrade()
    {
        return $this->grade;
    }
    
    public function setGrade($grade): void
    {
        $this->grade = $grade;
    }
    }
