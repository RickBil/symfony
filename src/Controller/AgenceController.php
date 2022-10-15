<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenceController extends AbstractController
{
    #[Route('/g/agence', name: 'app_g_agence')]
    public function index(): Response
    {
        return $this->render('agence/index.html.twig');
    }
}
