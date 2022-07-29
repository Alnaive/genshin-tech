<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artifact extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = [];
    protected $casts = [
      'rarity' => 'array',
  ];
    public function sluggable(){
        return ['slug'=>['source'=>'name','onUpdate'=>true]];
      }

      public function build(){
        return $this->belongsTo(Build::class);
      }

      public function pcs(){
        return $this->hasMany(Pcs::class);
      }
}
