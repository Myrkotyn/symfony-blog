<?php

namespace App\AppBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Class Category
 *
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\CategoryRepository")
 * @ORM\Table(name="categories")
 */
class Category
{
    use TimestampableEntity;

    /**
     * Magic method __toString
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var Collection|Post[] $posts
     *
     * @ORM\OneToMany(targetEntity="App\AppBundle\Entity\Post", mappedBy="category", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $posts;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Category
     */
    public function setName(string $name): ?Category
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Category
     */
    public function setDescription(string $description): ?Category
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Post[]|Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param Post[]|Collection $posts
     *
     * @return Category
     */
    public function setPosts($posts): ?Category
    {
        $this->posts = $posts;

        return $this;
    }
}