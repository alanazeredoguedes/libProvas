<?php
namespace App\Application\LibProvas\DisciplinaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

/**
 * Disciplina Admin controller.
 *
 * @Route("/admin/libProvas/disciplina/disciplina")
 */
class DisciplinaAdminController extends CRUDController
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
}

