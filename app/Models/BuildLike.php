<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildLike extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeForBuild($query, Build $build){
        return $query->where('build_id', $build->id);
    }

    public function scopeForIp($query, string $ip){
        return $query->where('ip', $ip);
    }

    public function scopeForUserAgent($query, string $userAgent){
        return $query->where('user_agent', $userAgent);
    }
}
