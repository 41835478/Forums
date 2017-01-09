<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    protected $fillable = ['name', 'description'];

    public function parent(){
        return $this->morphTo('parent');
    }

    public function setParent($model){
        return $this->parent()->associate($model);
    }

    public function children(){
        return $this->morphMany('App\Board', 'parent');
    }

    public function addChild($attributes){
        return $this->children()->create($attributes);
    }

}
