<?php

namespace TrezeVel\Category\Tests\Models;

use TrezeVel\Category\Models\Category;
use TrezeVel\Category\Tests\AbstractTestCase;

/**
* Model de teste da categoria
*/
class CategoryTest extends AbstractTestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_a_category_can_be_persisted()
    {
        $category = Category::create(['name' => 'Category test', 'active' => true]);
        $this->assertEquals('Category test', $category->name);

        $category = Category::all()->first();
        $this->assertEquals('Category test', $category->name);
    }
}
