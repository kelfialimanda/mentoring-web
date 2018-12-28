<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color'
    ];

     /**
     * Get the role associated with the user.
     */
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
