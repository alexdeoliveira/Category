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

    public function test_check_if_can_assign_a_parent_to_a_category()
    {
        $parentCategory = Category::create(['name' => 'Parent test', 'active' => true]);
        
        $category = Category::create(['name' => 'Category test', 'active' => true]);

        $category->parent()->associate($parentCategory)->save();

        $child = $parentCategory->children->first();

        $this->assertEquals('Category test', $child->name);
        $this->assertEquals('Parent test', $category->parent->name);

    }
}
