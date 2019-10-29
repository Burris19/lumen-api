<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rack extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shelves';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'description',
        'hall_id'
    ];

    protected $dates = ['deleted_at'];

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
