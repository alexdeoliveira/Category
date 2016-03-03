<?php
namespace TrezeVel\Category\Controllers;

use TrezeVel\Category\Models\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
* Controller de categorias
*/
class AdminCategoriesController extends Controller
{
	private $category;
	public function __construct(Category $category)
	{
		$this->category = $category;
	}
    public function index()
    {
        $categories = $this->category->all();
        return view('trezevelCategory::index')->with(compact('categories'));
    }

    public function create()
    {
    	$categories = $this->category->all();
    	return view('trezevelCategory::create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->category->create($request->all());

    	return redirect()->route('admin.categories.index');
    }
}
