<?php
namespace TrezeVel\Category\Controllers;

use TrezeVel\Category\Models\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
* Controller de categorias
*/
class AdminCategoriesController extends Controller
{
    private $category;
	private $response;

	public function __construct(ResponseFactory $response, Category $category)
	{
        $this->category = $category;
		$this->response = $response;
	}

    public function index()
    {
        $categories = $this->category->all();
        return $this->response->view('trezevelCategory::index')->with(compact('categories'));
    }

    public function create()
    {
    	$categories = $this->category->all();
    	return $this->response->view('trezevelCategory::create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->category->create($request->all());

    	return redirect()->route('admin.categories.index');
    }
}
