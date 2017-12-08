<?php

use App\AppBundle\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test setter and getter for name
     * @test
     */
    public function testSetGetName()
    {
        $name = 'Test Category';
        $category = (new Category())->setName($name);
        $this->assertEquals($name, $category);
    }

    /**
     * Test setter and getter for description
     * @test
     */
    public function testSetGetDescription()
    {
        $description = 'Some description';
        $category = (new Category())->setDescription($description);
        $this->assertEquals($description, $category->getDescription());
    }
}