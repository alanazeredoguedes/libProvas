<?php
namespace App\Application\LibProvas\ProfessorBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Professor Front controller.
 *
 * @Route("/")
 */
class ProfessorFrontController extends Controller
{

    public function getBundleName()
    {
        return 'ApplicationLibProvasProfessorBundle';
    }

    public function getEntityName()
    {
        return 'Professor';
    }

    public function getFormType()
    {
        return 'App\Application\LibProvas\ProfessorBundle\Form\ProfessorType';
    }

    public function getRepository()
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasProfessorBundle:Professor');
    }

    /**
    * @Route("/professor", name="front_professor")
    */

    public function index()
    {
      return $this->render('@ApplicationLibProvasProfessor/front_professor.html.twig');
    }
}

