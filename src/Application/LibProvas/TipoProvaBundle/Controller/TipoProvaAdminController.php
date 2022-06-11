<?php
namespace App\Application\LibProvas\TipoProvaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * TipoProva Admin controller.
 *
 * @Route("/admin/libProvas/tipoprova/tipoprova")
 */
class TipoProvaAdminController extends CRUDController
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
}

