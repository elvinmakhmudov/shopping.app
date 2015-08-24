<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'rating', 'price'];

    /**
     * A product belongs to many subcategories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subcategories()
    {
        return $this->belongsToMany('App\Shop\Models\Subcategory');
    }
    /**
     * A product has many reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Shop\Models\Review');
    }

    /**
     * @return mixed
     */
    public function categories()
    {
//        return $this->hasManyThrough('App\Shop\Models\Category', 'App\Shop\Models\Subcategory');
    }
}
