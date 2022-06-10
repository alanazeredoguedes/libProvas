<?php
namespace App\Application\LibProvas\ProfessorBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * Professor Admin controller.
 *
 * @Route("/admin/libProvas/professor/professor")
 */
class ProfessorAdminController extends CRUDController
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
}

