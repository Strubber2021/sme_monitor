<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Bukkhon\BukkhonAd1Controller;
use App\Http\Controllers\Bukkhon\BukkhonAd2Controller;
use App\Http\Controllers\Bukkhon\BukkhonAd3Controller;
use App\Http\Controllers\Bukkhon\BukkhonCompanyLogoController;
use App\Http\Controllers\Bukkhon\BukkhonController;
use App\Http\Controllers\Bukkhon\BukkhonCounterDownloadController;
use App\Http\Controllers\Bukkhon\BukkhonVdo1Controller;
use App\Http\Controllers\FindChang\FindChangAd1Controller;
use App\Http\Controllers\FindChang\FindChangAd2Controller;
use App\Http\Controllers\FindChang\FindChangAd3Controller;
use App\Http\Controllers\FindChang\FindChangCompanyLogoController;
use App\Http\Controllers\FindChang\FindChangController;
use App\Http\Controllers\FindChang\FindChangCounterDownloadController;
use App\Http\Controllers\FindChang\FindChangCounterReviewController;
use App\Http\Controllers\FindChang\FindChangVdo1Controller;
use App\Http\Controllers\FindChang\FindChangVdo2Controller;
use App\Http\Controllers\Jobth\JobthAd1Controller;
use App\Http\Controllers\Jobth\JobthAd2Controller;
use App\Http\Controllers\Jobth\JobthAd4Controller;
use App\Http\Controllers\Jobth\JobthController;
use App\Http\Controllers\Jobth\JobthTopCompanyController;
use App\Http\Controllers\Ninechang\NinechangAd1Controller;
use App\Http\Controllers\Ninechang\NinechangAd2Controller;
use App\Http\Controllers\Ninechang\NinechangAd3Controller;
use App\Http\Controllers\Ninechang\NinechangCompanyLogoController;
use App\Http\Controllers\Ninechang\NinechangController;
use App\Http\Controllers\Ninechang\NinechangCounterDownloadController;
use App\Http\Controllers\Ninechang\NinechangVdo1Controller;
use App\Http\Controllers\Ninechang\NinechangVdo2Controller;
use App\Http\Controllers\SmeThai\SmeThaiCompanyLogoController;
use App\Http\Controllers\SmeThai\SmeThaiController;
use App\Http\Controllers\SmeThai\SmeThaiCounterDownloadController;
use App\Http\Controllers\SmeThai\SmeThaiCounterViewController;
use App\Http\Controllers\testController;
use App\Http\Controllers\WebApi\SME\AuthController;
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

Route::get('/', function () {
    return view('log-in-register');
});

Route::get('/login', function () {
    return view('log-in-register');
});

Route::get('/test', [testController::class, 'index']);

//----------------------------------------------------------------------------------------------------------------------
Route::get('/ninechang', [NinechangController::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/ads/1', [NinechangAd1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/ads/2', [NinechangAd2Controller::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/ads/3', [NinechangAd3Controller::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/vdo/1', [NinechangVdo1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/vdo/2', [NinechangVdo2Controller::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/company/logo', [NinechangCompanyLogoController::class, 'index'])->middleware('chkLogin');
Route::get('/ninechang/counter/download', [NinechangCounterDownloadController::class, 'index'])->middleware('chkLogin');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/bukkhon', [BukkhonController::class, 'index'])->middleware('chkLogin');
Route::get('/bukkhon/ads/1', [BukkhonAd1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/bukkhon/ads/2', [BukkhonAd2Controller::class, 'index'])->middleware('chkLogin');
Route::get('/bukkhon/ads/3', [BukkhonAd3Controller::class, 'index'])->middleware('chkLogin');
Route::get('/bukkhon/vdo/1', [BukkhonVdo1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/bukkhon/company/logo', [BukkhonCompanyLogoController::class, 'index'])->middleware('chkLogin');
Route::get('/bukkhon/counter/download', [BukkhonCounterDownloadController::class, 'index'])->middleware('chkLogin');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/smethai', [SmeThaiController::class, 'index'])->middleware('chkLogin');
Route::get('/smethai/counter/view', [SmeThaiCounterViewController::class, 'index'])->middleware('chkLogin');
Route::get('/smethai/counter/download', [SmeThaiCounterDownloadController::class, 'index'])->middleware('chkLogin');
Route::get('/smethai/company/logo', [SmeThaiCompanyLogoController::class, 'index'])->middleware('chkLogin');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/jobth', [JobthController::class, 'index'])->middleware('chkLogin');
Route::get('/jobth/ads/1', [JobthAd1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/jobth/ads/2', [JobthAd2Controller::class, 'index'])->middleware('chkLogin');
Route::get('/jobth/ads/4', [JobthAd4Controller::class, 'index'])->middleware('chkLogin');
Route::get('/jobth/top/company', [JobthTopCompanyController::class, 'index'])->middleware('chkLogin');
//----------------------------------------------------------------------------------------------------------------------
Route::get('/findchang', [FindChangController::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/ads/1', [FindChangAd1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/ads/2', [FindchangAd2Controller::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/ads/3', [FindchangAd3Controller::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/vdo/1', [FindChangVdo1Controller::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/vdo/2', [FindChangVdo2Controller::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/company/logo', [FindchangCompanyLogoController::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/counter/download', [FindChangCounterDownloadController::class, 'index'])->middleware('chkLogin');
Route::get('/findchang/counter/review', [FindChangCounterReviewController::class, 'index'])->middleware('chkLogin');



Route::get('/article', [ArticleController::class, 'index'])->middleware('chkLogin');

Route::group(['prefix' => 'backend'], function () {

    Route::get('/csrf', function () {
        return csrf_token();
    });

    Route::post('/sme/auth/login', [AuthController::class, 'login']);
    Route::post('/sme/auth/ajax_logout', [AuthController::class, 'ajax_logout'])->name('sme.auth.ajax_logout');
    
});


Route::group(['prefix' => 'ninechang'], function () {
    Route::post('/ads/1/store/img', [NinechangAd1Controller::class, 'storeImg']);
    Route::get('/ads/1/destroy/img/{imgId}/{imgName}', [NinechangAd1Controller::class, 'destroyImg']);
    
    Route::post('/ads/2/store/img', [NinechangAd2Controller::class, 'storeImg']);
    Route::get('/ads/2/destroy/img/{imgId}/{imgName}', [NinechangAd2Controller::class, 'destroyImg']);

    Route::post('/ads/3/store/img', [NinechangAd3Controller::class, 'storeImg']);
    Route::get('/ads/3/destroy/img/{imgId}/{imgName}', [NinechangAd3Controller::class, 'destroyImg']);

    Route::post('/vdo/1/create', [NinechangVdo1Controller::class, 'create']);
    Route::get('/vdo/1/destroy/{id}', [NinechangVdo1Controller::class, 'destroy']);

    Route::post('/vdo/2/create', [NinechangVdo2Controller::class, 'create']);
    Route::get('/vdo/2/destroy/{id}', [NinechangVdo2Controller::class, 'destroy']);

    Route::post('/company/logo/store/img', [NinechangCompanyLogoController::class, 'storeImg']);
    Route::get('/company/logo/destroy/img/{imgId}/{imgName}', [NinechangCompanyLogoController::class, 'destroyImg']); 

    Route::post('/counter/download/create', [NinechangCounterDownloadController::class, 'create']);
    Route::post('/counter/download/update', [NinechangCounterDownloadController::class, 'update']);
});

Route::group(['prefix' => 'bukkhon'], function () {
    Route::post('/ads/1/store/img', [BukkhonAd1Controller::class, 'storeImg']);
    Route::get('/ads/1/destroy/img/{imgId}/{imgName}', [BukkhonAd1Controller::class, 'destroyImg']);

    Route::post('/ads/2/store/img', [BukkhonAd2Controller::class, 'storeImg']);
    Route::get('/ads/2/destroy/img/{imgId}/{imgName}', [BukkhonAd2Controller::class, 'destroyImg']);

    Route::post('/ads/3/store/img', [BukkhonAd3Controller::class, 'storeImg']);
    Route::get('/ads/3/destroy/img/{imgId}/{imgName}', [BukkhonAd3Controller::class, 'destroyImg']);

    Route::post('/vdo/1/create', [BukkhonVdo1Controller::class, 'create']);
    Route::get('/vdo/1/destroy/{id}', [BukkhonVdo1Controller::class, 'destroy']);

    Route::post('/company/logo/store/img', [BukkhonCompanyLogoController::class, 'storeImg']);
    Route::get('/company/logo/destroy/img/{imgId}/{imgName}', [BukkhonCompanyLogoController::class, 'destroyImg']); 

    Route::post('/counter/download/create', [BukkhonCounterDownloadController::class, 'create']);
    Route::post('/counter/download/update', [BukkhonCounterDownloadController::class, 'update']);
});

Route::group(['prefix' => 'smethai'], function () {
    Route::post('/counter/view/create', [SmeThaiCounterViewController::class, 'create']);
    Route::post('/counter/view/update', [SmeThaiCounterViewController::class, 'update']);

    Route::post('/counter/download/create', [SmeThaiCounterDownloadController::class, 'create']);
    Route::post('/counter/download/update', [SmeThaiCounterDownloadController::class, 'update']);

    Route::post('/company/logo/store/img', [SmeThaiCompanyLogoController::class, 'storeImg']);
    Route::get('/company/logo/destroy/img/{imgId}/{imgName}', [SmeThaiCompanyLogoController::class, 'destroyImg']); 
});

Route::group(['prefix' => 'jobth'], function () {
    Route::post('/ads/1/store/img', [JobthAd1Controller::class, 'storeImg']);
    Route::get('/ads/1/destroy/img/{imgId}/{imgName}', [JobthAd1Controller::class, 'destroyImg']);
    
    Route::post('/ads/2/store/img', [JobthAd2Controller::class, 'storeImg']);
    Route::get('/ads/2/destroy/img/{imgId}/{imgName}', [JobthAd2Controller::class, 'destroyImg']);

    Route::post('/ads/3/top/company/create', [JobthTopCompanyController::class, 'create']);
    Route::get('/ads/3/top/company/change/status/{id}/{is_active}', [JobthTopCompanyController::class, 'changeStatus']);
    Route::get('/ads/3/top/company/destroy/{id}', [JobthTopCompanyController::class, 'destroy']);

    Route::post('/ads/4/store/img', [JobthAd4Controller::class, 'storeImg']);
    Route::get('/ads/4/destroy/img/{imgId}/{imgName}', [JobthAd4Controller::class, 'destroyImg']);
});


Route::group(['prefix' => 'findchang'], function () {
    Route::post('/ads/1/store/img', [FindChangAd1Controller::class, 'storeImg']);
    Route::get('/ads/1/destroy/img/{imgId}/{imgName}', [FindChangAd1Controller::class, 'destroyImg']);
    
    Route::post('/ads/2/store/img', [FindChangAd2Controller::class, 'storeImg']);
    Route::get('/ads/2/destroy/img/{imgId}/{imgName}', [FindChangAd2Controller::class, 'destroyImg']);

    Route::post('/ads/3/store/img', [FindChangAd3Controller::class, 'storeImg']);
    Route::get('/ads/3/destroy/img/{imgId}/{imgName}', [FindChangAd3Controller::class, 'destroyImg']);

    Route::post('/vdo/1/create', [FindChangVdo1Controller::class, 'create']);
    Route::get('/vdo/1/destroy/{id}', [FindChangVdo1Controller::class, 'destroy']);

    Route::post('/vdo/2/create', [FindChangVdo2Controller::class, 'create']);
    Route::get('/vdo/2/destroy/{id}', [FindChangVdo2Controller::class, 'destroy']);

    Route::post('/company/logo/store/img', [FindChangCompanyLogoController::class, 'storeImg']);
    Route::get('/company/logo/destroy/img/{imgId}/{imgName}', [FindChangCompanyLogoController::class, 'destroyImg']); 

    Route::post('/counter/download/create', [FindChangCounterDownloadController::class, 'create']);
    Route::post('/counter/download/update', [FindChangCounterDownloadController::class, 'update']);

    Route::post('/counter/review/create', [FindChangCounterReviewController::class, 'create']);
    Route::post('/counter/review/update', [FindChangCounterReviewController::class, 'update']);
});

Route::group(['prefix' => 'article'], function () {
    Route::post('/create', [ArticleController::class, 'create']);
    Route::post('/update', [ArticleController::class, 'update']);
    Route::get('/get/{id}', [ArticleController::class, 'get']);
    Route::get('/changeStatus/{id}/{is_active}', [ArticleController::class, 'changeStatus']);
    Route::get('/destroy/{id}', [ArticleController::class, 'destroy']);
});