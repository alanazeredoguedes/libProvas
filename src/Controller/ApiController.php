<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/apiv2") */
class ApiController extends AbstractController
{

    /**
     * @Route("/", name="app_api")
     */
    public function index(): Response
    {

        return new Response('ok');
    }
}
