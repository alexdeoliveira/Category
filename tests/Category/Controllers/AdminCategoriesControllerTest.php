<?php

namespace TrezeVel\Category\Tests\Controllers;

use TrezeVel\Category\Tests\AbstractTestCase;
use TrezeVel\Category\Controllers\Controller;
use TrezeVel\Category\Models\Category;
use TrezeVel\Category\Controllers\AdminCategoriesController;
use Mockery as m;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
* Classe de teste de categoria
*/
class AdminCategoriesControllerTest extends AbstractTestCase
{
	
	public function testShouldExtendFromController()
	{
		$category = m::mock(Category::class);
		$responseFactory = m::mock(ResponseFactory::class);

		$controller = new AdminCategoriesController($responseFactory, $category);

		$this->assertInstanceOf(Controller::class, $controller);
	}


	public function textControllerShouldRunIndexMethodAndReturnCorrectArguments()
	{
		
		$category = m::mock(Category::class);
		$responseFactory = m::mock(ResponseFactory::class);

		$html = m::mock();

		$controller = new AdminCategoriesController($responseFactory, $category);

		$categoriesResult = ['cat1', 'cat2'];
		$category->shouldReceive('all')->andReturn($categoriesResult);

		$responseFactory->shouldReceive('view')
			->with('trezevelCategory::index', ['categories' => $categoriesResult])
			->andReturn($html);

		$this->assertEquals($controller->index(), $html);

	}
}