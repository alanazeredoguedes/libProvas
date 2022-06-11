<?php
namespace App\Application\LibProvas\GradeCurricularBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * GradeCurricular Admin controller.
 *
 * @Route("/admin/libProvas/gradecurricular/gradecurricular")
 */
class GradeCurricularAdminController extends CRUDController
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
}

