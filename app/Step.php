<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
    	'name','completed'
    ];

    public function task(){
    	return $this->belongsTo('App\Task');
    }

    public function getCompletedAttribute($completed){
    	$arr = [
    		0 => false,
    		1 => true
    	];
    	return $arr[$completed];
    }
}