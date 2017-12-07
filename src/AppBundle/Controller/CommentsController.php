<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Post;
use App\AppBundle\Service\CommentService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CommentsController
 * @package App\AppBundle\Controller
 */
class CommentsController extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     *
     * @Route("comment/post/{id}/add-ajax-comment", name="add_post_ajax_comment")
     *
     * @throws BadRequestHttpException
     *
     * @return JsonResponse
     */
    public function addPostAjaxComment(Request $request, int $id)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Bad Request');
        }

        $em = $this->getDoctrine()->getManager();

        $author = $request->get('author');
        $content = $request->get('content');

        $comment = CommentService::createNewComment(Post::class, $em, $author, $content, $id);

        return new JsonResponse([
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'time' => $comment->getCreatedAt()->format('H:i d-m-Y')
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     *
     * @Route("comment/category/{id}/add-ajax-comment", name="add_category_ajax_comment")
     *
     * @throws BadRequestHttpException
     *
     * @return JsonResponse
     */
    public function addCategoryAjaxComment(Request $request, int $id)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Bad Request');
        }
        $em = $this->getDoctrine()->getManager();

        $author = $request->get('author');
        $content = $request->get('content');

        $comment = CommentService::createNewComment(Category::class, $em, $author, $content, $id);

        return new JsonResponse([
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'time' => $comment->getCreatedAt()->format('H:i d-m-Y')
        ]);
    }

}