<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {

    protected $table = 'subcategories';
    protected $fillable = ['name'];

    /**
     * A subcategory belongs to a category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Shop\Models\Category');
    }

    /**
     * A subcategory has many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Shop\Models\Product')->with('subcategories', 'subcategories.category');
    }

    /**
     * Find a Subcategory by its name
     *
     * @param $slug
     * @return mixed
     * @throws ModelNotFoundException
     */
    public static function findBySlugOrFail($slug)
    {
        if ( $subCategory = static::where('slug', $slug)->first() ) {
            return $subCategory;
        }

        throw new ModelNotFoundException;
    }

}
