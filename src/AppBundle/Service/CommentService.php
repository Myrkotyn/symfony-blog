<?php


namespace App\AppBundle\Service;


use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Comment;
use App\AppBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CommentService
 *
 * @package App\AppBundle\Service
 */
class CommentService
{
    /**
     * @param string $entity
     * @param ObjectManager $em
     * @param string $author
     * @param string $content
     * @param int $objectId
     *
     * @return Comment
     */
    public static function createNewComment(string $entity, ObjectManager $em, string $author, string $content, int $objectId)
    {
        $comment = (new Comment())
            ->setAuthor($author)
            ->setContent($content)
            ->setObjectName($entity)
            ->setObjectId($objectId);

        $em->persist($comment);
        $em->flush();

        return $comment;
    }
}