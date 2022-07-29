<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use inertia\inertia;
use App\Models\User;
use App\Models\Build;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return Inertia::render('Profile/index', [
            'users' => $users,
        ]);
    }

    public function show(User $user){
        return Inertia::render('Profile/show', [
            'user' => $user,
        ]);
    }

    public function showUser($slug){
        $user = User::withCount('build')->where('slug', $slug)->first();

        $query = Build::with('character','weapon','set4','set2')->whereHas('character', function($q){
            if(request('search')){
                $q->where('char_name', 'LIKE', '%'.request('search').'%');
            }
        });
        return Inertia::render('Profile/showUser', [
            'user' => $user,
            'filters' => Request::all('search'),
            'builds' => $query->latest()->paginate(10)->withQueryString(),
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        return Inertia::render('Profile/edit', [
            'user' => $user,
        ]);
    }

    public function update( User $user, Request $request){
        
            $user->update([ 
                'name' => $request->name,
                'image' => $request->image,
            ]);
        
        return Redirect::route('profile');
    
    }

}
