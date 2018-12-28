<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name'
    ];

     /**
     * Get the role associated with the user.
     */
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
