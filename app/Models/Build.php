<?php

namespace App\Models;

use App\Traits\Test;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Build extends Model
{
    use HasFactory, Test;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
	use \Conner\Likeable\Likeable;

    protected $guarded = [];
    protected $casts = [
        'two_pcs_art' => 'array',
        'equipList' => 'json',
        'talent' => 'json',
        'talentExtraLv' => 'json',
    ];
    protected $withCount = ['likes',];

   
    public function character(){
        return $this->belongsTo(Character::class,'character_id','id')->withdefault();
    }
    public function user(){
        return $this->belongsTo(User::class)->withdefault();
    }
    public function weapon(){
        return $this->belongsTo(Weapon::class)->withdefault();
    }

    public function party(){
        return $this->belongsToJson(Character::class, 'party_id')->withdefault();
    }

   
    public function set4(){
        return $this->belongsTo(Artifact::class, 'four_pcs_art','name')->withdefault();
    }
    public function set2(){
        return $this->belongsToJson(Artifact::class, 'two_pcs_art','name')->withdefault();
    }
    
}
