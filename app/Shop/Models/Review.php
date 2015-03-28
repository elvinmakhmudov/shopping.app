<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    protected $table = 'reviews';

    protected $fillable = ['rating', 'content'];

    /**
     * A review belongs to one product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Shop\Models\Product');
    }

    /**
     * A review belongs to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Shop\Models\User');
    }
}
