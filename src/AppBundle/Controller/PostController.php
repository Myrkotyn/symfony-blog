<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Comment;
use App\AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 *
 * @package App\AppBundle\Controller
 */
class PostController extends Controller
{
    /**
     * @param $id
     * @param Request $request
     *
     * @Route("/post/{id}", name="show_post")
     *
     * @return Response
     */
    public function showAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->find($id);
        $comments = $em->getRepository(Comment::class)->findCommentsByPost($post);

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}