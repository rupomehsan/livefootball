<?php

use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\Auth\AdminController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SmtpController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TournamentController;
use App\Http\Controllers\FavoriteQuotesController;
use Illuminate\Support\Facades\Route;

/** Authentication management
 *
 **/
Route::prefix('v1')->group(function () {
    Route::post('auth/user/login', [LoginController::class, 'login']);
    Route::post('auth/user/register', [LoginController::class, 'register']);
    /** team  management
     *store,update,edit,show,get data,file upload,delete
     **/
    Route::get('team/get-all', [TeamController::class, 'index']);
    Route::post('team/create', [TeamController::class, 'store']);
    Route::get('team/edit/{id}', [TeamController::class, 'show']);
    Route::post('team/update/{id}', [TeamController::class, 'update']);
    Route::delete('team/delete/{id}', [TeamController::class, 'destroy']);
    Route::post('team/file-upload', [TeamController::class, 'fileUploader']);
    /** tournament  management
     *store,update,edit,show,get data,file upload,delete
     **/
    Route::get('tournament/get-all', [TournamentController::class, 'index']);
    Route::post('tournament/create', [TournamentController::class, 'store']);
    Route::get('tournament/edit/{id}', [TournamentController::class, 'show']);
    Route::post('tournament/update/{id}', [TournamentController::class, 'update']);
    Route::delete('tournament/delete/{id}', [TournamentController::class, 'destroy']);
    Route::post('tournament/file-upload', [TournamentController::class, 'fileUploader']);
    Route::post('tournament/group/create', [TournamentController::class, 'groupCreate']);
    Route::get('tournament/get-all-team-by-tournament/{id}', [TournamentController::class, 'getAllTeamByGroupAndTournamentId']);
    Route::get('tournament/get-all-team-by-group-id/{id}', [TournamentController::class, 'getAllTeamByGroupId']);
    Route::get('tournament/tournament-id-by-group-id/{id}', [TournamentController::class, 'getTournamentId']);
    Route::post('tournament/group/team/update/{id}', [TournamentController::class, 'tournamentTeamUpdate']);
    Route::get('tournament/get-all-group-by-tournament-id/{id}', [TournamentController::class, 'getAllGroupByTournamentId']);
    Route::get('tournament/get-all-team-by-group-and-tournament-id/{id}', [TournamentController::class,'getAlltEAMByTournamentAndGroupId']);
    Route::post('tournament/schedule/create/{id}', [TournamentController::class, 'scheduleCreate']);
    Route::get('tournament/get-schedule-by-tournament-id/{id}', [TournamentController::class, 'getAllScheduleByTournamentId']);
    Route::get('tournament/get-all-upcoming-match', [TournamentController::class, 'getAllSchedule']);
    Route::get('tournament/get-all-previous-match', [TournamentController::class, 'getPreviousMatch']);
    Route::get('tournament/schedule/show/{id}', [TournamentController::class, 'getScheduleById']);
    Route::get('tournament/get-match-schedule-by-id/{id}', [TournamentController::class, 'getSingleMatchInfoById']);
    Route::get('tournament/get-schedule-by-id/{id}', [TournamentController::class, 'getSingleScheduleById']);
    Route::post('tournament/schedule/update/{id}', [TournamentController::class, 'scheduleUpdate']);
    Route::delete('tournament/schedule/delete/{id}', [TournamentController::class, 'scheduleDestroy']);
    Route::delete('tournament/group/team/delete/{id}', [TournamentController::class, 'groupTeamDestroy']);
    Route::get('tournament/get-match-schedule/{id}', [TournamentController::class, 'getMatchSchedule']);
    Route::post('tournament/match-link/create/{id}', [\App\Http\Controllers\Api\MatchInfoController::class, 'matchLinkCreate']);
    Route::post('tournament/match-link/update/{id}', [\App\Http\Controllers\Api\MatchInfoController::class, 'matchLinkUpdate']);
    Route::get('tournament/get-match-information/{id}', [\App\Http\Controllers\Api\MatchInfoController::class, 'getMatchInformation']);
    Route::post('tournament/match-woninfo/update/{id}', [\App\Http\Controllers\Api\MatchInfoController::class, 'matchInformationUpdate']);

    /** point Tbale  management
     *store,update,edit,show
     **/
    Route::get('get-point-table-data-by-tournament-team-id', [TournamentController::class, "getPointTableByTeamId"]);
    Route::post('point-table-create', [TournamentController::class, "createPointTable"]);
    Route::post('update-set-point-table', [TournamentController::class, "updatePointTable"]);
    Route::get('get-point-table-tournament-id/{id}', [TournamentController::class, "getPointTableByTournamentId"]);

    /** admin  management
     *store,update,edit,show
     **/
    Route::post('manage-admin/store', [AdminController::class, 'store']);
    Route::get('manage-admin/show/{id}', [AdminController::class, 'show']);
    Route::patch('manage-admin/update/{id}', [AdminController::class, 'update']);
    Route::get('manage-admin/get-admin', [AdminController::class, 'allAdmin']);
    Route::get('manage-admin/get-super-admin', [AdminController::class, 'allSuperAdmin']);
    Route::delete('manage-admin/delete/{id}', [AdminController::class, 'destroy']);
    Route::patch('manage-admin/profile/update', [AdminController::class, 'updateProfile']);
    Route::patch('manage-admin/profile/change-password', [AdminController::class, 'profileChangePassword']);
    Route::post('manage-admin/search-data', [AdminController::class, 'searchAdmin']);
    Route::post('admin/file-upload', [AdminController::class, 'fileUploader']);
    Route::get('admin/fetch-me/{id}', [AdminController::class, 'fetchMe']);
    /** notification  management
     *store,update,edit,show
     **/
    Route::post('manage-notification/store', [NotificationController::class, 'store']);
    Route::get('manage-notification/show', [NotificationController::class, 'show']);
    Route::get('notification/get-all', [NotificationController::class, 'getAll']);
    Route::delete('notification/delete/{id}', [NotificationController::class, 'destroy']);
    Route::post('notification/send-notification', [NotificationController::class, 'sendNotification']);
    Route::post('notification/file-upload', [NotificationController::class, 'fileUploader']);
    /** setting  management
     *store,update,edit,show
     **/
    Route::post('setting/store', [SettingsController::class, 'store']);
    Route::get('setting/show', [SettingsController::class, 'show']);
    Route::post('setting/file-upload', [SettingsController::class, 'fileUploader']);
    /** Smtp  management
     *store,update,edit,show
     **/
    Route::post('smtp/store', [SmtpController::class, 'store']);
    Route::get('smtp/show', [SmtpController::class, 'show']);
    /** User Recoveery password  management
     *store,update,edit,show
     **/
    Route::prefix('auth')->group(function () {
        Route::post('user/forgot-password', [ResetPasswordController::class, "forgotPassword"]);
        Route::post('user/user-verify', [ResetPasswordController::class, "UserVerify"]);
        Route::post('user/resend-code', [ResetPasswordController::class, "resendCode"]);
        Route::post('user/change-password', [ResetPasswordController::class, "changePassword"]);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix("auth/user")->group(function () {
            Route::get('/profile', [AdminController::class, "profile"]);
            Route::patch('/profile/update', [AdminController::class, "updateProfile"]);
            Route::patch('/update-password', [AdminController::class, "profileChangePassword"]);
        });
    });

    /** Advertisement   management
     *store,update
     **/
    Route::post('advertisement/webAdUpdate', [AdvertisementController::class, 'webAdUpdate']);
    Route::post('advertisement/file-upload', [AdvertisementController::class, 'fileUploader']);;

    /** dashboard
     *get,
     **/
    Route::get('get-all-today-match', [DashboardController::class, "getTodayMatch"]);

    /** advertisement **/
    Route::get('advertisement/get-all', [AdvertisementController::class, 'webAdvertisement']);
    /** about us  **/
    Route::get('setting/get', [SettingsController::class, 'getSettings']);
    /** Favorite **/

    Route::post('add-to-favourite-list', [FavoriteQuotesController::class, "store"]);
    Route::get('get-all-favourite-match', [FavoriteQuotesController::class, "favoriteList"]);

    /** User login signup  management
     *
     **/
    Route::post('user/login', [LoginController::class, "userLogin"]);
    Route::post('user/signup', [LoginController::class, "userSignup"]);


});
