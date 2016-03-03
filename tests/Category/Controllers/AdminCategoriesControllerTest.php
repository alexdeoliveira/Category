<?php

namespace TrezeVel\Category\Tests\Controllers;

use TrezeVel\Category\Tests\AbstractTestCase;
use TrezeVel\Category\Controllers\Controller;
use TrezeVel\Category\Models\Category;
use TrezeVel\Category\Controllers\AdminCategoriesController;
use Mockery as m;

/**
* Classe de teste de categoria
*/
class AdminCategoriesControllerTest extends AbstractTestCase
{
	
	public function testShouldExtendFromController()
	{
		$category = m::mock(Category::class);

		$controller = new AdminCategoriesController($category);

		$this->assertInstanceOf(Controller::class, $controller);
	}
}