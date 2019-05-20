<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city'
    ];

    /**
     * Property for retrieving  users
     *
     * @return Object containing data of all users 
     */
    public function getCities()
    {
        $getCities = Job::all()->sortByDesc('id');
        return $getCities;
    }
}