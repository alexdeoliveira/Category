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
    	$categories = $this->getCategoriesForSelect();

    	return view('trezevelCategory::create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->category->create($request->all());

    	return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        if (!$category->exists) {
            return redirect()->route('admin.categories.index');
        }

        $categories = $this->getCategoriesForSelect();

        return view('trezevelCategory::edit')->with(compact('categories', 'category'));
    }

    public function getCategoriesForSelect()
    {
        $categoriesObj = $this->category->all();
        $categories[''] = '-Nenhum-';
        foreach ($categoriesObj as $category) {
            $categories[$category->id] = $category->name;
        }

        return $categories;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $category = $this->category->find($id);
        if (!$category->exists) {
            return redirect()->route('admin.categories.index');
        }

        $category->update($input);

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = $this->category->find($id);

        if ($category->exists) {
            $category->delete();
        }

        return redirect()->route('admin.categories.index');
    }
}
