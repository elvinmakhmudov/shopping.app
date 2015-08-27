<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'rating', 'price'];

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
        return $this->belongsToMany('App\Shop\Models\Category', 'product_category');
    }
}
