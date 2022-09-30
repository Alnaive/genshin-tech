<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

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
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
class WelcomeController extends Controller
{
    public function index() {
        return Redirect::route('login');
        // return Inertia::render('Welcome', [
        //     'build' => Build::with('character','weapon')->inRandomOrder()->limit(1)->get(),
        //     'totalBuild' => Build::count(),
        // ]);
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
    public function explore(Request $request){
        $query = Build::with('character','weapon','likes');
        return Inertia::render('Explore', [
            'builds' => $query->inRandomOrder()->paginate(12)->withQueryString(),
        ]);
    }
    public function showcaseUID($uid){
        $query = Build::where('uid', $uid)->with('character','weapon');
        if(request('search')){
            $query->orWhereHas('character', function($q){
                $q->where('name',  'LIKE', '%'.request('search').'%');
            });
        }
        SEOMeta::setTitle("Showcase");
        SEOMeta::setDescription('Showcase Character by', $uid);
        OpenGraph::setDescription("Showcase Character by $uid" );
        OpenGraph::setTitle("Showcase");
        OpenGraph::setUrl('genshin-tech.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'asia');
        return Inertia::render('Builds/showUID', [
            'builds' => $query->orderBy('character_id')->get(),
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
