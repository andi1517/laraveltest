<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function articles()
    {
        //One Model can have many models
        return $this->hasMany(Article::class);
        //select * from article where user_id = User-Instance-ID
    }

    public function projects()
    {
        //One Model can have many models
        return $this->hasMany(Project::class);
        //select * from projects where user_id = User-Instance-ID
    }
}


//$user = User::find(1); // select * from user where id = 1;
//Give me users projects: Collection of projects where you can iterate on;
// $user->projects; //select * from projects where user_id = 1;
// $user->projects->first();    last();    find(...);   split(in multiple groups);   groupBy(); 