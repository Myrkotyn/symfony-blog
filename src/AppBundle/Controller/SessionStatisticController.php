<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\SessionStatistic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SessionStatisticController extends Controller
{
    public function showStatistic()
    {
        $em = $this->getDoctrine()->getManager();
        $statistic = $em->getRepository(SessionStatistic::class)->findUserByBrowser();

        return $this->render('statistic/show_statistic.html.twig', [
            'statistic' => $statistic,
        ]);
    }
}