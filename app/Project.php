<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
        //One Model (Project) only belongs to 1 Model (User)
        return $this->belongsTo(User::class);
    }
}
//hasOne   a user has one profile
//hasMany  a user has many articles, projects, tasks, tweets
//belongsTo 
//belongsToMany
//morphMany
//morphToMany