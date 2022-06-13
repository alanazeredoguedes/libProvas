<?php

namespace App\Controller;

use App\Application\LibProvas\CursoBundle\Repository\CursoRepository;
use App\Application\LibProvas\DisciplinaBundle\Repository\DisciplinaRepository;
use App\Application\LibProvas\GradeCurricularBundle\Repository\GradeCurricularRepository;
use App\Application\LibProvas\ProvaBundle\Entity\Prova;
use App\Application\LibProvas\ProvaBundle\Repository\ProvaRepository;
use App\Application\LibProvas\TipoProvaBundle\Repository\TipoProvaRepository;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\GalleryHasMedia;
use App\Application\Sonata\MediaBundle\Entity\Media;
use App\Repository\ApiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Routing\Annotation\Route;


/** @Route("/api_v2") */
class ApiController extends Controller
{

    protected function getCursoRepository(): CursoRepository
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasCursoBundle:Curso');
    }

    protected function getGradeRepository(): GradeCurricularRepository
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasGradeCurricularBundle:GradeCurricular');
    }

    protected function getDisciplinaRepository(): DisciplinaRepository
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasDisciplinaBundle:Disciplina');
    }

    protected function getTipoProvaRepository(): TipoProvaRepository
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasTipoProvaBundle:TipoProva');
    }

    protected function getProvasRepository(): ProvaRepository
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasProvaBundle:Prova');
    }

    public function getApiRepository(): ApiRepository
    {
        return new ApiRepository($this->getDoctrine());
    }

    /** @Route("/cursos", name="apiv2_cursos") */
    public function cursos(): Response
    {
        $cursos = $this->getCursoRepository()->findBy(['ativo' => true], ['nome'=> 'ASC']);

        $response = [];

        foreach ($cursos as $curso){
            $response[] = $this->getApiRepository()->CursoToArray($curso);
        }

        return new JsonResponse($response);
    }

    /** @Route("/grade_curricular/{curso}", name="apiv2_grade_curricular") */
    public function grades($curso): Response
    {
        $grades = $this->getGradeRepository()->findBy(['ativo' => true, 'curso' => $curso], ['grade'=> 'DESC']);

        $response = [];
        foreach ($grades as $grade){
            $response[] = $this->getApiRepository()->GradesToArray($grade);
        }

        return new JsonResponse($response);
    }

    /** @Route("/disciplinas/{curso}", name="apiv2_disciplinas") */
    public function disciplinas($curso): Response
    {
        $disciplinas = $this->getDisciplinaRepository()->findBy(['ativo' => true, 'gradeCurricular.curso' => $curso], ['nome'=> 'ASC']);

        dd($disciplinas);
        $response = [];

        foreach ($disciplinas as $disciplina){
            $response[] = $this->getApiRepository()->DisciplinaToArray($disciplina);
        }

        return new JsonResponse($response);
    }

    /** @Route("/tipos", name="apiv2_tipos") */
    public function tipos(): Response
    {
        $tipos = $this->getTipoProvaRepository()->findBy([], ['tipo'=> 'ASC']);

        $response = [];

        foreach ($tipos as $tipo){
            $response[] = $this->getApiRepository()->TiposToArray($tipo);
        }

        return new JsonResponse($response);
    }

    /** @Route("/upload", name="apiv2_upload") */
    public function upload(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();

        $arquivos = $request->files->get('provas');
        $disciplina = $request->request->get('disciplina');

        if(!$arquivos)
            return new JsonResponse(['status' => 'error', 'message' => 'Anexe ao menos 1 arquivo!']);


        if(!$this->isValidFilesType($arquivos))
            return new JsonResponse(['status' => 'error', 'message' => 'Tipos de arquivos invalidos! Arquivos Permitidos: [.pdf, .jpeg, .jpg, .png] ']);


        $disciplina = $this->getDisciplinaRepository()->findOneBy(['id' => $disciplina]);
        if(!$disciplina)
            return new JsonResponse(['status' => 'error', 'message' => 'Disciplina Não Encontrada no Sistema! Tente Novamente Mais Tarde!']);


        /** Serviço de upload arquivos */
        $serviceUpload = $this->get('admin.upload.file.service');
        $serviceUpload->setEntityMananger($em);
        $serviceUpload->setProjectDir($this->getParameter('kernel.project_dir'));

        $gallery =  $serviceUpload->createGallery($arquivos, 'arquivos');

        $prova = new Prova();

        $prova->setArquivos($gallery);
        $prova->setDisciplina($disciplina);
        $prova->setTipoProva(null);
        $prova->setAtiva(false);

        $em->persist($prova);
        $em->flush();

        return new JsonResponse(['status' => 'success', 'message' => 'Contribuição Realizada com Sucesso! Em breve será disponibilizada para todos!']);
    }


    private function isValidFilesType($arquivos){
        $permissionTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
        foreach ($arquivos as $arquivo){
            if( !in_array($arquivo->getMimeType(), $permissionTypes)  )
                return false;
        }
        return true;
    }


}
