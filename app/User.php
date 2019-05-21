<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'job', 'city', 'country', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Property for retrieving  users
     *
     * @return Object containing data of all users 
     */
    public function getUsers()
    {
        $getUser = User::all()->sortByDesc('id');
        return $getUser;
    }

    /**
     * Property to create users.
     *
     * @param  $validated
     * @return User created
     */
    public function createUsers($validated)
    {
        $validated['password'] = Hash::make($validated['password']);
        $createdUser = User::create($validated);
        return $createdUser;
    }

    /**
     * Property to edit user
     *
     * @param  $validated
     * @return User updated
     */
    public function editUser($validated)
    {
        $updateUser = User::update($validated);
        return $updateUser;
    }
}
