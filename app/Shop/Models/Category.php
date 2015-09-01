<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Kalnoy\Nestedset\Node;

class Category extends Node {

    protected $table = 'categories';

    protected $fillable = ['name'];

    /**
     * Find category by its name
     *
     * @param $slug
     * @return mixed
     */
    public static function findBySlugOrFail($slug)
    {
        if ( $category = static::where('slug', $slug)->first() ) {
            return $category;
        }

        throw new ModelNotFoundException;
    }

    /**
     * A category belongs to many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Shop\Models\Product', 'product_category');
    }

    /**
     * get all chilren recursively
     *
     * @return mixed
     */
    public function children()
    {
        //call parent class function
        return $this->hasMany(get_class($this), static::PARENT_ID)->with('products.reviews');
    }

    /**
     * A category has many reviews through products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function reviews()
    {
        return $this->hasManyThrough('App\Shop\Models\Review', 'App\Shop\Models\Product');
    }
}
