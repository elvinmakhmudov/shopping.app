<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop\Models\Category;
use App\Shop\Models\Subcategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param $categorySlug
     * @param $subcategorySlug
     * @return Response
     */
	public function show($categorySlug, $subcategorySlug)
	{
        $category = Category::findBySlugOrFail($categorySlug);

        $subcategory = $category->subcategories()->where('slug', $subcategorySlug)->first();
        if ( ! $subcategory ) {
            throw new ModelNotFoundException;
        }

        $products = $subcategory->products()->with('reviews')->get();

        return view('subcategories.show', compact('category', 'subcategory', 'products'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
