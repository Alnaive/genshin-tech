<?php

namespace App\Http\Controllers;

use File;
use Redirect;
use Inertia\Inertia;
use App\Models\Weapon;
use App\Models\Weaponjson;
use App\Http\Requests\WeaponRequest;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Weapon::query();
        if(request('search')){
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }
        // $string = Weapon::all();
        // foreach($string as $data){
        //     $gg[] = $data->effect;
        // }
        // foreach($data->r1 as $key ){
        //     $tt[] = $key;
        // }
        // $effect  = $gg;
        // $value = array('{0}','{1}','{2}');
        // $replaceValue = $tt;
        // $newphrase = str_replace($value, $replaceValue, $effect);

        $title = 'Weapon';
        return Inertia::render('Weapons/index', [
            'title' => $title,
            'weapons' => $query->latest()->paginate(10)->withqueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $weapons = json_decode(file_get_contents(public_path() . "/asset/WeaponExcelConfigData.json"), true);
        $response = json_decode(file_get_contents("https://api.ambr.top/v2/en/weapon"), true);

        return Inertia::render('Weapons/create', [
            'weapons' => $response,
        ]);
    }
    public function getWeaponApi(){
        $itemName = json_decode(file_get_contents(public_path() . "/asset/ItemName.json"), true);
        return Inertia::render('Weapons/getWeapon', [
            'itemName' => $itemName,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeaponRequest $request)
    {
        $data = $request->all();
        $data['slug'] = SlugService::createSlug(Weapon::class, 'slug',$request->name);
        Weapon::create($data);
        return Redirect::route('Weapons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function show(Weapon $weapon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weapon = Weapon::find($id);
        return Inertia::render('Weapons/edit', [
            'weapon' => $weapon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $weapon = Weapon::find($id);

        $img1 = $weapon->icon;
        if ($request->file('icon')) {
            File::delete(public_path('storage/images/icon/weapon/'.$weapon->icon));
            $img1 = $request->icon->getClientOriginalName();
            $request->icon->storeAS('images/icon/weapon/', $img1);
            }
        $weapon->update([ 
            'name' => $request->name,
            'rarity' => $request->rarity,
            'icon' => $img1,
        ]);

        return Redirect::route('Weapons.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weapon = Weapon::find($id);
        $weapon->delete();
        return Redirect::route('Weapons.index');

    }
}
