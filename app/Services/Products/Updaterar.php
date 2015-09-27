<?php namespace App\Services\Products;

use App\Shop\Models\Category;
use App\Shop\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

class Updaterar
{
    use ValidatesRequests;

    /*
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(Request $request)
    {
        return $this->validate($request, [
            'name' => 'sometimes|max:255|string',
            'description' => 'sometimes|string',
            'rating' => 'sometimes|numeric|between:1,5',
            'price' => 'sometimes|numeric',
            'newCategoryId' => 'sometimes|numeric|exists:categories,id',
            'thumbnail' => 'sometimes|image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * update a product
     *
     * @param  array $data
     * @param Category $category
     * @param Product $product
     * @return Product
     */
    public function update(array $data, Category $category, Product $product)
    {
        $updateArray = [];
        foreach ($data as $key => $value) {
            if ($value !== '') {
                switch ($key) {
                    case 'name':
                    case 'description':
                    case 'price':
                    case 'rating':
                        $updateArray[$key] = $value;
                        break;
                    case 'thumbnail':
                        $updateArray[$key] = $this->extractThumbnail($value, $category);
                        break;
                    case 'newCategoryId':
                        $this->changeCategory($value, $category, $product);
                        break;
                }
            }
        }

        $product->update($updateArray);

        return $product;
    }

    /**
     * Move the thumbnail to the specific place
     *
     * @param $thumbnail
     * @param Category $category
     * @return string
     */
    private function extractThumbnail($thumbnail, Category $category)
    {
        $path = public_path() . '/content/images/' . $category->slug;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

        $thumbnail->move($path, $thumbnailName);

        return $thumbnailName;
    }

    /**
     * Change the Category
     *
     * @param $newCategoryId
     * @param Category $category
     * @param Product $product
     */
    private function changeCategory($newCategoryId, Category $category, Product $product)
    {
        //delete old category
        $product->categories()->detach($category->id);
        //add new one
        $product->categories()->attach($newCategoryId);
    }
}
