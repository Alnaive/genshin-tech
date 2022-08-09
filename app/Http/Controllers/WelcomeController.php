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
use Log;
use DB;
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
        Log::channel('UID')->info("UID Search: $uid");
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
    public function explore(){
        $query = Build::with('character','weapon');
        if(request('search')){
            $query->where('attack', 'LIKE', '%'.request('search').'%')
            ->orWhere('critRate', 'LIKE', '%'.request('search').'%')
            ->orWhere('critDamage', 'LIKE', '%'.request('search').'%')
            ->orWhereHas('character', function($q){
                $q->where('name',  'LIKE', '%'.request('search').'%');
            });
        }
        return Inertia::render('Explore', [
            'filters' => Request::all('search'),
            'builds' => $query->inRandomOrder()->paginate(20)->withQueryString(),
        ]);
    }
    public function exploreUID($uid){
        $query = Build::where('uid', $uid)->with('character','weapon');
        if(request('search')){
            $query->orWhereHas('character', function($q){
                $q->where('name',  'LIKE', '%'.request('search').'%');
            });
        }
        return Inertia::render('Builds/showUID', [
            'builds' => $query->inRandomOrder()->get(),
            'uid' => $uid,
            'filters' => Request::all('search'),
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
