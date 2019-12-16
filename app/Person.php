<?php

namespace App;

use App\Traits\BootableTrait;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use BootableTrait;
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'date_of_birth', 'gender', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];


    public function user() {
        return $this->belongsTo('App\User', 'id', 'person_id');
    }

    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
