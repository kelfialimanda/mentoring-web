<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

     /**
     * Get the role associated with the user.
     */
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
