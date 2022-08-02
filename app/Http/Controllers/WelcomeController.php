<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Character;
use App\Models\Build;
use App\Models\Artifact;
use App\Models\Weapon;
use App\Models\User;
use Auth;
use Redirect;
use Storage;
use File;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index() {
        return Inertia::render('Welcome', [
            'build' => Build::with('character','weapon')->inRandomOrder()->limit(1)->get(),
            'totalBuild' => Build::count(),
        ]);
    }
    public function uid($uid){
        $character = Character::all();
        $enkaKey = config('services.ENKA_KEY');
        $itemName = json_decode(file_get_contents(public_path() . "/asset/ItemName.json"), true);
        $response = json_decode(file_get_contents("https://enka.network/u/$uid/__data.json?key=$enkaKey"), true);
        return Inertia::render('UID/UID', [
            'uid' => $response,
            'UID' => $uid,
            'character' => $character,
            'itemName' => $itemName,
            ]);
    }
    public function AddBuild($UID){
        return Inertia::render('UID/AddBuild', [
            'uid' => $UID,
            'weapons' => Weapon::all(),
            'itemName' => json_decode(file_get_contents(public_path() . "/asset/ItemName.json"), true),
        ]);
    }
    public function guess() {
        $build = Build::query()->with('character','weapon','set4','set2','likes');
        if(request('search')){
            $build->where('name', 'LIKE', '%'.request('search').'%')
            ->orWhere('char_lv', 'like', '%'.request('search').'%')
                ->orWhere('c_rate', 'like', '%'.request('search').'%')
                ->orWhere('c_damage', 'like', '%'.request('search').'%')
                ->orWhere('em', 'like', '%'.request('search').'%')
                ->orWhere('defense', 'like', '%'.request('search').'%')
                ->orWhere('name', 'like', '%'.request('search').'%');
        }
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        return Inertia::render('Welcome/guess', [
            'build' => $build->withCount('likes')->orderBy('likes_count', 'desc')->paginate(10)->withQueryString(),
            'filters' => Request::all('search'),
            'characters' => Character::all(),
            'artifacts' => Artifact::all(),
            'weapons' => Weapon::all(),
            'ipAddress' => $ipAddress,
        ]);
    }

   

    public function character()
    {
        $characters = Character::query();
        if(request('search')){
            $characters->where('name', 'LIKE', '%'.request('search').'%');
        }
        $character = Character::all();
        $char = [];
        foreach($character as $data){
            $char[] = $data->name;
        }
        return Inertia::render('Welcome/character', [
        'characters' => $characters->with('build')->orderBy('name', 'asc')->get(),
        'char' => $char,
        ]);
    }
}
