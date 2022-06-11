<?php
namespace App\Application\LibProvas\GradeCurricularBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * GradeCurricular Front controller.
 *
 * @Route("/")
 */
class GradeCurricularFrontController extends Controller
{

    public function getBundleName()
    {
        return 'ApplicationLibProvasGradeCurricularBundle';
    }

    public function getEntityName()
    {
        return 'GradeCurricular';
    }

    public function getFormType()
    {
        return 'App\Application\LibProvas\GradeCurricularBundle\Form\GradeCurricularType';
    }

    public function getRepository()
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasGradeCurricularBundle:GradeCurricular');
    }

    /**
    * @Route("/gradecurricular", name="front_gradecurricular")
    */

    public function index()
    {
      return $this->render('@ApplicationLibProvasGradeCurricular/front_gradecurricular.html.twig');
    }
}

