<?php

namespace App\Controller;

use App\Repository\AgenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgenceController extends AbstractController
{
    #[Route('/g/agence', name: 'app_g_agence')]
    public function index(): Response
    {
        return $this->render('agence/index.html.twig');
        // return $this->render('agence/index.html.twig',
        //     ['controller_name' => 'AgenceController',]);
    }
}
