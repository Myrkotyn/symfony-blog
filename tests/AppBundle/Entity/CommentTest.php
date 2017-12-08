<?php

use App\AppBundle\Entity\Comment;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /**
     * Test setter and getter author
     * @test
     */
    public function testSetGetAuthor()
    {
        $author = 'Miki Maus';
        $comment = (new Comment())->setAuthor($author);
        $this->assertEquals($author, $comment->getAuthor());
    }

    /**
     * Test setter and getter content
     * @test
     */
    public function testSetGetContent()
    {
        $content = 'qweqw sadasd  fsdfsdf';
        $comment = (new Comment())->setContent($content);
        $this->assertEquals($content, $comment->getContent());
    }

    /**
     * Test setter and getter object id
     * @test
     */
    public function testSetGetObjectId()
    {
        $objectId = 4;
        $comment = (new Comment())->setObjectId($objectId);
        $this->assertEquals($objectId, $comment->getObjectId());
    }

    /**
     * Test setter and getter object name
     * @test
     */
    public function testSetGetObjectName()
    {
        $objectName = 'Object name';
        $comment = (new Comment())->setObjectName($objectName);
        $this->assertEquals($objectName, $comment->getObjectName());
    }
}