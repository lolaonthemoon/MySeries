<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Entity\Episode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Program;
use App\Entity\Season;
use App\Form\ProgramType;

// Don't forget the Request use for the new method
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/programs", name="program_")
 */

class ProgramController extends AbstractController

{
        /**
     * The controller for the program add form or deal with
     *
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
        // Create a new Program Object
        $program = new Program();
        // Create the associated Form
        $form = $this->createForm(ProgramType::class, $program);

        // Get data from HTTP request
        $form->handleRequest($request);

        // Was the form submitted ?
        if ($form->isSubmitted()&& $form->isValid()) {
            // Deal with the submitted data
            // Get the Entity Manager
            $entityManager = $this->getDoctrine()->getManager();
            // Persist Category Object
            $entityManager->persist($program);
            // Flush the persisted object
            $entityManager->flush();
            // Finally redirect to categories list
            return $this->redirectToRoute('program_index');
        }

        // Render the form
        return $this->render('program/new.html.twig', ["form" => $form->createView()]);
    }
    // Attention, la methode show doit etre plus bas
    //  pour eviter la confusion des routes


    /**
     * Show all rows from Program’s entity
     * @Route("/", name="index")
     *  * @return Response A response instance
     */


    public function index(): Response

    {
        $programs = $this->getDoctrine()->getRepository(Program::class)->findAll();

        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs]
        );
    }


    /**
     * Getting a program using param converter on program
     * @Route("/show/{program}", name="show")
     * @return Response
     */
    public function show(Program $program): Response
    {
   

        if (!$program) {
            throw $this->createNotFoundException(
                'No program found in program\'s table.'
            );
        }

        $seasons = $program->getSeasons();

        if (!$seasons) {
            throw $this->createNotFoundException(
                'No season here...'
            );
        }

        return $this->render('program/show.html.twig', [
            'program' => $program, 'seasons' => $seasons,
        ]);
    }

    /**
     * Getting details for a season by season id and program id
     *
     * @Route("/{program}/seasons/{season}", name="season_show")
     * @return Response
     */
    public function showSeason(Program $program , Season $season): Response
    {
        if (!$program or !$season) {
            throw $this->createNotFoundException(
                'Problème, Problème,.. avec un P majuscule'
            );
        } else {
            return $this->render('season/show.html.twig', [
                'program' => $program, 'season' => $season
            ]);
        };
    }


        /**
     * Getting program with seasons with episodes
     *
     * @Route("/{program}/seasons/{season}/episodes/{episode}", name="episode_show")
     * 
     * @return Response
     */
    public function showEpisode(Program $program, Season $season, Episode $episode): Response
    {
        if (!$program or !$season or !$episode) {
            throw $this->createNotFoundException(
                'Problème, Problème,.. avec un P majuscule'
            );
        } else {
            return $this->render('program/episode_show.html.twig', [
                'program' => $program, 'season' => $season, 'episode'=> $episode
            ]);
        };
    }






}
