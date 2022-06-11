<?php

namespace App\Application\LibProvas\GradeCurricularBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;



/**
 * GradeCurricular
 * @ApiResource()
 * @ORM\Table(name="grade_curricular")
 * @ORM\Entity(repositoryClass="App\Application\LibProvas\GradeCurricularBundle\Repository\GradeCurricularRepository")

 */

class GradeCurricular
{
    /**
     * @var int  
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many GradeCurricular has One Curso (Curso).
     * @ORM\ManyToOne(targetEntity="App\Application\LibProvas\CursoBundle\Entity\Curso", inversedBy="gradeCurricular")
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     */
    private $curso;

    /**
     *
     * @ORM\Column(name="grade", type="string")
     */
    private $grade;

    /**
     *
     * @ORM\Column(name="descricao", type="string")
     */
    private $descricao;

    /**
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     * @ORM\OneToMany(targetEntity="App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina", mappedBy="gradeCurricular")
     */
    private $disciplinas;

    public function __construct() {
        $this->disciplinas = new ArrayCollection();
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
    public function getCurso()
    {
        return $this->curso;
    }
    
    /**
     * @param mixed $curso
     */
    public function setCurso($curso): void
    {
        $this->curso = $curso;
    }
    
   
    public function getGrade()
    {
        return $this->grade;
    }
    
    public function setGrade($grade): void
    {
        $this->grade = $grade;
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

    public function getGradeCurso(){
        return $this->getGrade() . ' -  ' . $this->getCurso()->getNome();
    }


    public function getDisciplinas()
    {
        return $this->disciplinas;
    }

    public function setDisciplinas($disciplinas): void
    {
        $this->disciplinas = $disciplinas;
    }

    public function getNumeroDisciplinas(){
        return count( $this->getDisciplinas() );
    }




    }
