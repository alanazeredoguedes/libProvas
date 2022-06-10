<?php
namespace App\Application\LibProvas\ProvaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * Prova Admin controller.
 *
 * @Route("/admin/libProvas/prova/prova")
 */
class ProvaAdminController extends CRUDController
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
}

