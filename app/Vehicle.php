<?php

namespace App;

use App\Traits\BootableTrait;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use BootableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_plate', 'model', 'color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];
}
