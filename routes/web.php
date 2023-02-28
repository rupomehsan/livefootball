<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix("installation")->group(function () {
    Route::view('/', 'installation.installer');
    Route::post('/env-update', [\App\Http\Controllers\InstallerController::class, "envUpdate"]);
    Route::post('/db-check', [\App\Http\Controllers\InstallerController::class, "dbCheck"]);
    Route::post('/finished', [\App\Http\Controllers\InstallerController::class, "finished"]);
    Route::post('/license-checker', [\App\Http\Controllers\InstallerController::class, "licenseChecker"]);
});
Route::group(['middleware' => 'installationCheck'], function () {
    Route::prefix('admin')->group(function () {
        Route::view('dashboard', 'admin.dashboard.index');
        /** category management
         **/
        Route::view('category', 'admin.category.index');
        Route::view('category/create', 'admin.category.create');
        Route::view('category/edit/{id}', 'admin.category.edit');
        /** subscription management
         **/
        Route::view('subscription', 'admin.subscription.index');
        /** Weather api management
         **/
        Route::view('weather-api', 'admin.weatherApi.create');
        /** quotes management
         **/
        Route::view('profile', 'admin.profile.index');
        /** point table
         **/
        Route::view('point-table', 'admin.pointTable.index');
//        Route::view('quotes/create', 'admin.quotes.create');
//        Route::view('quotes/edit/{id}', 'admin.quotes.edit');
        /** team management
         **/
        Route::view('team', 'admin.team.index');
        Route::view('team/create', 'admin.team.create');
        Route::view('team/edit/{id}', 'admin.team.edit');
        /** series management
         **/
        Route::view('tournament', 'admin.tournament.index');
        Route::view('tournament/create', 'admin.tournament.create');
        Route::view('tournament/group/{id}', 'admin.tournament.group');
        Route::view('tournament/schedule/{id}', 'admin.tournament.schedule');
        Route::view('tournament/schedule/create/{id}', 'admin.tournament.add-schedule');
        Route::view('group/team/update/{id}', 'admin.tournament.group-team-update');
        Route::view('tournament/schedule/edit/{tr}/{id}', 'admin.tournament.edit-schedule');
        /** update match link
         **/
        Route::view('match/link/edit/{id}', 'admin.tournament.edit-match-link');
        Route::view('match/link/update/{id}', 'admin.tournament.update-match-link');
        Route::view('match/woninfo/update/{id}', 'admin.tournament.update-won-info');
        /** administration management
         **/
        Route::view('manage-admin', 'admin.administration.index');
        Route::view('manage-admin/create', 'admin.administration.create');
        Route::view('manage-admin/profile', 'admin.administration.profile');
        Route::view('manage-admin/change-password', 'admin.administration.change_password');
        Route::view('manage-admin/edit/{id}', 'admin.administration.edit');
        /** advertisement management
         **/
//    Route::view('advertisement', 'admin.advertisement.create');
        Route::get('advertisement', [\App\Http\Controllers\Api\AdvertisementController::class, "webAd"]);
        /** Notification management
         **/
        Route::view('notification', 'admin.notification.index');
        Route::view('notification/create', 'admin.notification.create');
        Route::view('notification/manage-notification', 'admin.notification.manage_notification');
        /** settings management
         **/
        Route::view('setting', 'admin.settings.create');
        /** Smtp management
         **/
        Route::view('smtp', 'admin.smtp.create');
    });
});
Route::view('login', 'admin.auth.login');
Route::view('forgot-password', 'admin.auth.forgot_password');
/** Landing route
 **/

Route::view('/', 'landing.home.index');
Route::view('/fixtures', 'landing.fixture.index');
Route::view('/fixture/details/{id}', 'landing.fixture.details');
Route::view('/live', 'landing.live.index');
Route::view('/highlights', 'landing.highlights.index');
Route::view('/point-table', 'landing.point-table.index');
Route::view('/live-details/{id}', 'landing.live-details.index');
Route::view('/team/{id}', 'landing.team.index');
Route::view('/upcoming-match/{id}', 'landing.upcoming-match.index');
Route::view('/point-table-details/{id}', 'landing.point-table.details');
Route::view('/favourite', 'landing.favorite.index');
Route::view('/page/{name}', 'landing.page.index');
