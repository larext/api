<?php

namespace LarExt\API\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'qty'
    ];
}
