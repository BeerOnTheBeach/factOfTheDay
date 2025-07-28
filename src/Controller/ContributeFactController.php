<?php

namespace App\Controller;

use App\Entity\Fact;
use App\Entity\User;
use App\Form\FactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContributeFactController extends AbstractController
{
    // TODO: restrict to logged in user via security config
    #[Route('/fact', name: 'app_contribute_fact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if(!($user instanceof User))
        {
            return $this->redirectToRoute('app_login');
        }
        $fact = new Fact();
        $fact->setAuthor($user);
        $form = $this->createForm(FactType::class, $fact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fact);
            $entityManager->flush();
        }

        return $this->render('contribute_fact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
