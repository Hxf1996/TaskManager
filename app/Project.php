<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','thumbnail'
    ];
    //$project->user(
    public function user(){
        return $this->belongsTo('App\User');
    }
    //$project->tasks()
    public function tasks(){
        return $this->hasMany('App\Task');
    }
    public function getThumbnailAttribute($value){
        if (!$value){
            return 'flower.jpg';
        }
        return $value;
    }
}
