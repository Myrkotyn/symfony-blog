<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Comment;
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
     *
     * @Route("comment/add-ajax-comment", name="add_ajax_comment")
     *
     * @throws BadRequestHttpException
     *
     * @return JsonResponse
     */
    public function addAjaxComment(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Bad Request');
        }

        $em = $this->getDoctrine()->getManager();

        $author = $request->get('author');
        $content = $request->get('content');
        $entity = $request->get('entity');
        $objectId = $request->get('objectId');

        $comment = (new Comment())
            ->setAuthor($author)
            ->setContent($content)
            ->setObjectName($entity)
            ->setObjectId($objectId);

        $em->persist($comment);
        $em->flush();

        return new JsonResponse([
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'time' => $comment->getCreatedAt()->format('H:i d-m-Y')
        ]);
    }

}