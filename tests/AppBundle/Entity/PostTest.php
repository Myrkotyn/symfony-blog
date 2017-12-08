<?php

use App\AppBundle\Entity\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * Test setter and getter name
     * @test
     */
    public function testSetGetName()
    {
        $name = 'Post name';
        $post = (new Post())->setName($name);
        $this->assertEquals($name, $post->getName());
    }

    /**
     * Test setter and getter content
     * @test
     */
    public function testSetGetContent()
    {
        $content = 'some content';
        $post = (new Post())->setContent($content);
        $this->assertEquals($content, $post->getContent());
    }

    /**
     * Test setter and getter imageName
     * @test
     */
    public function testSetGetImageName()
    {
        $imageName = 'new name';
        $post = (new Post())->setImageName($imageName);
        $this->assertEquals($imageName, $post->getImageName());
    }

    /**
     * Test setter and getter imageSize
     * @test
     */
    public function testSetGetImageSize()
    {
        $imageSize = 12332;
        $post = (new Post())->setImageSize($imageSize);
        $this->assertEquals($imageSize, $post->getImageSize());
    }
}