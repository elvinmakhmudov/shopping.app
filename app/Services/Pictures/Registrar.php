<?php namespace App\Services\Pictures;

use App\Shop\Models\Category;
use App\Shop\Models\Picture;
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
        return $this->validate($request, [
            'new_product_id' => 'required|exists:products,id',
            'picture' => 'required|image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @param Category $category
     * @param Product $product
     * @return User
     */
    public function create(array $data, Category $category, Product $product)
    {
        $pictureName = $this->extractPicture($data['picture'], $category, $product);

        $picture = Picture::create([
            'filename' => $pictureName,
        ]);

        $picture->product()->associate($product)->save();

        return $picture;
    }

    /**
     * Parse and move picture to a specific folder
     *
     * @param $picture
     * @param Category $category
     * @param Product $product
     * @return string
     */
    public function extractPicture($picture, Category $category, Product $product)
    {
        //first check if a thumbnail has been sent
        $path = public_path() . '/content/images/' . $category->slug . '/' . $product->id;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $pictureName = time() . '-' . $picture->getClientOriginalName();

        $picture->move($path, $pictureName);

        return $pictureName;
    }

}
