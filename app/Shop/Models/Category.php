<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = ['name'];

    /**
     * A category has many subcategories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany('App\Shop\Models\Subcategory');
    }

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
}
