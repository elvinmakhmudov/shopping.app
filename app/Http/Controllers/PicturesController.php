<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop\Models\Category;
use App\Shop\Models\Picture;
use App\Shop\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PicturesController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('admin', ['except' => 'show']);
        $this->request = $request;
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

        $product = $category->products()->findOrFail($productId);

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

        $product = $category->products()->find($productId);

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
        $category = Category::with('products')->findOrFail($categoryId);

        $productId = $this->request->input('newProductId') ?: $productId;

        $product = $category->products()->find($productId);

        //TODO:when making a validation, make sure 'picture' has been passed, if it is not, redirect back
        if ($this->request->hasFile('picture')) {
            $picture = $this->request->file('picture');
            $path = public_path() . '/content/images/' . $category->slug . '/' . $product->id;

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $pictureName = time() . '-' . $picture->getClientOriginalName();

            $picture->move($path, $pictureName);

            $picture = Picture::create([
                'filename' => $pictureName,
            ]);

            $picture->product()->associate($product)->save();
        }

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

        $product = $category->products()->find($productId);

        $picture = $product->pictures()->find($id);

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
        $category = Category::with('products')->findOrFail($categoryId);

        $productId = $this->request->input('newProductId') ?: $productId;

        $product = $category->products()->find($productId);

        $pictureModel = $product->pictures()->where('id', $id)->firstOrFail();

        //TODO:when making a validation, make sure 'picture' has been passed, if it is not, redirect back
        if ($this->request->hasFile('picture')) {
            $picture = $this->request->file('picture');
            $path = public_path() . '/content/images/' . $category->slug . '/' . $product->id;

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $pictureName = time() . '-' . $picture->getClientOriginalName();

            $picture->move($path, $pictureName);

            //delete old pic
            File::delete($path . '/' . $pictureModel->filename);

            $picture = $pictureModel->fill([
                'filename' => $pictureName,
            ])->save();

            $pictureModel->product()->associate($product)->save();
        }

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

        $product = $category->products()->findOrFail($productId);

        $picture = $product->pictures()->findOrFail($id);

        $picture->delete();

        return redirect()->route('category.products.pictures.index', [$category->id, $product->id]);
    }

}
