<?php

namespace App;

use App\Traits\BootableTrait;
use Illuminate\Database\Eloquent\Model;

class DriverSettings extends Model
{
    use BootableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversations', 'pets', 'smoking', 'music',
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
