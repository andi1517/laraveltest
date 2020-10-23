<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Automatic Protection
    //protected $fillable = ['title', 'excerpt', 'body']; //Unless Arcticle::create or User::create(request()->all()) dangerous!
    protected $guarded = [];
    //protected $primaryKey = 'id';
    //wenn keine id unter http://127.0.0.1:8000/articles/6/ eingegeben
    //sonder zB http://127.0.0.1:8000/articles/hier_steht_der_text
    public function getRouteKeyName()
    {
        //return 'slug';
    }

    public function path()
    {
        return '/articles/';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
