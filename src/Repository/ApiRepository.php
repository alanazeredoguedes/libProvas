<?php

namespace App\Repository;

use App\Application\LibProvas\CursoBundle\Entity\Curso;
use App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina;
use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;
use App\Application\LibProvas\ProvaBundle\Entity\Prova;
use App\Application\LibProvas\TipoProvaBundle\Entity\TipoProva;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\Media;
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


/*    public function TiposProvaToArray(TipoProva $data){
        return [
            'id' => $data->getId(),
            'tipo' => $data->getTipo(),
        ];
    }*/

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

    public function ProvasToArray(Prova $data)
    {

        //dd($data->getArquivos());

        return [
            'id' => $data->getId(),
            'tipoProva' => ( $data->getTipoProva() ) ? $data->getTipoProva()->getTipo() : '',
            'data' => ( $data->getData() ) ? date_format($data->getData(), 'm/y') : '',
            'professor' => ( $data->getProfessor() )? $data->getProfessor()->getNome() : '' ,
            'curso' => $data->getDisciplina()->getGradeCurricular()->getCurso()->getNome(),
            'disciplina' => [
                'id' => $data->getId(),
                'codigo' => $data->getDisciplina()->getCodigo(),
                'nome' => $data->getDisciplina()->getNome(),
                'periodo' => $data->getDisciplina()->getPeriodo(),
                'grade' => $data->getDisciplina()->getGradeCurricular()->getGrade(),
            ],
            'arquivos' => $this->getGalleryToArray( $data->getArquivos() ),
        ];
    }


    public function GradesToArray(GradeCurricular $data)
    {
        $disciplinas = [];

        foreach ($data->getDisciplinas() as $disciplina){
            if(!$disciplina->getAtivo())
                continue;

            /*if($disciplina->getProvas())
                dd($disciplina);*/

            $disciplinas[] = [
                'id' => $disciplina->getId(),
                'codigo' => $disciplina->getCodigo(),
                'nome' => $disciplina->getNome(),
                'periodo' => $disciplina->getPeriodo(),
                'grade' => $disciplina->getGradeCurricular()->getGrade(),
                'numeroProvas' => $disciplina->getNumeroProvas(),
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



    public function getMediaToArray(Media $media){

        if(!$media->getEnabled())
            return null;


        return [
            'id' => $media->getId(),
            'name' => $media->getName(),
            'description' => ( $media->getDescription() ) ? $media->getDescription(): '',
            'contentType' => ( $media->getContentType() ) ? $media->getContentType() : '',
            'url' => '/upload/media/padrao/0001/01/' . $media->getProviderReference(),
        ];

        //dd($media);


    }

    public function getGalleryToArray(Gallery $gallery){
        $data = [];

        if(!$gallery->getEnabled())
            return $data;

        foreach ($gallery->getGalleryHasMedias() as $galleryHasMedia){
            if(!$galleryHasMedia->getEnabled())
                continue;

            $media = $this->getMediaToArray($galleryHasMedia->getMedia());

            if($media)
                $data[] = $media;
        }

        return $data;
    }


  
  
}
