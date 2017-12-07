<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\AppBundle\Controller
 */
class CategoryController extends Controller
{
    /**
     * @param integer $id
     * @param Request $request
     *
     * @Route("/category/{id}", name="show_category")
     *
     * @return Response
     */
    public function showAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->find($id);
        $comments = $em->getRepository(Comment::class)->findCommentsByCategory($category);

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'comments' => $comments,
            'entity' => Category::class
        ]);
    }
}