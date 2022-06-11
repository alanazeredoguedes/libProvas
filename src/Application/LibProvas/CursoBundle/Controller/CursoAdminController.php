<?php
namespace App\Application\LibProvas\CursoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * Curso Admin controller.
 *
 * @Route("/admin/libProvas/curso/curso")
 */
class CursoAdminController extends CRUDController
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
}

