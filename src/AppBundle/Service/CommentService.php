<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Comment;
use App\AppBundle\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CommentService
 *
 * @package App\AppBundle\Service
 */
class CommentService
{
    private $em;

    /**
     * CommentService constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Post|Category $entity
     * @param string $author
     * @param string $content
     *
     * @return Comment
     */
    public function createNewComment($entity, string $author, string $content)
    {
        $className = $this->em->getMetadataFactory()->getMetadataFor(get_class($entity))->getName();
        $comment = (new Comment())
            ->setAuthor($author)
            ->setContent($content)
            ->setObjectName($className)
            ->setObjectId($entity->getId());

        $this->em->persist($comment);
        $this->em->flush();

        return $comment;
    }
}