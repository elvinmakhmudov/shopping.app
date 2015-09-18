<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\Node;

class Category extends Node
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'categories';

    protected $fillable = ['title', 'slug', 'is_main'];

    protected $mainPageSlug = 'main-page';

    /**
     * Find category by its name
     *
     * @param $slug
     * @return mixed
     */
    public static function findBySlugOrFail($slug)
    {
        if ($category = static::where('slug', $slug)->first()) {
            return $category;
        }

        throw new ModelNotFoundException;
    }

    /**
     * Find category by its Id or fail
     *
     * TODO: find alternative, without static function so you can typehint this class in controllers
     *
     * @param $id
     * @return mixed
     */
    public static function findOrFail($id)
    {
        if ($category = static::where('id', $id)->first()) {
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

    /**
     * get only main page
     *
     * @param $query
     * @return mixed
     */
    public function scopeMainPage($query)
    {
        return $query->withTrashed()->where('slug', $this->mainPageSlug);
    }

    /**
     * Get all categories except main
     *
     * @param $query
     * @return mixed
     */
    public function scopeExceptMain($query)
    {
        return $query->where('is_main', 0);
    }
}
