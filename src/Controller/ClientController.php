<?php

namespace App\Controller;

use App\Repository\ClientsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    #[Route('/c/client', name: 'app_client')]
    public function index(): Response
    {
        //     'controller_name' => 'ClientController',
        return $this->render('client/index.html.twig');
        
    }
}
