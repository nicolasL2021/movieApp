<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function index(MovieRepository $movieRepository): Response
    {
        $movie = $movieRepository->findAll();
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function details(int $id, MovieRepository $movieRepository): Response
    {
        $movie = $movieRepository->find($id);
        
        return $this->render('movie/details.html.twig', [
            "movie" => $movie

        ]);
    }
}