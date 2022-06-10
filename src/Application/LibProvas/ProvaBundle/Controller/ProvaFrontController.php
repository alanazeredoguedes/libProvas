<?php
namespace App\Application\LibProvas\ProvaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Prova Front controller.
 *
 * @Route("/")
 */
class ProvaFrontController extends Controller
{

    public function getBundleName()
    {
        return 'ApplicationLibProvasProvaBundle';
    }

    public function getEntityName()
    {
        return 'Prova';
    }

    public function getFormType()
    {
        return 'App\Application\LibProvas\ProvaBundle\Form\ProvaType';
    }

    public function getRepository()
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasProvaBundle:Prova');
    }

    /**
    * @Route("/prova", name="front_prova")
    */

    public function index()
    {
      return $this->render('@ApplicationLibProvasProva/front_prova.html.twig');
    }
}

