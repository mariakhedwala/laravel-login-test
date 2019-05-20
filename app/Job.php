<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job'
    ];

    /**
     * Property for retrieving  users
     *
     * @return Object containing data of all users 
     */
    public function getJobs()
    {
        $getJobs = Job::all()->sortByDesc('id');
        return $getJobs;
    }
}
