<?php
namespace TrezeVel\Category\Controllers;

use TrezeVel\Category\Models\Category;

/**
* Controller de categorias
*/
class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('trezevelCategory::index')->with(compact('categories'));
    }

    public function create()
    {
    	return view('trezevelCategory::create');
    }
}
