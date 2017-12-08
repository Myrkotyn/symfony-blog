<?php

namespace App\AppBundle\Repository;

use App\AppBundle\Entity\Category;
use App\AppBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

class CommentRepository extends EntityRepository
{
    public function findCommentsByPost(Post $post)
    {
        $qb = $this->createQueryBuilder('c');

        return $qb->select('c')
            ->join('AppBundle:Post', 'p', Expr\Join::WITH,
                $qb->expr()->andX(
                    $qb->expr()->eq('p.id', 'c.objectId'),
                    $qb->expr()->eq('c.objectName', ' :object_class')
                ))
            ->andWhere($qb->expr()->eq('p.id', ':post_id'))
            ->setParameters(['object_class' => Post::class, 'post_id' => $post->getId()])
            ->getQuery()
            ->getResult();
    }

    public function findCommentsByCategory(Category $category)
    {
        $qb = $this->createQueryBuilder('c');

        return $qb->select('c')
            ->join('AppBundle:Category', 'cat', Expr\Join::WITH,
                $qb->expr()->andX(
                    $qb->expr()->eq('cat.id', 'c.objectId'),
                    $qb->expr()->eq('c.objectName', ' :object_class')
                ))
            ->andWhere($qb->expr()->eq('cat.id', ':category_id'))
            ->setParameters(['object_class' => Category::class, 'category_id' => $category->getId()])
            ->getQuery()
            ->getResult();
    }
}