<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Products\Registrar;
use App\Services\Products\Updaterar;
use App\Shop\Models\Category;
use App\Shop\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * @var Registrar
     */
    private $registrar;
    /**
     * @var Updaterar
     */
    private $updaterar;

    public function __construct(Request $request, Registrar $registrar, Updaterar $updaterar)
    {
        $this->middleware('admin', ['except' => 'show']);
        $this->request = $request;
        $this->registrar = $registrar;
        $this->updaterar = $updaterar;
    }

    /**
     * Display all products in $category Category
     *
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        $products = $category->products()->withTrashed()->get();

        return view('products.index', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return Response
     */
    public function create($id)
    {
        $category = Category::findOrFail($id);

        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $categoryId
     * @return Response
     */
    public function store($categoryId)
    {
        $this->registrar->validator($this->request);

        $category = Category::findOrFail($categoryId);

        $this->registrar->create($this->request->all(), $category);

        return redirect()->route('category.products.index', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param $categorySlug
     * @param $productId
     * @return Response
     */
    public function show($categorySlug, $productId)
    {
        $category = Category::findBySlugOrFail($categorySlug);

        $product = Product::findOrFail($productId);
//        dd($product);

        //write a logic to show a specific product
        return view('products.show', compact('category', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $categoryId
     * @param $productId
     * @return Response
     */
    public function edit($categoryId, $productId)
    {
        $category = Category::findOrFail($categoryId);

        $product = $category->products()->find($productId);

        //get all categories for the product, to change the category if needed
        $categories = Category::all()->linkNodes();

        return view('products.edit', compact('product', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $categoryId
     * @param $productId
     * @return Response
     */
    public function update($categoryId, $productId)
    {
        $this->updaterar->validator($this->request);

        $category = Category::findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $this->updaterar->update($this->request->all(), $category, $product);

        return redirect()->route('category.products.index', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $categoryId
     * @param $productId
     * @return Response
     */
    public function destroy($categoryId, $productId)
    {
        $category = Category::findOrFail($categoryId);

        $product = $category->products()->find($productId);

        $product->delete();

        return redirect()->route('category.products.index', $category->id);
    }

}
