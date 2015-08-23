<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop\Models\Category;
use App\Shop\Models\Product;
use App\Shop\Models\Subcategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display all products in $category Category
     *
     * @param $categoryName
     * @param $subcategoryId
     * @return Response
     */
    public function index($categoryName, $subcategoryId)
    {
        dd(1);
        $category = Category::findByNameOrFail($categoryName);

        $subcategory = $category->subcategories()->find($subcategoryId);
        dd($subcategory);

        $products = $subcategory->products;

        return view('products.index', compact('subcategory', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $categoryName
     * @param $productId
     * @return Response
     */
    public function store($categoryName, $productId)
    {
        //write a logic to save products
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $categorySlug
     * @param $subcategorySlug
     * @param $productId
     * @return Response
     * @throws ModelNotFoundException
     */
    public function show($categorySlug, $subcategorySlug, $productId)
    {
        $category = Category::findBySlugOrFail($categorySlug);

        $subcategory = $category->subcategories()->where('slug', $subcategorySlug)->first();
        if ( ! $subcategory ) {
            throw new ModelNotFoundException;
        }

        $product = Product::findOrFail($productId);

        //write a logic to show a specific product
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $categoryName
     * @param $productId
     * @return Response
     */
    public function edit($categoryName, $productId)
    {
        //write logic to edit a product
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $categoryName
     * @param $productId
     * @return Response
     */
    public function update($categoryName, $productId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $categoryName
     * @param $productId
     * @return Response
     */
    public function destroy($categoryName, $productId)
    {
        //write a logic to delete a product
    }

}
