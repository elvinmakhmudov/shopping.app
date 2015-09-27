<?php namespace App\Services\Pictures;

use App\Shop\Models\Category;
use App\Shop\Models\Picture;
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
            'new_product_id' => 'sometimes|exists:products,id',
            'picture' => 'sometimes|image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * update a product
     *
     * @param  array $data
     * @param Category $category
     * @param Product $product
     * @param Picture $pictureModel
     * @return Product
     */
    public function update(array $data, Category $category, Product $product, Picture $pictureModel)
    {
        $updateArray = [];
        foreach ($data as $key => $value) {
            if ($value !== '') {
                switch ($key) {
                    case 'new_product_id':
                        //find the new product by its id
                        $newProduct = Product::findOrFail($data['new_product_id']);
                        //associate with the new product
                        $pictureModel->product()->associate($newProduct)->save();
                        break;
                    case 'picture':
                        $updateArray['filename'] = $this->extractPicture($value, $category, $product, $pictureModel);
                        break;
                }
            }
        }

        $pictureModel->update($updateArray);

        return $pictureModel;
    }

    /**
     * Move the thumbnail to the specific place
     *
     * @param $picture
     * @param Category $category
     * @param Product $product
     * @return string
     */
    private function extractPicture($picture, Category $category, Product $product, Picture $pictureModel)
    {
        $path = public_path() . '/content/images/' . $category->slug . '/' . $product->id;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $pictureName = time() . '-' . $picture->getClientOriginalName();

        $picture->move($path, $pictureName);

        //delete old pic
        File::delete($path . '/' . $pictureModel->filename);

        return $pictureName;
    }
}
