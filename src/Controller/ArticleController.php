<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SlackClient;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="app_homepage")
     */
    public function index(ArticleRepository $articleRepository): Response
    {

        return $this->render('article/homepage.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/article/edit", name="app_homepage_edit")
     */
    public function edit(): Response
    {
        return $this->render('article/homepage.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    
}
