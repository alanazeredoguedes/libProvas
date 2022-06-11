<?php

namespace App\Controller;

use App\Application\LibProvas\CursoBundle\Entity\Curso;
use App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina;
use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImportController extends Controller
{
    /**
     * @Route("/import_data", name="app_import_data")
     */
    public function importData(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $cursoRepository = $this->getDoctrine()->getRepository('ApplicationLibProvasCursoBundle:Curso');
        $gradeCurricularRepository = $this->getDoctrine()->getRepository('ApplicationLibProvasGradeCurricularBundle:GradeCurricular');
        $disciplinaRepository = $this->getDoctrine()->getRepository('ApplicationLibProvasDisciplinaBundle:Disciplina');

        /** Importação de Arquivos */
        $cursosPath = $this->get('kernel')->getRootDir() . '/../public/cursosBase/';

        foreach (scandir($cursosPath) as $index => $fileImport ){
            if($index === 0 || $index === 1)
                continue;

            /** Cursos a Ser Importado no sistema */
            $cursoImport = json_decode( file_get_contents( $cursosPath . $fileImport ) );

            /** Recupera curso no sistema e caso não exista cria um novo */
            $cursoObj = $cursoRepository->findOneBy(['codigo' => $cursoImport->codigo]);

            if(!$cursoObj){
                $cursoObj = new Curso();
                $cursoObj->setCodigo($cursoImport->codigo);
                $cursoObj->setNome($cursoImport->nome);
                $cursoObj->setDescricao($cursoImport->habilitacao);
                $cursoObj->setAtivo(true);
                $em->persist($cursoObj);
                $em->flush();
            }

            /** Recupera a grade curricular no sistema e caso não exista cria uma novo */
            $gradeCurricular =  $gradeCurricularRepository->findOneBy(['curso' => $cursoObj, 'descricao' => $cursoImport->matrizCurricular]);

            if(!$gradeCurricular){
                $gradeCurricular = new GradeCurricular();
                $gradeCurricular->setGrade($cursoImport->matrizCurricular);
                $gradeCurricular->setDescricao($cursoImport->matrizCurricular);
                $gradeCurricular->setAtivo(true);
                $gradeCurricular->setCurso($cursoObj);
                $em->persist($gradeCurricular);
                $em->flush();
            }


            /** Percorre as disciplinas e realiza a recupera da mesma no sistema e caso não exista cria uma nova */
            foreach ($cursoImport->disciplinas as $disciplinaImport){
                $disciplina = $disciplinaRepository->findOneBy(['codigo'=> $disciplinaImport->codigo, 'gradeCurricular' => $gradeCurricular]);
                if(!$disciplina){
                    $disciplina = new Disciplina();
                    $disciplina->setCodigo($disciplinaImport->codigo);
                    $disciplina->setPeriodo($disciplinaImport->periodo);
                    $disciplina->setNome($disciplinaImport->nome);
                    $disciplina->setAtivo(true);
                    $disciplina->setGradeCurricular($gradeCurricular);
                    $em->persist($disciplina);
                    $em->flush();
                }
            }


        }


        return new Response('Importação Realizada Com Sucesso!');
    }
}
