<?php

namespace App\Http\Controllers;

use App\Models\BuildLike;
use App\Models\Build;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;
use Stevebauman\Location\Facades\Location;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function like($id)
    {
        $build = Build::find($id);
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $build->like($ipAddress); // pass in your own user id
        // if ($build->isLiked()) {
        //     $build->removeLike();

        // } elseif (auth()->user()) {
        //     $build->likes()->create([
        //         'build_id' =>$build,
        //         'user_id' => auth()->id(),
        //         'country' => Location::get('ip_address')->countryName,
        //     ]);

        // } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
        //     $build->likes()->create([
        //         'build_id' => $build,
        //         'ip' => $ip,
        //         'country' => Location::get('ip_address')->countryName,
        //         'user_agent' => $userAgent,
        //     ]);
        // }
        return redirect()->back();
    }
    public function dislike($id){
        $build = Build::find($id);
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $build->unlike($ipAddress); 
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
