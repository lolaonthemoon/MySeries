<?php

// src/Controller/CategoryController.php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Category;
use App\Entity\Program;
// use App\Repository\ProgramRepository;
use App\Form\CategoryType;

// Don't forget the Request use for the new method
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/categories", name="category_")
 */
class CategoryController extends AbstractController

{
    /**
     * The controller for the category add form or deal with
     *
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
        // Create a new Category Object
        $category = new Category();
        // Create the associated Form
        $form = $this->createForm(CategoryType::class, $category);

        // Get data from HTTP request
        $form->handleRequest($request);

        // Was the form submitted ?
        if ($form->isSubmitted()&& $form->isValid()) {
            // Deal with the submitted data
            // Get the Entity Manager
            $entityManager = $this->getDoctrine()->getManager();
            // Persist Category Object
            $entityManager->persist($category);
            // Flush the persisted object
            $entityManager->flush();
            // Finally redirect to categories list
            return $this->redirectToRoute('category_index');
        }

        // Render the form
        return $this->render('category/new.html.twig', ["form" => $form->createView()]);
    }
    // Attention, la methode show doit etre plus bas
    //  pour eviter la confusion des routes


    /**
     * Show all rows from Category’s entity
     * @Route("/", name="index")
     *  * @return Response A response instance
     */

    public function index(): Response

    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render(
            'category/index.html.twig',
            ['categories' => $categories]
        );
    }

    /**
     * Getting all programs in a category by category name
     *
     * @Route("/show/{categoryName}", name="show")
     * @return Response
     */
    public function show(string $categoryName): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);

        if ($category) {

            $programs = $this->getDoctrine()->getRepository(Program::class)->findBy(['category' => $category->getId()], ['id' => 'DESC'], $limit = 3);

            return $this->render(
                'category/show.html.twig',
                ['category' => $category, 'programs' => $programs]
            );
        } else {
            throw $this->createNotFoundException(
                'No program with for the category : ' . $categoryName . ' found in program\'s table.'
            );
        }
    }
}
