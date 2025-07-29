<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/', name: 'user')]
    public function index(): Response
    {
        $user = $this->getUser();
        if(!($user instanceof User))
        {
            return $this->redirectToRoute('login');
        }

        return $this->render('user/user.html.twig', [
            'user' => $user,
        ]);
    }
}
