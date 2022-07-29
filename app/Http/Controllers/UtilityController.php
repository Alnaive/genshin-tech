<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use File;
use Inertia\Inertia;
use Redirect;
class UtilityController extends Controller
{
    public function updateCharacter(Request $request, $id)
    {
        $character = Character::find($id);
        $img4 = $character->avatar;
        if ($request->file('avatar')) {
            File::delete(public_path('storage/images/icon/avatar/'.$character->avatar));
                $img4 = $request->avatar->hashName();
                $request->avatar->storeAs('images/icon/avatar/', $img4);
            }
        $character->update([ 
            'name' => $request->name,
            'slug' => null,
            'rarity' => $request->rarity,
            'element' => $request->element,
            'weapontype' => $request->weapontype,
            'icon' => $request->icon,
            'avatar' => $img4,
            'status' => $request->status,
        ]);
        return Redirect::route('Characters.index');
    }
}
