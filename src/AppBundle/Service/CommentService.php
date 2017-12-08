<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Comment;
use App\AppBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

/**
 * Class CommentService
 *
 * @package App\AppBundle\Service
 */
class CommentService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    /**
     * @param Post|Category $entity
     * @param ObjectManager $em
     * @param string $author
     * @param string $content
     *
     * @return Comment
     */
    public static function createNewComment($entity, ObjectManager $em, string $author, string $content)
    {
        $className = $em->getMetadataFactory()->getMetadataFor(get_class($entity))->getName();
        $comment = (new Comment())
            ->setAuthor($author)
            ->setContent($content)
            ->setObjectName($className)
            ->setObjectId($entity->getId());

        $em->persist($comment);
        $em->flush();

        return $comment;
    }
}