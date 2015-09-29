<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Pictures\Registrar;
use App\Services\Pictures\Updaterar;
use App\Shop\Models\Category;
use App\Shop\Models\Picture;
use App\Shop\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PicturesController extends Controller
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
     * Display a listing of the resource.
     *
     * @param $categoryId
     * @param $productId
     * @return Response
     */
    public function index($categoryId, $productId)
    {
        $category = Category::findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $pictures = $product->pictures()->withTrashed()->get();

        return view('pictures.index', compact('category', 'product', 'pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $categoryId
     * @param $productId
     * @return Response
     */
    public function create($categoryId, $productId)
    {
        $category = Category::with('products')->findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        return view('pictures.create', compact('category', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $categoryId
     * @param $productId
     * @return Response
     */
    public function store($categoryId, $productId)
    {
        $this->registrar->validator($this->request);

        $category = Category::with('products')->findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $this->registrar->create($this->request->all(), $category, $product);

        return redirect()->route('category.products.pictures.index', compact('categoryId', 'productId'));
    }

    /**
     * Display the specified resource.
     *
     * @param $categoryId
     * @param $productId
     * @param  int $id
     * @return Response
     */
    public function show($categoryId, $productId, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $categoryId
     * @param $productId
     * @param  int $id
     * @return Response
     */
    public function edit($categoryId, $productId, $id)
    {
        $category = Category::findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $picture = Picture::findOrFail($id);

        return view('pictures.edit', compact('category', 'product', 'picture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $categoryId
     * @param $productId
     * @param  int $id
     * @return Response
     */
    public function update($categoryId, $productId, $id)
    {
        $this->updaterar->validator($this->request);

        $category = Category::with('products')->findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $picture = $product->pictures()->find($id);

        $this->updaterar->update($this->request->all(), $category, $product, $picture);

        return redirect()->route('category.products.pictures.index', compact('categoryId', 'productId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $categoryId
     * @param $productId
     * @param  int $id
     * @return Response
     */
    public function destroy($categoryId, $productId, $id)
    {
        $category = Category::findOrFail($categoryId);

        $product = Product::findOrFail($productId);

        $picture = Picture::findOrFail($id);

        $picture->delete();

        return redirect()->route('category.products.pictures.index', [$category->id, $product->id]);
    }

}
