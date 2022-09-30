<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Build;
use App\Models\Artifact;
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
use App\Charts\WeaponsChart;

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
        // $charData = json_decode(file_get_contents("https://cdn.jsdelivr.net/gh/EnkaNetwork/API-docs@master/store/characters.json"), true);
        $charData = json_decode(file_get_contents("https://api.ambr.top/v2/en/avatar"), true);
        $tt = collect($charData)->keys();
        // dd($allCharacter[0]['SideIconName'] == $charData[10000002]['SideIconName']);
        return Inertia::render('Characters/create',[
            'charID' => $allCharacter,
            'characters' => $charData,
        ]);
    }
    public function getCharacterApi(){
        $itemName = json_decode(file_get_contents(public_path() . "/asset/characters.json"), true);
        // $itemName = json_decode(file_get_contents("https://cdn.jsdelivr.net/gh/EnkaNetwork/API-docs@master/store/characters.json"), true);
        // $itemName = json_decode(file_get_contents("https://api.ambr.top/v2/en/avatar"), true);
        return Inertia::render('Characters/getCharacter',[
            'itemName' => $itemName,
            'skillDepot' => json_decode(file_get_contents("https://cdn.jsdelivr.net/gh/Dimbreath/GenshinData@master/ExcelBinOutput/AvatarSkillDepotExcelConfigData.json"), true),
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
        
        // $img1 = $request->avatar;
        // if ($request->file('avatar')) {
        //     $img1 = $request->avatar->getClientOriginalName();
        //     $request->avatar->storeAS('images/icon/avatar', $img1);
        //     }
        // $data = $request->all();
        // $data['slug'] = SlugService::createSlug(Character::class, 'slug',$request->name);
        // $data['avatar'] = $img1;
        $character = Character::updateOrCreate(['id' => $request->id], [
            'id' => $request->id,
            'name' => $request->name,
            'slug' => SlugService::createSlug(Character::class, 'slug',$request->name),
            'rarity' => $request->rarity,
            'element' => $request->element,
            'Consts' => $request->Consts,
            'skillDepotId' => $request->skillDepotId,
            'SkillOrder' => $request->SkillOrder,
            'Skills' => $request->Skills,
            'ProudMap' => $request->ProudMap,
            'icon' => $request->icon,
            'sideIcon' => $request->sideIcon,
            'splashArt' => $request->splashArt,
            'avatar' => $request->avatar,
            'weaponType' => $request->weaponType,
            'detail' => $request->detail,
            'native' => $request->native,
            'constellation' => $request->constellation,
            'title' => $request->title,

        ]);
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

        $character = Character::with('build')->withCount('build')->where('slug', $slug)->first();
        $title = $character->name;
        $expiresAt = now()->addHours(1);
        views($character)->cooldown($expiresAt)->record();
        if( $character->build->isEmpty()){
            return Inertia::render('Characters/showEmpty', [
                'character' => $character,
                'title' => $title,
                'agent' => $agent->isMobile(),
            ]);
        } else  {
        $level = [0,1,2,3,4,5,6,7,8,9,10];

        $countNormalAttack = Character::join('builds', 'builds.character_id', '=', 'characters.id')
        ->select('builds.normalAttack',  DB::raw('count(builds.normalAttack) as total'))
        ->groupBy('normalAttack',)
           ->orderBy('total', 'desc')
           ->where('slug', $slug)
           ->get();

        $collectNormal = collect($countNormalAttack);
        $normalAttack = [];

        for($i=0; $i < 11; $i++){
            $levelVal = 0;
            foreach($collectNormal as $key => $data){
                if($data['normalAttack'] == $level[$i]){
                    $levelVal = $data['total'];
                }
            }
            $normalAttack[] = $levelVal;
        }

        $countElementalSkill = Character::join('builds', 'builds.character_id', '=', 'characters.id')
        ->select('builds.elementalSkill',  DB::raw('count(builds.elementalSkill) as total'))
            ->groupBy('elementalSkill',)
            ->orderBy('total', 'desc')
            ->where('slug', $slug)
            ->get();
        $collectElemental = collect($countElementalSkill);

        $elementalSkill = [];
        for($i=0; $i < 11; $i++){
            $levelVal = 0;
            foreach($collectElemental as $key => $data){
                if($data['elementalSkill'] == $level[$i]){
                    $levelVal = $data['total'];
                }
            }
            $elementalSkill[] = $levelVal;
        }
        $countElementalBurst = Character::join('builds', 'builds.character_id', '=', 'characters.id')
        ->select('builds.elementalBurst',  DB::raw('count(builds.elementalBurst) as total'))
            ->groupBy('elementalBurst',)
            ->orderBy('total', 'desc')
            ->where('slug', $slug)
            ->get();
        $elementalBurst = [];
        $collectBurst = collect($countElementalBurst);

        $elementalBurst = [];
        for($i=0; $i < 11; $i++){
            $levelVal = 0;
            foreach($collectBurst as $key => $data){
                if($data['elementalBurst'] == $level[$i]){
                    $levelVal = $data['total'];
                }
            }
            $elementalBurst[] = $levelVal;
        }
        $weapon_count = Character::join('builds', 'builds.character_id', '=', 'characters.id')
        ->select('builds.weapon_id',  DB::raw('count(builds.weapon_id) as total'))
           ->groupBy('weapon_id',)
           ->orderBy('total', 'desc')
           ->where('slug', $slug)
           ->get();

        $weapon_name = Build::join('characters', 'characters.id', 'builds.character_id')->with('weapon')
        ->select('builds.weapon_id', DB::raw('count(builds.weapon_id) as total'))
        ->groupBy('weapon_id',)
                ->orderBy('total', 'desc')
        ->where('slug', $slug)
        ->get();

        $weaponName = [];
        foreach($weapon_name as $data){
            $weaponName[] = $data->weapon->name;
        }
        $totalWeapon = [];
        foreach($weapon_count as $data){
                $totalWeapon[] =  $data->total;
        }

        $weaponRecom = Build::join('characters', 'characters.id', 'builds.character_id')->with('weapon')
        ->select('builds.weapon_id', DB::raw('count(builds.weapon_id) as total'))
        ->groupBy('weapon_id',)
                ->orderBy('total', 'desc')
        ->where('slug', $slug)->limit(5)
        ->get();

        $weaponRecommendation = [];
        foreach($weaponRecom as $data){
            $weaponRecommendation[] = $data;
        }

         // Artifact count
         $artifact4Count = Character::join('builds', 'builds.character_id', '=', 'characters.id')
         ->select('builds.four_pcs_art', DB::raw('count(builds.four_pcs_art) as total'))
            ->groupBy('four_pcs_art',)
            ->orderBy('total', 'desc')
            ->whereNotNull('builds.four_pcs_art')
            ->where('slug', $slug)
            ->get();
 
         $artifact4Name = Build::join('characters', 'characters.id', 'builds.character_id')->with('set4')
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

            $art2Name = Build::join('characters', 'characters.id', 'builds.character_id')->where('slug', $slug)
            ->select('builds.two_pcs_art')
            ->groupBy('two_pcs_art')
            ->get();

            $collectArt2Name = collect($art2Name);

            $art2Name = [];
            foreach($collectArt2Name as $data)
            foreach($data->set2 as $rr){
                $art2Name[] = $rr->name;
            }
            $arrayArt2Name = array_count_values($art2Name);

            $totalArt2 = [];
            foreach($arrayArt2Name as $key=>$data){
                $totalArt2[] = $data;
            }
            $artifact4Recom = Build::join('characters', 'characters.id', 'builds.character_id')->with('set4')
            ->select('builds.four_pcs_art', DB::raw('count(builds.four_pcs_art) as total'))
            ->groupBy('four_pcs_art',)
                    ->orderBy('total', 'desc')
                ->whereNotNull('builds.four_pcs_art')
            ->where('slug', $slug)->limit(3)
            ->get();
            $art4Recom = [];
            foreach($artifact4Recom as $data){
                    $art4Recom[] = $data;
            }
            $artifact2Recom = Build::join('characters', 'characters.id', 'builds.character_id')->with('set2')->where('slug', $slug)
            ->select('builds.two_pcs_art')
            ->groupBy('two_pcs_art')->limit(3)
            ->get();
            $Count = 0;
            $art2Recom = [];
            foreach($artifact2Recom as $data)
            foreach($data->set2 as $rr){
                $Count++;
                if ($Count == 4){
                    break; //stop foreach loop after 4th loop
                }
                $art2Recom[] = $rr;
            }
        }
        $build = Build::join('characters', 'characters.id', 'builds.character_id')->with('character','weapon')->inRandomOrder()->limit(1)->where('slug', $slug)->get();
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
            'weaponName' => $weaponName,
            'totalWeapon' => $totalWeapon,
            'weaponRecom' => $weaponRecom,
            'art4Name' => $art4Name,
            'totalArt4' => $art4Total,
            'art2Name' => $art2Name,
            'totalArt2' => $totalArt2,
            'art4Recom' => $art4Recom,
            'art2Recom' => $art2Recom,
            'normalAttack' => $normalAttack,
            'elementalSkill' => $elementalSkill,
            'elementalBurst' => $elementalBurst,
            'build' => $build,
        ]);
    }
    public function weaponChart(WeaponsChart $chart)
    {
        return Inertia::render('Character/Component/charts/weapon', ['chart' => $chart->build()]);
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
