<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Accessoire;
use App\Repository\AccessoireRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AccessoireController extends AbstractController
{
    /**
     * @Route("/accessoire", name="accessoire_index", methods={"GET"})
     */

    public function index(AccessoireRepository $AccessoireRepository): Response
    {
        return $this->render('accessoire/index.html.twig', [
            'accessoires' => $AccessoireRepository->findAll(),
        ]);
    }

     /**
     * @Route("/accessoire/create", name="accessoire_create", methods={"POST", "GET"})
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();

            $accessoire = new Accessoire;
            $accessoire->setNomAccessoire($data['nom']);
            $accessoire->setDescriptionAccessoire($data['description']);
            $em->persist($accessoire);
            $em->flush();

            return $this->redirectToRoute('accessoire_index');
        }
        return $this->render('accessoire/create.html.twig');
    }

    // public function add()
    // {

    //     $entityManager = $this->getDoctrine()->getManager();
    //     $accessoire = new Accessoire();
    //     $accessoire->setNomAccessoire('Rechargement rapide');
    //     $accessoire->setDescriptionAccessoire('Augmente la vitesse de rechargement de l’arme de 15%');

    //     $entityManager->persist($accessoire);

    //     $accessoire2 = new Accessoire();
    //     $accessoire2->setNomAccessoire('Visée Rapide');
    //     $accessoire2->setDescriptionAccessoire('Vous visez 33 % plus rapidement avec votre arme');
    //     $entityManager->persist($accessoire2);

    //     $accessoire3 = new Accessoire();
    //     $accessoire3->setNomAccessoire('Poignées améliorées');
    //     $accessoire3->setDescriptionAccessoire('Augmente la précision des tirs au jugé');
    //     $entityManager->persist($accessoire3);

    //     $entityManager->flush();

    //     return new Response('Ajouter');
    // }
}
