<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Post
 *
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\PostRepository")
 * @ORM\Table(name="posts")
 * @Vich\Uploadable
 */
class Post
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="post_image", fileNameProperty="imageName", size="imageSize")
     * @Assert\File(maxSize="2M", mimeTypesMessage = "Please upload a valid image")
     */
    private $imageFile;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $imageSize;

    /**
     * @var Category $category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="posts")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;

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
     * @return Post
     */
    public function setName(string $name): ?Post
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Post
     */
    public function setContent(string $content): ?Post
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return Post
     */
    public function setCategory(Category $category): ?Post
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @param string|null $imageName
     *
     * @return Post
     */
    public function setImageName($imageName): ?Post
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|UploadedFile $imageFile
     *
     * @return Post
     */
    public function setImageFile(File $imageFile = null): ?Post
    {
        $this->imageFile = $imageFile;
        if ($imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    /**
     * @param int $imageSize
     *
     * @return Post
     */
    public function setImageSize($imageSize): ?Post
    {
        $this->imageSize = $imageSize;

        return $this;
    }
}