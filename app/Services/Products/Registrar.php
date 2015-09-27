<?php namespace App\Services\Products;

use App\Shop\Models\Category;
use App\Shop\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

class Registrar
{
    use ValidatesRequests;

    /*j
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'description' => 'required|string',
            'rating' => 'sometimes|numeric|between:1,5',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @param Category $category
     * @return User
     */
    public function create(array $data, Category $category)
    {
        $thumbnail = $this->extractThumbnail($data['thumbnail'], $category);

        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'rating' => $data['rating'] ?: null,
            'price' => $data['price'],
            'thumbnail' => $thumbnail
        ]);

        $category->products()->save($product);

        return $product;
    }

    /**
     * Parse and move thumbnail to a specific folder
     *
     * @param $thumbnail
     * @param Category $category
     * @return string
     */
    public function extractThumbnail($thumbnail, Category $category)
    {
        //first check if a thumbnail has been sent
        $path = public_path() . '/content/images/' . $category->slug;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

        $thumbnail->move($path, $thumbnailName);

        return $thumbnailName;
    }

}
