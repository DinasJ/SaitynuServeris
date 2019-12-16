<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait BootableTrait
{
    public static function bootBootableTrait()
    {
        static::creating(function($table)  {
            $table->created_by = (Auth::check())?Auth::user()->id:1;
            $table->updated_by = (Auth::check())?Auth::user()->id:1;
        });

        static::updating(function($table)  {
            $table->updated_by = (Auth::check())?Auth::user()->id:1;
        });
    }
}
