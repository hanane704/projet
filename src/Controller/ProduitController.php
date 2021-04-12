<?php

namespace App\Controller;
use App\Form\ProduitType;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProduitRepository $produitRepository)
    {
       // dd($this->getUser());
       $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();

       return $this->render('produit/index.html.twig', [
           'produits' => $produits,
       ]);
   } 

    /**
     * @Route("/produit/ajout", name="produit_ajout")
     */
    public function ajout(Request $request)
     {

        $produit = new Produit;

        $formPoduit = $this->createForm(ProduitType::class, $produit);

        $formPoduit->handleRequest($request);
        if($formPoduit->isSubmitted() && $formPoduit->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Produit);
            $entityManager->flush();

            $this->addFlash('vehicule_added_success', "Le véhicule a été ajouté avec succés !");
            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/form.html.twig', [
            'formProduit' => $formPoduit->createView()
        ]);
     }
/**
     * @Route("/edit/{id}", name="produit_edit")
     */
    public function edit($id, Request $request)
    {
        $produit = $this->getDoctrine()->getRepository(Produit::class)->find($id);

        $formProduit = $this->createForm(ProduitType::class, $produit);

        $formProduit->handleRequest($request);
        if($formProduit->isSubmitted() && $formPoduit->isValid())
        {
            $produit->setUpdatedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('produit_edited_success', "Le véhicule a été modifié avec succés !");
            return $this->redirectToRoute('produit_index');            
        }

        return $this->render('produit/edit.html.twig', [
            'formProduit' => $formProduit->createView()
        ]);
    }

    /**
     * @Route("/
     * ", name="produit_show")
     */
    public function show($id)
    {
        $produit = $this->getDoctrine()->getRepository(Produit::class)->find($id);

        return $this->render('produit/show.html.twig', [
            'produit' => $produit
        ]);
    }










     }