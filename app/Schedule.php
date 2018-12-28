<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'start_date',
        'end_date',
        'description',
        'major_id',
        'difficulty_id',
        'target_id',
        'mentor_id'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function mentor()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the phone.
     */
    public function difficulty()
    {
        return $this->belongsTo('App\Difficulty');
    }

    /**
     * Get the user that owns the phone.
     */
    public function major()
    {
        return $this->belongsTo('App\Major');
    }

    /**
     * Get the user that owns the phone.
     */
    public function target()
    {
        return $this->belongsTo('App\Target');
    }
}
