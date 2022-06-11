<?php

namespace App\Application\LibProvas\CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;



/**
 * Curso
 * @ApiResource()
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\CursoBundle\Repository\CursoRepository")
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
     * @ORM\Column(name="codigo", type="string")
     */
    private $codigo;

    /**
     *
     * @ORM\Column(name="nome", type="string")
     */
    private $nome;

    /**
     *
     * @ORM\Column(name="descricao", type="string", nullable=true)
     */
    private $descricao;

    /**
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     * @ORM\OneToMany(targetEntity="App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular", mappedBy="curso")
     */
    private $gradeCurricular;

    public function __construct() {
        $this->gradeCurricular = new ArrayCollection();
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
    
   
    public function getDescricao()
    {
        return $this->descricao;
    }
    
    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }
    
   
    public function getAtivo()
    {
        return $this->ativo;
    }
    
    public function setAtivo($ativo): void
    {
        $this->ativo = $ativo;
    }


    public function getGradeCurricular()
    {
        return $this->gradeCurricular;
    }

    public function setGradeCurricular($gradeCurricular): void
    {
        $this->gradeCurricular = $gradeCurricular;
    }

    public function getNumeroGrades(){
      return count( $this->getGradeCurricular() );
    }

    public function getNumeroDisciplinas(){
        $total = 0;
        foreach ($this->getGradeCurricular() as $gradeCurricular){
            $total +=  $gradeCurricular->getNumeroDisciplinas();
        }
        return $total;
    }



    }
