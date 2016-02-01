<?php

namespace TrezeVel\Category\Tests\Models;

use TrezeVel\Category\Models\Category;
use TrezeVel\Category\Tests\AbstractTestCase;
use Illuminate\Validation\Validator;
use Mockery as m;

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

    public function testInjectValidatorInCategoryModel()
    {
        $category = new Category();
        $validator = m::mock(Validator::class);
        $category->setValidator($validator);

        $this->assertEquals($category->getValidator(), $validator);
    }

    public function testShouldCheckIfItIsValidWhenItIs()
    {
        $category = new Category();
        $category->name = 'Category test';

        $messageBag = m::mock('Illuminate\Support\MessageBag');

        $validator = m::mock(Validator::class);
        $validator->shouldReceive('setRules')->with(['name' => 'required|max:255']);
        $validator->shouldReceive('setData')->with(['name' => 'Category test']);
        $validator->shouldReceive('fails')->andReturn(true);
        $validator->shouldReceive('errors')->andReturn($messageBag);

        $category->setValidator($validator);

        $this->assertFalse($category->isValid());
        $this->assertEquals($messageBag, $category->errors);
    }

    public function testShouldCheckIfItIsInvalidWhenItIs()
    {
        $category = new Category();
        $category->name = 'Category test';

        $validator = m::mock(Validator::class);
        $validator->shouldReceive('setRules')->with(['name' => 'required|max:255']);
        $validator->shouldReceive('setData')->with(['name' => 'Category test']);
        $validator->shouldReceive('fails')->andReturn(false);

        $category->setValidator($validator);

        $this->assertTrue($category->isValid());
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
