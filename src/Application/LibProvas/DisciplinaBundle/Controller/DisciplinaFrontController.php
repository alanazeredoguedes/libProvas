<?php
namespace App\Application\LibProvas\DisciplinaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Disciplina Front controller.
 *
 * @Route("/")
 */
class DisciplinaFrontController extends Controller
{

    public function getBundleName()
    {
        return 'ApplicationLibProvasDisciplinaBundle';
    }

    public function getEntityName()
    {
        return 'Disciplina';
    }

    public function getFormType()
    {
        return 'App\Application\LibProvas\DisciplinaBundle\Form\DisciplinaType';
    }

    public function getRepository()
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasDisciplinaBundle:Disciplina');
    }

    /**
    * @Route("/disciplina", name="front_disciplina")
    */

    public function index()
    {
      return $this->render('@ApplicationLibProvasDisciplina/front_disciplina.html.twig');
    }
}

