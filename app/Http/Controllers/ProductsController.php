<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop\Models\Category;
use App\Shop\Models\Product;
use App\Shop\Models\Subcategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('admin', ['except' => 'show']);
        $this->request = $request;
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
        $category = Category::findOrFail($categoryId);

        $name = $this->request->input('name');
        $description = $this->request->input('description');
        $rating = $this->request->input('rating');
        $price = $this->request->input('price');
        $thumbnailName = null;

        if ($this->request->hasFile('thumbnail')) {
            $thumbnail = $this->request->file('thumbnail');
            $path = public_path() . '/content/images/' . $category->slug;

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

            $thumbnail->move($path, $thumbnailName);
        }


        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'rating' => $rating,
            'price' => $price,
            'thumbnail' => $thumbnailName
        ]);

        $category->products()->save($product);

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

        $product = $category->products()->find($productId);

        $pictures = $product->pictures;

        //write a logic to show a specific product
        return view('products.show', compact('category', 'product', 'pictures'));
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
        $category = Category::findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $thumbnailName = $product->thumbnail;

        if ($this->request->hasFile('thumbnail')) {
            $thumbnail = $this->request->file('thumbnail');
            $path = public_path() . '/content/images/' . $category->slug;

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

            $thumbnail->move($path, $thumbnailName);
        }


        $product->fill([
            'name' => $this->request->input('name'),
            'description' => $this->request->input('description'),
            'price' => $this->request->input('price'),
            'rating' => $this->request->input('rating'),
            'thumbnail' => $thumbnailName
        ])->save();

        //if new category id exists change old category to the new one
        if (Category::findOrFail($this->request->input('newCategoryId'))) {
            //delete old category
            $product->categories()->detach($category->id);
            //add new one
            $product->categories()->attach($this->request->input('newCategoryId'));
        }

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
