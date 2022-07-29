<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth; use Hash; use Str;
class DiscordController extends Controller
{
    public function discord()
    {
        return Socialite::driver('discord')->setScopes(['identify'])->redirect();
        // return Socialite::driver('discord')->setScopes(['identify'])->with(["prompt" => "none"])->redirect();
    }

    public function redirect()
    {
        $user = Socialite::driver('discord')->user();
        // $user = User::firstOrCreate([
        //     $token = $user->token

        // ], [
        //     'name' => $user->name,
        //     'discord_id' => $user->id,
        //     'avatar' => $user->avatar,
        //             'password' => Hash::make(Str::random(24))
        // ]);

        // Auth::login($user, true);
        // return redirect('/');

        try {
    
            $user = Socialite::driver('discord')->user();
            $isUser = User::where('discord_id', $user->id)->first();
            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'slug' => Str::slug($request->name).'@'.Str::lower(Str::random(6)),
                    'discord_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => Hash::make(Str::random(24))
                ]);
    
                Auth::login($createUser, true);
                return redirect('/');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
