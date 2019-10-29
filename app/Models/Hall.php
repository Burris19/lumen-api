<?php

namespace App\Models;

use App\Models\Rack;
use App\Models\Cellar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hall extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hallways';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'description',
        'cellar_id'
    ];

    protected $dates = ['deleted_at'];

    public function cellar()
    {
        return $this->belongsTo(Cellar::class);
    }

    public function shelves()
    {
        return $this->hasMany(Rack::class);
    }
}
