<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Weapon extends Model
{
    use HasFactory;
    use Sluggable;
    protected $casts = [
        'r1' => 'array',
        'r2' => 'array',
        'r3' => 'array',
        'r4' => 'array',
        'r5' => 'array',
    ];
    protected $guarded = [];
    public function build(){
        return $this->belongsTo(Build::class);
    }
    public function sluggable(){
        return ['slug'=>['source'=>'name','onUpdate'=>true]];
    }
    public function character(){
        return $this->hasMany(Build::class);
    }
}
