<?php
    namespace App\Traits;

    use Carbon\Carbon;
    
    trait Test
    {
        public function scopeGg($query){
            return $query->where('builds.status', '=', 'publish')->where('slug', $slug)
            ->orderBy('builds.created_at', 'desc')
            ;
        }
    }

?>