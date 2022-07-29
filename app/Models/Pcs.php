<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function artifact(){
        return $this->belongsTo(Artifact::class, 'setId');
    }
    public function build(){
        return $this->belongsTo(Build::class);
      }
}
