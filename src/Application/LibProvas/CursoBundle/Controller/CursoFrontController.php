<?php
namespace App\Application\LibProvas\CursoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Curso Front controller.
 *
 * @Route("/")
 */
class CursoFrontController extends Controller
{

    public function getBundleName()
    {
        return 'ApplicationLibProvasCursoBundle';
    }

    public function getEntityName()
    {
        return 'Curso';
    }

    public function getFormType()
    {
        return 'App\Application\LibProvas\CursoBundle\Form\CursoType';
    }

    public function getRepository()
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasCursoBundle:Curso');
    }

    /**
    * @Route("/curso", name="front_curso")
    */

    public function index()
    {
      return $this->render('@ApplicationLibProvasCurso/front_curso.html.twig');
    }
}

