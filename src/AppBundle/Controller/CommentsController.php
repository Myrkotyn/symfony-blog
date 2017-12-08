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
     * @param Post $post
     *
     * @Route("comment/post/{id}/add-ajax-comment", name="add_post_ajax_comment")
     *
     * @throws BadRequestHttpException
     *
     * @return JsonResponse
     */
    public function addPostAjaxComment(Request $request, Post $post)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Bad Request');
        }

        $author = $request->get('author');
        $content = $request->get('content');

        $commentService = $this->get('app.comment_service');
        $comment = $commentService->createNewComment($post, $author, $content);

        return new JsonResponse([
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'time' => $comment->getCreatedAt()->format('H:i d-m-Y')
        ]);
    }

    /**
     * @param Request $request
     * @param Category $category
     *
     * @Route("comment/category/{id}/add-ajax-comment", name="add_category_ajax_comment")
     *
     * @throws BadRequestHttpException
     *
     * @return JsonResponse
     */
    public function addCategoryAjaxComment(Request $request, Category $category)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Bad Request');
        }

        $author = $request->get('author');
        $content = $request->get('content');

        $commentService = $this->get('app.comment_service');
        $comment = $commentService->createNewComment($category, $author, $content);

        return new JsonResponse([
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'time' => $comment->getCreatedAt()->format('H:i d-m-Y')
        ]);
    }

}