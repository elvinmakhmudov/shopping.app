<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * An order belongs to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Shop\Models\User');
    }

    /**
     * An order belongs to one product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Shop\Models\Product');
    }
}
