<?php

namespace App\Application\LibProvas\DisciplinaBundle\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;



/**
 * Disciplina
 * @ApiResource()
 * @ORM\Table(name="disciplina")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\DisciplinaBundle\Repository\DisciplinaRepository")
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
     * Many Disciplina has One GradeCurricular (GradeCurricular).
     * @ORM\ManyToOne(targetEntity="App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular", inversedBy="disciplinas")
     * @ORM\JoinColumn(name="grade_curricular_id", referencedColumnName="id")
     */
    private $gradeCurricular;

    /**
     *
     * @ORM\Column(name="codigo", type="string")
     */
    private $codigo;

    /**
     *
     * @ORM\Column(name="periodo", type="integer")
     */
    private $periodo;

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
    public function getGradeCurricular()
    {
        return $this->gradeCurricular;
    }
    
    /**
     * @param mixed $gradeCurricular
     */
    public function setGradeCurricular($gradeCurricular): void
    {
        $this->gradeCurricular = $gradeCurricular;
    }
    
   
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }
    
   
    public function getPeriodo()
    {
        return $this->periodo;
    }
    
    public function setPeriodo($periodo): void
    {
        $this->periodo = $periodo;
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

    public function getDisciplinaGradeCurso(){
        return $this->getCodigo() . ' - ' . $this->getNome() . ' - ' . $this->getGradeCurricular()->getGrade() . ' - ' . $this->getGradeCurricular()->getCurso()->getNome() ;
    }

    }
