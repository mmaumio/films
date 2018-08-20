<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'release-date', 'rating', 'ticket-price', 'country', 'genre', 'photo'
    ];

}
