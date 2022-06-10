<?php

namespace App\Application\LibProvas\ProvaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;



/**
 * Prova
 * @ApiResource()
 * @ORM\Table(name="prova")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\ProvaBundle\Repository\ProvaRepository")

 */

class Prova
{
    /**
     * @var int  
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many Prova has One Disciplina (Disciplina).
     * @ORM\ManyToOne(targetEntity="App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina")
     * @ORM\JoinColumn(name="disciplina_id", referencedColumnName="id")
     */
    private $disciplina;

    /**
     * Many Prova has One Professor (Professor).
     * @ORM\ManyToOne(targetEntity="App\Application\LibProvas\ProfessorBundle\Entity\Professor")
     * @ORM\JoinColumn(name="professor_id", referencedColumnName="id")
     */
    private $professor;

    /**
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;

    /**
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     * @var Gallery
     *
     * @ORM\ManyToOne (targetEntity="App\Application\Sonata\MediaBundle\Entity\Gallery", cascade={"persist"})
     */
    private $arquivos;
    
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
    
   
   /**
    * @return mixed
    */
    public function getDisciplina()
    {
        return $this->disciplina;
    }
    
    /**
     * @param mixed $disciplina
     */
    public function setDisciplina($disciplina): void
    {
        $this->disciplina = $disciplina;
    }
    
   
   /**
    * @return mixed
    */
    public function getProfessor()
    {
        return $this->professor;
    }
    
    /**
     * @param mixed $professor
     */
    public function setProfessor($professor): void
    {
        $this->professor = $professor;
    }
    
   
    public function getData()
    {
        return $this->data;
    }
    
    public function setData($data): void
    {
        $this->data = $data;
    }
    
   
    public function getAtivo()
    {
        return $this->ativo;
    }
    
    public function setAtivo($ativo): void
    {
        $this->ativo = $ativo;
    }
    
    /**
     * @return null|Gallery
     */
    public function getArquivos(): ?Gallery
    {
        return $this->arquivos;
    }

    /**
     * @param null|Gallery $arquivos
     */
    public function setArquivos(?Gallery $arquivos): void
    {
        $this->arquivos = $arquivos;
    }
}
