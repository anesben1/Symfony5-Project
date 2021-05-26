<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdminUtilityController extends AbstractController
{
    /**
     * @Route("/admin/utility", name="admin_utility")
     */
    public function index(): Response
    {
        return $this->render('admin_utility/index.html.twig', [
            'controller_name' => 'AdminUtilityController',
        ]);
    }

    /**
     * @Route("/admin/utility/users", methods="GET")
     * @IsGranted("ROLE_ADMIN_ARTICLE")
     */
    public function getUSerApi(UserRepository $userRepository)
    {
        $users = $userRepository->findAllEmailAlphabetical();
        return $this->json([
            'users' => $users
        ], 200, [], ['groups' => ['main']]);

    }
}
