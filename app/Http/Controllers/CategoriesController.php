<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->middleware('admin', ['except' => 'show']);
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::withTrashed()->get()->linkNodes();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all()->linkNodes();

        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->validate($this->request, [
            'title' => 'required|string', 'parent_id' => 'sometimes|exists:categories,id',
        ]);

        $title = $this->request->title;
        $parentId = $this->request->parent_id;

        $node = Category::create([
            'title' => $title,
            'slug' => str_slug($title),
        ]);

        //if parent Id is the node itself set parentId to null
        $node->parent_id = ($node->id == $parentId) ? null : $parentId;
        $node->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('products.reviews', 'products.categories')->first();

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all()->linkNodes();

        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $this->validate($this->request, [
            'title' => 'required|string', 'parent_id' => 'sometimes|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);

        $category->title = $this->request->title;
        $category->parent_id = $this->request->parent_id;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category.index');
    }

}
