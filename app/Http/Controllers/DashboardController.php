<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Character;
use App\Models\Build;
use App\Models\Pcs;
use App\Models\Artifact;
use App\Models\Weapon;
use App\Models\User;
use Auth; use DB;

class DashboardController extends Controller
{
    public function index(){
        $query = Build::all();
        return Inertia::render('Admin/Dashboard', [
            'builds' => $query,
            'characters' => Character::all(),
            'artifactPcs' => Pcs::all(),
            'weapons' => Weapon::all(),
            
        ]);
    }
}
