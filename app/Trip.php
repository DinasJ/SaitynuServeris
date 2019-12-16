<?php

namespace App;

use App\Traits\BootableTrait;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use BootableTrait;

    protected $casts = [
        'conversations' => 'boolean', 'pets' => 'boolean', 'smoking' => 'boolean', 'music' => 'boolean'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'date', 'time', 'seats_available', 'price_per_person', 'conversations', 'pets', 'smoking', 'music'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    public function creator() {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
}
