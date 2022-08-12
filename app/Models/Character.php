<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Character extends Model implements Viewable
{
    use HasFactory;
    use Sluggable;
    use InteractsWithViews;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    
    protected $guarded = [];
    protected $casts = [
        'Consts' => 'array',
        'SkillOrder' => 'array',
        'Skills' => 'array',
        'ProudMap' => 'array',
    ];

    public function sluggable(){
        return ['slug'=>['source'=>'name','onUpdate'=>true]];
    }
    public function constellation(){
        return $this->hasOne(Constellation::class);
    }
    public function talent(){
        return $this->hasOne(Talent::class);
    }
    public function weapon(){
        return $this->belongsTo(Weapon::class);
    }
    public function build(){
        return $this->hasMany(Build::class, 'character_id', 'id');
    }
    public function party(){
        return $this->belongsToJson(Build::class, 'party_id')->withdefault();
    }
    public function flower(){
        return $this->belongsTo(Pcs::class, 'flower_id')->withdefault();
    }
    public function plume(){
        return $this->belongsTo(Pcs::class, 'plume_id')->withdefault();
    }
    public function sand(){
        return $this->belongsTo(Pcs::class, 'sand_id')->withdefault();
    }
    public function goblet(){
        return $this->belongsTo(Pcs::class, 'goblet_id')->withdefault();
    }
    public function circlet(){
        return $this->belongsTo(Pcs::class, 'circlet_id')->withdefault();
    }
    public function set4(){
        return $this->belongsTo(Artifact::class, 'four_pcs_art')->withdefault();
    }
    public function set2(){
        return $this->belongsToJson(Artifact::class, 'two_pcs_art')->withdefault();
    }

}
