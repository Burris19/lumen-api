<?php

namespace App\Models;

use App\Models\Rack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'cost_price',
        'sale_price',
        'category_id',
        'rack_id',
    ];

    protected $dates = ['deleted_at'];


    public function rack()
    {
        return $this->belongsTo(Rack::class, 'rack_id', 'id');
    }
}
