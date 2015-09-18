<?php namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'pictures';
    protected $fillable = ['filename'];

    /**
     * Images belong to a product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Shop\Models\Product');
    }

}
