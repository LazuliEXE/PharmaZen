<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Entity\Stock;
use App\Form\MedicamentType;
use App\Form\StockType;
use App\Repository\MedicamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/medicament')]
final class MedicamentController extends AbstractController
{
    #[Route(name: 'app_medicament_index', methods: ['GET'])]
    public function index(MedicamentRepository $medicamentRepository): Response
    {
        return $this->render('medicament/index.html.twig', [
            'medicaments' => $medicamentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medicament_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stock = new Stock();
        $formStock = $this->createForm(StockType::class, $stock);

        $medicament = new Medicament();
        $formMedicament = $this->createForm(MedicamentType::class, $medicament);
        
        $formMedicament->handleRequest($request);
        $formStock->handleRequest($request);

        if ($formMedicament->isSubmitted() && $formMedicament->isValid()) {
            $entityManager->persist($medicament);
            if ($formStock->isSubmitted() && $formStock->isValid()){
                $stock->setMedicament($medicament);
                $entityManager->persist($stock);
                $entityManager->flush();

                return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('medicament/new.html.twig', [
            'medicament' => $medicament,
            'formMedicament' => $formMedicament,
            'formStock' => $formStock,
        ]);
    }

    #[Route('/{id}', name: 'app_medicament_show', methods: ['GET'])]
    public function show(Medicament $medicament): Response
    {
        return $this->render('medicament/show.html.twig', [
            'medicament' => $medicament,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medicament_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medicament $medicament, EntityManagerInterface $entityManager): Response
    {
        $formMedicament = $this->createForm(MedicamentType::class, $medicament);
        $formMedicament->handleRequest($request);

        if ($formMedicament->isSubmitted() && $formMedicament->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medicament/edit.html.twig', [
            'medicament' => $medicament,
            'formMedicament' => $formMedicament,
        ]);
    }

    #[Route('/{id}', name: 'app_medicament_delete', methods: ['POST'])]
    public function delete(Request $request, Medicament $medicament, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicament->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($medicament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
    }
}
