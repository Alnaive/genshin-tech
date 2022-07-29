<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Build;
use App\Models\Artifact;
use App\Models\Constellation;
use App\Models\Talent;
use App\Models\Pcs;
use App\Models\Weapon;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Redirect;
use Auth;
use File;
use DB;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Jenssegers\Agent\Agent;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\characterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Character::query();
        if(request('search')){
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }
        $title = 'Character';
        return Inertia::render('Characters/index', [
            'title' => $title,
            'filters' => Request::all('search'),
            'characters' => $query->latest()->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCharacter = Character::all();
        $dataChar = [];
        $charData = json_decode(file_get_contents(public_path() . "/asset/characters.json"), true);
        $tt = collect($charData)->keys();
        // dd($allCharacter[0]['SideIconName'] == $charData[10000002]['SideIconName']);
        return Inertia::render('Characters/create',[
            'charID' => $allCharacter,
            'characters' => $charData,
        ]);
    }
    public function getCharacterApi(){
        $itemName = json_decode(file_get_contents(public_path() . "/asset/ItemName.json"), true);
        return Inertia::render('Characters/getCharacter',[
            'itemName' => $itemName,
        ]);
    }
    public function getConsTalent($id){
        $character = Character::with('constellation','talent')->find($id);
        $constellation = [];
        $talent = [];
        
        return Inertia::render('Characters/getConsTalent', [
            'character' => $character,
            'constellations' => $constellation,
            'talents' => $talent,
        ]);
    }
    public function addBuild($slug){
        $character = Character::with('constellation','talent')->where('slug', $slug)->first();
        if($character->status == 'draft'){
            abort(403);
        } else {
            $dataParty = Character::orderBy('name', 'asc')->get();
        $characters = [];
        foreach($dataParty as $data){
            if($data->id != $character->id){
                $characters[] = $data;
            }
        }
        $weapon = Weapon::orderBy('name', 'asc')->get();
        $weapons = [];
        foreach($weapon as $data){
            if($data->weapontype == $character->weapontype){
                $weapons[] = $data;
            }
        }

        $artifacts =  Artifact::with('pcs')->orderBy('paramRarity','desc')->orderBy('name','asc')->get();
        $artPcs =  Pcs::with('artifact')->orderBy('rarity','desc')->orderBy('name', 'asc')->get();
       
        $flowers = Pcs::where('relictype', 'Flower of Life')->orderBy('rarity','desc')->orderBy('name','asc')->get();
        $plumes = Pcs::where('relictype', 'Plume of Death')->orderBy('rarity','desc')->orderBy('name','asc')->get();
        $sands = Pcs::where('relictype', 'Sands of Eon')->orderBy('rarity','desc')->orderBy('name','asc')->get();
        $goblets = Pcs::where('relictype', 'Goblet of Eonothem')->orderBy('rarity','desc')->orderBy('name','asc')->get();
        $circlets = Pcs::where('relictype', 'Circlet of Logos')->orderBy('rarity','desc')->orderBy('name','asc')->get();
        
        return Inertia::render('Builds/addBuild',[
        'character' => $character,
        'characters' => $characters,
        'artifacts' => $artifacts,
        'artPcs' => $artPcs,
        'flowerPcs' => $flowers,
        'plumePcs' => $plumes,
        'sandsPcs' => $sands,
        'gobletPcs' => $goblets,
        'circletPcs' => $circlets,
        'weapons' => $weapons,

        ]);
        }
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(characterRequest $request)
    {
        
        $img1 = $request->avatar;
        if ($request->file('avatar')) {
            $img1 = $request->avatar->hashName();
            $request->avatar->storeAS('images/icon/avatar', $img1);
            }
        $data = $request->all();
        $data['slug'] = SlugService::createSlug(Character::class, 'slug',$request->name);
        $data['avatar'] = $img1;
        $character = Character::create($data);
        return Redirect::route('Characters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */

    public function show(Character $character, $slug){
        
    }

    public function showCharacter(Character $character, $slug)
    {
        $agent = new Agent();

        $character = Character::with('build','weapon','party','constellation','talent')->where('slug', $slug)->first();
        $title = $character->name;
        $expiresAt = now()->addHours(1);
        views($character)->cooldown($expiresAt)->record();
        $checkDraft = Character::join('builds', 'builds.character_id', '=', 'characters.id')->where('builds.status', '=', 'draft')->where('slug', $slug)->get();
        $checkPublish = Character::join('builds', 'builds.character_id', '=', 'characters.id')->where('builds.status', '=', 'publish')->where('slug', $slug)->get();
        $collectDraft = collect($checkDraft)->toArray();
        $collectPublish = collect($checkPublish)->toArray();
        
        if( $character->build->isEmpty()){
            return Inertia::render('Characters/showEmpty', [
                'character' => $character,
                'title' => $title,
                'agent' => $agent->isMobile(),
            ]);
        } else  {
        $total_party = Character::join('builds', 'builds.character_id', '=', 'characters.id')->where('builds.status', '=', 'publish')->where('slug', $slug)
        ->select('builds.party_id')
        ->groupBy('party_id')
        ->get();
           
        $party_name = Build::join('characters', 'characters.id', 'builds.character_id')->where('builds.status', '=', 'publish')->where('slug', $slug)
        ->select('builds.party_id')
        ->groupBy('party_id')
        ->get();
        
        $collection = collect($total_party);
        $test = [];
        foreach($collection as $data)
        foreach($data->party_id as $gg){
            $test[] = $gg;
        }

        $array = array_count_values($test);
        $totalParty = [];
        foreach($array as $data){
                $totalParty[] = $data;
        }
        $collectName = collect($party_name);
        $test2 = [];
        foreach($collectName as $data)
        foreach($data->party as $rr){
            $test2[] = $rr->name;
        }
        $array1 = array_count_values($test2);

        $PartyName = [];
        foreach($array1 as $key=>$data){
            $PartyName[] = $key;
        }
        
        $build = Character::join('builds', 'builds.character_id', '=', 'characters.id')->where('builds.status', '=', 'publish')->where('slug', $slug)
        ->orderBy('builds.created_at', 'desc')
        ->paginate(3);

        // Artifact count
        $artifact4Count = Character::join('builds', 'builds.character_id', '=', 'characters.id')
        ->where('builds.status', '=', 'publish')
        ->select('builds.four_pcs_art', DB::raw('count(builds.four_pcs_art) as total'))
           ->groupBy('four_pcs_art',)
           ->orderBy('total', 'desc')
           ->whereNotNull('builds.four_pcs_art')
           ->where('slug', $slug)
           ->get();

        $artifact4Name = Build::join('characters', 'characters.id', 'builds.character_id')->with('set4')
        ->where('builds.status', '=', 'publish')
           ->select('builds.four_pcs_art', DB::raw('count(builds.four_pcs_art) as total'))
           ->groupBy('four_pcs_art',)
                   ->orderBy('total', 'desc')
            ->whereNotNull('builds.four_pcs_art')
           ->where('slug', $slug)
           ->get();
   
           $art4Total = [];
           foreach($artifact4Count as $data){
               $art4Total[] = $data->total;
           }
           $art4Name = [];
           foreach($artifact4Name as $data){
                $art4Name[] = $data->set4->name;
           }
        
        $art2 = Character::join('builds', 'builds.character_id', '=', 'characters.id')->where('builds.status', '=', 'publish')->where('slug', $slug)
           ->select('builds.two_pcs_art')
           ->groupBy('two_pcs_art')
           ->get();
            $art2Count = [];
            foreach($art2 as $data)
            foreach($data->two_pcs_art as $data_two_pcs){
                $art2Count[] = $data_two_pcs;
            }
            $arrayArt2 = array_count_values($art2Count);
            $art2Total = [];
            foreach($arrayArt2 as $data){
                    $art2Total[] = $data;
            }
        
        $art2Name = Build::join('characters', 'characters.id', 'builds.character_id')->where('builds.status', '=', 'publish')->where('slug', $slug)
        ->select('builds.two_pcs_art')
        ->groupBy('two_pcs_art')
        ->get();
        $collectArt2Name = collect($art2Name);
        $name2Art = [];
        foreach($collectArt2Name as $data)
        foreach($data->set2 as $rr){
            $name2Art[] = $rr->name;
        }
        $arrayArt2Name = array_count_values($name2Art);

        $art2TotalName = [];
        foreach($arrayArt2Name as $key=>$data){
            $art2TotalName[] = $key;
        }
        $weapon_count = Character::join('builds', 'builds.character_id', '=', 'characters.id')
         ->where('builds.status', '=', 'publish')
         ->select('builds.weapon_id',  DB::raw('count(builds.weapon_id) as total'))
            ->groupBy('weapon_id',)
            ->orderBy('total', 'desc')
            ->where('slug', $slug)
            ->get();

        $weapon_name = Build::join('characters', 'characters.id', 'builds.character_id')->with('weapon')
        ->where('builds.status', '=', 'publish')
        ->withcount('weapon')
        ->select('builds.weapon_id', DB::raw('count(builds.weapon_id) as total'))
        ->groupBy('weapon_id',)
                ->orderBy('total', 'desc')
        ->where('slug', $slug)
        ->get();

        $gg = [];
        foreach($weapon_name as $data){
            $gg[] = $data->weapon->name;
        }
        $pp = [];
        foreach($weapon_count as $data){
             $pp[] =  $data->total;
        }
        
        $weaponRecom = Build::join('characters', 'characters.id', 'builds.character_id')->with('weapon')
        ->where('builds.status', '=', 'publish')
        ->select('builds.weapon_id', DB::raw('count(builds.weapon_id) as total'))
        ->groupBy('weapon_id',)
                ->orderBy('total', 'desc')
        ->where('slug', $slug)->limit(5)
        ->get();

        $weaponRecommendation = [];
        foreach($weaponRecom as $data){
            $weaponRecommendation[] = $data;
        }
        $artifact4Recom = Build::join('characters', 'characters.id', 'builds.character_id')->with('set4.pcs')
        ->where('builds.status', '=', 'publish')
           ->select('builds.four_pcs_art', DB::raw('count(builds.four_pcs_art) as total'))
           ->groupBy('four_pcs_art',)
                   ->orderBy('total', 'desc')
            ->whereNotNull('builds.four_pcs_art')
           ->where('slug', $slug)->limit(3)
           ->get();
           $art4Recommendation = [];
           foreach($artifact4Recom as $data){
                $art4Recommendation[] = $data;
           }
        $art2Recom = Build::join('characters', 'characters.id', 'builds.character_id')->where('builds.status', '=', 'publish')->where('slug', $slug)
           ->select('builds.two_pcs_art')
           ->groupBy('two_pcs_art')->limit(3)
           ->get();
           $Count = 0;
           $art2Recommendation = [];
           foreach($art2Recom as $data)
           foreach($data->set2 as $rr){
            $Count++;
            if ($Count == 4){
                break; //stop foreach loop after 4th loop
            }
               $art2Recommendation[] = $rr;
           }
        $charMedian = Character::join('builds', 'builds.character_id', '=', 'characters.id')
            ->where('builds.status', '=', 'publish')
            ->select('builds.hp','builds.atk', 'builds.defense', 'builds.em','builds.c_rate','builds.c_damage', 'builds.er')
            ->where('slug', $slug)
            ->get();
            $hp = [];
            $atk = [];
            $defense = [];
            $em = [];
            $critRate = [];
            $critDamage = [];
            $er = [];
            foreach($charMedian as $data){
                $hp[] = $data->hp;
                $atk[] = $data->atk;
                $defense[] = $data->defense;
                $em[] = $data->em;
                $critRate[] = $data->c_rate;
                $critDamage[] = $data->c_damage;
                $er[] = $data->er;
            }
            $medianHp = collect($hp)->median();
            $medianAtk = collect($atk)->median();
            $medianDefense = collect($defense)->median();
            $medianEm = collect($em)->median();
            $medianCritRate = collect($critRate)->median();
            $medianCritDamage = collect($critDamage)->median();
            $medianEr = collect($er)->median();
            
        $charlv_count = Character::join('builds', 'builds.character_id', '=', 'characters.id')
            ->where('builds.status', '=', 'publish')
        ->select('builds.char_lv', DB::raw('count(builds.char_lv) as total'), DB::raw('builds.char_lv as lv'))
            ->groupBy('char_lv')
            ->where('slug', $slug)
            ->get();
            $lv = [];
            $total_lv = [];
            foreach($charlv_count as $data){
                $lv[] = sprintf("Lv %s", $data->lv);
                $total_lv[] = $data->total;
            }
        
        $count_talent1 = Character::join('builds', 'builds.character_id', '=', 'characters.id')
            ->where('builds.status', '=', 'publish')
            ->select('builds.talent1')
            ->orderBy('builds.talent1', 'ASC')
            ->where('slug', $slug)
            ->get();
            $collectTalent1 = collect($count_talent1);
            $talent1 = [];
            foreach($collectTalent1 as $data){
                $talent1[] = $data->talent1;
            }
            $arraytalent1 = array_count_values($talent1);
            $labelTalent1 = [];
            $t1 = [];
            foreach($arraytalent1 as $key=>$data){
                    $labelTalent1[] = sprintf("Lv %s", $key);
                    $t1[] = $data;
            }
            // dd($talent1, $arraytalent1, $labelTalent1);
        $collectTalent2 = Character::join('builds', 'builds.character_id', '=', 'characters.id')
            ->where('builds.status', '=', 'publish')
            ->select('builds.talent2')
            ->orderBy('builds.talent2', 'ASC')
            ->where('slug', $slug)
            ->get();
            $talent2 = [];
            foreach($collectTalent2 as $data){
                $talent2[] = $data->talent2;
            }
            $arraytalent2 = array_count_values($talent2);
            $labelTalent2 = [];
            $t2 = [];
            foreach($arraytalent2 as $key=>$data){
                    $labelTalent2[] = sprintf("Lv %s", $key);
                    $t2[] = $data;
            }
        $collectTalent3 = Character::join('builds', 'builds.character_id', '=', 'characters.id')
            ->where('builds.status', '=', 'publish')
            ->select('builds.talent3')
            ->orderBy('builds.talent3', 'ASC')
            ->where('slug', $slug)
            ->get();
            $talent3 = [];
            foreach($collectTalent3 as $data){
                $talent3[] = $data->talent3;
            }
            $arraytalent3 = array_count_values($talent3);
            $labelTalent3 = [];
            $t3 = [];
            foreach($arraytalent3 as $key=>$data){
                    $labelTalent3[] = sprintf("Lv %s", $key);
                    $t3[] = $data;
            }
       
        SEOMeta::setTitle($character->name);
        SEOMeta::setDescription($character->description);
        SEOMeta::addMeta('article:published_time', $character->updated_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $character->rarity, 'property');
        SEOMeta::addKeyword([$character->name, 'build', 'genshin impact']);
        OpenGraph::setDescription($character->description);
        OpenGraph::setTitle($character->name);
        OpenGraph::setUrl('genshin-tech.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
 
        OpenGraph::addImage(url($character->icon), ['height' => 300, 'width' => 300]);
        return Inertia::render('Characters/show', [
            'character' => $character,
            'title' => $title,
            'build' => $build,
            'weapon_count' => $pp,
            'weapon_name' => $gg,
            'weaponRecom' => $weaponRecommendation,
            'art4Recom' => $art4Recommendation,
            'art2Recom' => $art2Recommendation,
            'total_lv' => $total_lv,
            'lv' => $lv,
            't1' => $t1,
            't1Label' => $labelTalent1,
            't2' => $t2,
            't2Label' => $labelTalent2,
            't3' => $t3,
            't3Label' => $labelTalent3,
            'totalParty' => $totalParty,
            'partyName' => $PartyName,
            'art4Total' => $art4Total,
            'art4Name' => $art4Name,
            'art2Total' => $art2Total,
            'art2Name' => $art2TotalName,
            'medianHp' => $medianHp,
            'medianAtk' => $medianAtk,
            'medianDefense' => $medianDefense,
            'medianEm' => $medianEm,
            'medianCritRate' => $medianCritRate,
            'medianCritDamage' => $medianCritDamage,
            'medianEr' => $medianEr,
            'agent' => $agent->isMobile(),
        ]);
       }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Characters/edit', [
            'character' => Character::find($id)
        ]);
    }
    public function editChar($id)
    {
        $character = Character::find($id);
        return Inertia::render('Characters/edit', [
            'character' => $character,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function updateDraft(Request $request, $id)
    {
        $character = Character::find($id);
        $character->update([
            'status' => 'draft'
        ]);
        return back();

    }
    public function updatePublish(Request $request, $id)
    {
        $character = Character::find($id);
        $character->update([
            'status' => 'publish'
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::find($id);
        if (!empty($character->avatar)) {
            File::delete(public_path('storage/images/icon/avatar/'.$character->avatar));
        }
        $character->delete();
        return Redirect::route('Characters.index');

    }
}
