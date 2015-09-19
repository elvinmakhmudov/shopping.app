<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop\Models\Category;
use Illuminate\Support\Facades\Request;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => 'show']);
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
        $title = Request::input('title');
        $parentId = Request::input('parentId') == "null" ? null : Request::input('parentId');

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
        $category = Category::findOrFail($id);

        //if 'null' has been passed set the parent Id to null
        $category->parent_id = (Request::input('parentId') == "null") ? null : Request::input('parentId');
        $category->title = Request::input('title') ? Request::input('title') : $category->title;
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
