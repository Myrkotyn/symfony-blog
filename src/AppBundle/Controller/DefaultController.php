<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 *
 * @package App\AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->findAll();

        return $this->render('default/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}