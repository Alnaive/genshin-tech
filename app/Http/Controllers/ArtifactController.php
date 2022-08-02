<?php

namespace App\Http\Controllers;

use App\Models\Pcs;
use App\Models\Artifact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Redirect; 
use Inertia\Inertia;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ArtifactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Artifact::query();
        if(request('search')){
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }
        $title = 'Artifact ';
        return Inertia::render('Artifacts/index', [
            'title' => $title,
            'artifacts' => $query->latest()->paginate(10),
        ]);
    }
    public function pieces()
    {
        $query = Pcs::query()->with('artifact');
        if(request('search')){
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }
        $title = 'Artifact Pieces';
        return Inertia::render('Artifacts/pieces', [
            'title' => $title,
            'artifacts' => $query->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artifactSet = json_decode(file_get_contents("https://api.ambr.top/v2/en/reliquary"), true);
        return Inertia::render('Artifacts/create', [
            'artifactSet' => $artifactSet,
        ]);
    }
    
    public function getArtifactApi(){
        return Inertia::render('Artifacts/getArtifact');
    }
    public function getPcsApi($id){
        $artifact = Artifact::FindOrFail($id);
        $pcs = Pcs::all();
        $artifacts = json_decode(file_get_contents(public_path() . "/asset/ReliquaryExcelConfigData.json"), true);
        $itemName = json_decode(file_get_contents(public_path() . "/asset/ItemName.json"), true);

        return Inertia::render('Artifacts/getPcs', [
            'artifact' => $artifact,
            'artifacts' => $artifacts,
            'artPcs' => $pcs,
            'itemName' => $itemName,
        ]);
    }
    public function storePcsApi(){
        $itemName = json_decode(file_get_contents(public_path() . "/asset/ItemName.json"), true);
        return Inertia::render('Artifacts/storePcs', [
            'itemName' =>  $itemName,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = SlugService::createSlug(Artifact::class, 'slug',$request->name);
        $artifact = Artifact::create($data);
        return Redirect::route('Artifacts.index');
    }
    public function storePcs(Request $request)
    {
            $data = $request->all();
            $art = Pcs::create($data);
        return Redirect::route('getPcsApi', $art->setId);
        // $arrayRarity=[];
        // foreach($request->rarity as $rarity){
        //     $arrayRarity[] = $rarity;
        // }
        // foreach($arrayRarity as $data){
        //    $art = Pcs::create([
        //         'artifact_id' => $request->artifact_id,
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'icon' => $request->icon,
        //         'rarity' => $data,
        //         'relictype' => $request->relictype,
        //     ]);
        // }
        // if($request->relictype == 'Circlet of Logos'){
        //     return Redirect::back();
        // } elseif($request->relictype == 'Flower of Life'){
        //     return Redirect::back();
        // } elseif($request->relictype == 'Goblet of Eonothem'){
        //     return Redirect::back();
        // } elseif($request->relictype == 'Plume of Death'){
        //     return Redirect::back();
        // } else {
        //     return Redirect::route('Artifacts.index');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function show(Artifact $artifact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function edit(Artifact $artifact, $id)
    {
        $artifact = Artifact::find($id);    
        return Inertia::render('Artifacts/edit',[
            'artifact' => $artifact,
            'arts' => Art::with('artifact')->get(),
        ]);
    }

    public function editArt(Pcs $pcs)
    {
        return Inertia::render('Artifacts/editArt',[
            'art' => $art,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artifact = Artifact::find($id);
        $img1 = $artifact->icon;
        if ($request->file('icon')) {
            File::delete(public_path('storage/images/icon/artifact'.$artifact->icon));
               $img1 = $request->icon->hashName();
                $request->icon->storeAs('images/icon/artifact', $img1);
            }
        $artifact->update([
            'art_id' => $request->art_id,
            'name' => $request->name,
            'slug' => null,
            'icon' => $img1,
            'type' => $request->type,
            'rarity' => $request->rarity,
        ]);
        return Redirect::route('pieces');

    }

    public function updateArt(Request $request, $id)
    {
        $art = Pcs::find($id);
        $icon = $art->icon;
        if ($request->file('icon')) {
            File::delete(public_path('storage/images/icon/art'.$art->icon));
               $icon = $request->icon->hashName();
                $request->icon->storeAs('images/icon/art', $icon);
            }
        $art->update([
            'name' => $request->name,
            'slug' => null,
            'icon' => $icon,
            'set_effect1' => $request->set_effect1,
            'set_effect2' => $request->set_effect2,
            'rarity' => $request->rarity,
        ]);
        return Redirect::route('Artifacts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artifact  $artifact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artifact = Artifact::find($id);
        $artifact->delete();
        return Redirect::route('Artifacts.index');

    }
}
