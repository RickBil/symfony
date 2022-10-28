<?php

namespace App\Controller;

use App\Repository\AgenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgenceController extends AbstractController
{
    #[Route('/agence/show', name: 'app_show_agence', methods:['GET'])]
    public function show(AgenceRepository $agenceRepository): Response
    {
        $datas = $agenceRepository->findAll();
        return $this->render('agence/index.html.twig',[
            "datas"=>$datas]);
        // return $this->render('agence/index.html.twig',
        //     ['controller_name' => 'AgenceController',]);
    }
    #[Route('/agence/create', name: 'app_create_agence', methods:['POST'])]
    public function create(): Response
    {
        return $this->render('agence/index.html.twig');
    }
    #[Route('/agence/edit', name: 'app_edit_agence', methods:['GET'])]
    public function edit(): Response
    {
        return $this->render('agence/index.html.twig');
    }
    #[Route('/agence/drop', name: 'app_drop_agence', methods:['GET'])]
    public function drop(): Response
    {
        return $this->render('agence/index.html.twig');
    }
}
