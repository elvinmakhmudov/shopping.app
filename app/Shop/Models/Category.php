<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = ['name'];

    /**
     * A category has many products
     */
    public function products()
    {
        return $this->hasMany('App\Shop\Models\Product');
    }
}
