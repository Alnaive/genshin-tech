<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\ConstellationController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::GET('/', [WelcomeController::class, 'index'])->name('welcome');
Route::GET('/u/{uid}', [WelcomeController::class, 'uid'])->name('uid');
Route::GET('/Character', [WelcomeController::class, 'character'])->name('character');
Route::POST('liked/{id}', [LikeController::class, 'like'])->name('like');
Route::POST('disliked/{id}', [LikeController::class, 'dislike'])->name('dislike');
Route::GET('my-page/', [WelcomeController::class, 'guess'])->name('guess');
Route::POST('store/build/d', [BuildController::class, 'storeBuild'])->name('storeBuild');
Route::GET('show/{slug}', [CharacterController::class, 'showCharacter'])->name('showCharacter');

Route::GET('AddBuild/{UID}', [WelcomeController::class, 'AddBuild'])->name('AddBuild');
Route::GET('addBuild/{slug}', [CharacterController::class, 'addBuild'])->name('addBuild');
Route::GET('build/{slug}/', [BuildController::class, 'seeBuild'])->name('seeBuild');
Route::GET('editBuild/{slug}', [BuildController::class, 'editBuild'])->name('editBuild');
Route::GET('b/{id}', [BuildController::class, 'showBuild'])->name('showBuild');
Route::PUT('update/Build{id}', [BuildController::class, 'updateBuild'])->name('updateBuild');
Route::PUT('update/Account/Build{id}', [BuildController::class, 'updateBuildAccount'])->name('updateBuildAccount');
Route::DELETE('delete/show/build{build}', [BuildController::class, 'destroyBuild'])->name('destroyBuild');

Route::get('sign-in/discord', [DiscordController::class, 'discord'])->name('discord');
Route::get('sign-in/discord/redirect', [DiscordController::class, 'redirect'])->name('discordRedirect');
Route::PUT('update/Build/Account/Status{id}', [BuildController::class, 'updateBuildAccount'])->name('updateBuildAccount');
Route::PUT('update/Build/Status{id}', [BuildController::class, 'updateBuildStatus'])->name('updateBuildStatus');
Route::GET('Detail/Profile/{slug}', [ProfileController::class, 'showUser'])->name('showUser');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
        // Route::GET('Dashboard', [DashboardController::class, 'index'])->name('Dashboard');
        Route::resource('Arts', ArtController::class);
        Route::resource('Artifacts', ArtifactController::class);
        Route::GET('Artifact/Pieces', [ArtifactController::class, 'pieces'])->name('pieces');
        Route::POST('add/Artifact', [ArtifactController::class, 'storePcs'])->name('storePcs');
        Route::GET('Get/CharApi', [CharacterController::class, 'getCharacterApi'])->name('getCharacterApi');
        Route::GET('Get/ConsTalent/{id}', [CharacterController::class, 'getConsTalent'])->name('getConsTalent');
        Route::GET('Get/WeaponApi', [WeaponController::class, 'getWeaponApi'])->name('getWeaponApi');
        
        Route::GET('Get/ArtApi', [ArtifactController::class, 'getArtifactApi'])->name('getArtifactApi');
        Route::GET('Get/PcsApi/{id}', [ArtifactController::class, 'getPcsApi'])->name('getPcsApi');
        Route::GET('Get/storePcsApi/', [ArtifactController::class, 'storePcsApi'])->name('storePcsApi');

        Route::GET('edit/Artifact/{art}', [ArtifactController::class, 'editArt'])->name('editArt');
        Route::PUT('update/Artifact{id}', [ArtifactController::class, 'updateArt'])->name('updateArt');
        Route::DELETE('delete/Artifact{id}', [ArtifactController::class, 'deleteArt'])->name('deleteArt');
        Route::resource('Builds', BuildController::class);
        Route::resource('Constellations', ConstellationController::class);
        Route::resource('Talents', TalentController::class);
        Route::DELETE('delete/draft/build{id}', [BuildController::class, 'destroyDraft'])->name('destroyDraft');
        Route::resource('Characters', CharacterController::class);
        Route::resource('Weapons', WeaponController::class);
        Route::GET('Account', [ProfileController::class, 'index'])->name('Account');
        Route::GET('Profile/{user}', [ProfileController::class, 'show'])->name('profileShow');
        Route::GET('Update/Profile/{id}', [ProfileController::class, 'edit'])->name('profileEdit');
        Route::PUT('Update/{user}', [ProfileController::class, 'update'])->name('profileUpdate');
        Route::PUT('update/Build/Status{id}', [BuildController::class, 'updateBuildStatus'])->name('updateBuildStatus');
        Route::PUT('Update/Characters/{id}', [UtilityController::class, 'updateCharacter'])->name('updateCharacter');
        Route::GET('Update/Characters/{id}/edit', [CharacterController::class, 'editChar'])->name('editChar');
        Route::PUT('Update/{id}/Character/Draft', [CharacterController::class, 'updateDraft'])->name('updateDraft');
        Route::PUT('Update/{id}/Character/Publish', [CharacterController::class, 'updatePublish'])->name('updatePublish');

    });
    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::inertia('/userDashboard', 'UserDashboard')->name('userDashboard');
    });
    Route::group(['middleware' => 'checkRole:guest'], function() {
        Route::inertia('/guestDashboard', 'GuestDashboard')->name('guestDashboard');
    });


});


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
