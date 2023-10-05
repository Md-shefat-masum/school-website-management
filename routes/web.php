<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require_once "frontend_routes.php";

Route::get('/tuser', function () {
    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . request()->cookie("AXRF-TOKEN"),
    ])->get('http://127.0.0.1:8000/api/user');

    dd($response->json());
})->middleware('check_token');

Route::get('/tu', function () {
    $user = User::find(2);
    $token = $user->createToken('access-token');
    return redirect('/')->withCookie(set_token_coockie($token->accessToken));
});

Route::controller(\App\Http\Controllers\WebsiteController::class)
    ->prefix('/user')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/t1', 'index');
    });

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('dashboard')
    ->middleware('check_token');

Route::post('/login', function () {
    $user = User::where('email',request()->email)->first();
    auth()->login($user);
    DB::table('oauth_access_tokens')->where('user_id', $user->id)->update([
        'revoked' => 1,
    ]);
    $token = $user->createToken('access-token');
    return response()
        ->json(["user" => $user, "token" => $token])
        ->withCookie(set_token_coockie($token->accessToken));
})->name('login');

Route::post('/api-logout', function () {
    auth()->logout();
});


Route::get('/data-reload', function () {
    \Illuminate\Support\Facades\Artisan::call('db:wipe');
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--path' => 'database/migrations/', '--force' => true]);
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--path' => 'database/migrations/*', '--force' => true]);
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--path' => 'vendor/laravel/passport/database/migrations', '--force' => true]);
    // \Illuminate\Support\Facades\Artisan::call('passport:install');
    \Illuminate\Support\Facades\Artisan::call('db:seed');
    return redirect()->back();
});
