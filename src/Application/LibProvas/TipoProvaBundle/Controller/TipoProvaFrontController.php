<?php
namespace App\Application\LibProvas\TipoProvaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * TipoProva Front controller.
 *
 * @Route("/")
 */
class TipoProvaFrontController extends Controller
{

    public function getBundleName()
    {
        return 'ApplicationLibProvasTipoProvaBundle';
    }

    public function getEntityName()
    {
        return 'TipoProva';
    }

    public function getFormType()
    {
        return 'App\Application\LibProvas\TipoProvaBundle\Form\TipoProvaType';
    }

    public function getRepository()
    {
        return $this->getDoctrine()->getRepository('ApplicationLibProvasTipoProvaBundle:TipoProva');
    }

    /**
    * @Route("/tipoprova", name="front_tipoprova")
    */

    public function index()
    {
      return $this->render('@ApplicationLibProvasTipoProva/front_tipoprova.html.twig');
    }
}

