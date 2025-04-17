<?php
namespace App\Controller;

use App\Entity\Medicament;
use App\Repository\MedicamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{
    #[Route('/', name:'index')]
    public function index(SessionInterface $session, MedicamentRepository $medicamentRepository)
    {
        $panier = $session->get('panier', []);

        $data = [];
        $total = 0;

        foreach($panier as $id => $quantite)
        {
            $medicament = $medicamentRepository->find($id);

            $data[] = [
                'medicament' => $medicament,
                'quantite' => $quantite
            ];
            $total += $medicament->getPrix() * $quantite;
        }
        // dd($data);
        return $this->render('cart/index.html.twig', compact('data', 'total'));
    }

    #[Route('/add/{id}', name:'add', methods: ['GET'])]
    public function add(Medicament $medicament, SessionInterface $session)
    {
        $id = $medicament->getId();

        $panier = $session->get('panier', []);

        $panier[$id] = empty($panier[$id]) ? 1 : $panier[$id] + 1;

        $session->set('panier', $panier);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/remove/{id}', name:'remove', methods: ['GET'])]
    public function remove(Medicament $medicament, SessionInterface $session)
    {
        $id = $medicament->getId();

        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            if($panier[$id] > 1)
            $panier[$id]--;
        }else{
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/delete/{id}', name:'delete', methods: ['GET'])]
    public function delete(Medicament $medicament, SessionInterface $session)
    {
        $id = $medicament->getId();

        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/empty', name:'empty', methods: ['GET'])]
    public function empty(SessionInterface $session)
    {
        $session->remove('panier');

        return $this->redirectToRoute('cart_index');
    }
}