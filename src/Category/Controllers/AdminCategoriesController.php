<?php
namespace TrezeVel\Category\Controllers;

/**
* Controller de categorias
*/
class AdminCategoriesController extends Controller
{
    public function index()
    {
        return view('trezevelCategory::index');
    }
}
