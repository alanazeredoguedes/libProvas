<?php

namespace App\Repository;

use App\Application\LibProvas\CursoBundle\Entity\Curso;
use App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina;
use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;
use App\Application\LibProvas\TipoProvaBundle\Entity\TipoProva;
use Doctrine\Bundle\DoctrineBundle\Registry;


class ApiRepository
{

    protected $docrine;
    protected $em;
    
    public function __constructor(Registry $docrine)
    {
      $this->docrine = $docrine;
      $this->em = $docrine->getManager();
    }


    public function CursoToArray(Curso $data)
    {
        //dd($data);
        return [
            'id' => $data->getId(),
            'codigo' => $data->getCodigo(),
            'nome' => $data->getNome(),
            'descricao' => $data->getDescricao(),
            'numeroGrades' => $data->getNumeroGrades(),
            'numeroDisciplinas' => $data->getNumeroDisciplinas(),
        ];
    }

    public function GradesToArray(GradeCurricular $data)
    {
        $disciplinas = [];

        foreach ($data->getDisciplinas() as $disciplina){
            if(!$disciplina->getAtivo())
                continue;

            $disciplinas[] = [
                'id' => $disciplina->getId(),
                'codigo' => $disciplina->getCodigo(),
                'nome' => $disciplina->getNome(),
                'periodo' => $disciplina->getPeriodo(),
                'grade' => $disciplina->getGradeCurricular()->getGrade(),
            ];
        }

        return [
            'id' => $data->getId(),
            'grade' => $data->getGrade(),
            'descricao' => $data->getDescricao(),
            'curso' => $data->getCurso()->getId(),
            'disciplinas' => $disciplinas,
        ];
    }

    public function TiposToArray(TipoProva $data)
    {
        //dd($data);
        return [
            'id' => $data->getId(),
            'tipo' => $data->getTipo(),
        ];
    }




/*    public function exemple(Curso $property)
    {
      $tags = [];
      
      foreach ($property->getTag() as $tag){
        $tags[] = $tag->getName();
      }
      
      return array(
        'id' => $property->getId(),
        'nome' => $property->getName(),
        'imagemDestaque' => $this->getMedia( $property->getImageFeatured() ),
        'quartosSuites' => $property->getQuartosSuites(),
        'quantidadeVagas' => $property->getQuantidadeVagas(),
        'metrosQuadrados' => $property->getMetrosQuadrados(),
        'bairro' => $property->getEndereco()->getBairro(),
        'cidade' => $property->getEndereco()->getCidade()->getNome(),
        'tag' => $tags,
      );
    }*/

  
  
}
