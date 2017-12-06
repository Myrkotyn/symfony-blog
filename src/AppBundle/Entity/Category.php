<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 12/4/17
 * Time: 7:26 PM
 */

namespace App\AppBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\CategoryRepository")
 * @ORM\Table(name="categories")
 */
class Category
{
    use TimestampableEntity;

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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     */
    public function setPosts($posts): void
    {
        $this->posts = $posts;
    }
}