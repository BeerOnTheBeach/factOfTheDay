<?php

namespace App\Controller;

use App\Entity\Fact;
use App\Form\FactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContributeFactController extends AbstractController
{
    #[Route('/contribute/fact', name: 'app_contribute_fact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fact = new Fact();
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
