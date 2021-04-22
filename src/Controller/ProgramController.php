<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Entity\Episode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Program;
use App\Entity\Season;

/**
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController

{


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
     * Getting a program by id
     *
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @return Response
     */
    public function show(int $id): Response
    {
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['id' => $id]);



        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : ' . $id . ' found in program\'s table.'
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
     * @Route("/{programId<^[0-9]+$>}/seasons/{seasonId<^[0-9]+$>}", name="season_show")
     * @return Response
     */
    public function showSeason(int $programId, int $seasonId): Response
    {
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['id' => $programId]);

        $season = $this->getDoctrine()
            ->getRepository(Season::class)
            ->findOneBy(['id' => $seasonId]);

        // code pas correct car l' id  n'est pas le bon
        $episodes = $this->getDoctrine()
            ->getRepository(Season::class)
            ->findBy(['id' => $seasonId]);


        if (!$program or !$season) {
            throw $this->createNotFoundException(
                'Problème, Problème,.. avec un P majuscule'
            );
        } elseif (!$episodes) {
            throw $this->createNotFoundException(
                'Pas d episode'
            );
        } else {
            return $this->render('season/show.html.twig', [
                'program' => $program, 'season' => $season, 'episodes' => $episodes,
            ]);
        } {
        };
    }
}
