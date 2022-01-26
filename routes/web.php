<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\adsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\districtController;
use App\Http\Controllers\Backend\galleryController;
use App\Http\Controllers\Backend\postController;
use App\Http\Controllers\Backend\roleController;
use App\Http\Controllers\Backend\settingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\subdistrictController;
use App\Http\Controllers\Backend\websiteController;
use App\Http\Controllers\Backend\websiteSettingController;
use App\Http\Controllers\Frontend\extraController;
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
    return view('main.index');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// admin Logout
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//  Categories all Routes
Route::get('/category', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::put('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

//  SubCategories all Routes
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('admin.subcategories');
Route::get('/subcategory/add', [SubCategoryController::class, 'addSubCategory'])->name('add.subcategory');
Route::post('/subcategory/store', [SubCategoryController::class, 'storesubCategory'])->name('store.subcategory');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.subcategory');
Route::put('/subcategory/update/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update.subcategory');
Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.subcategory');

//  District all Routes
Route::get('/district', [districtController::class, 'index'])->name('admin.district');
Route::get('/district/add', [districtController::class, 'addDistrict'])->name('add.district');
Route::post('/district/store', [districtController::class, 'storeDistrict'])->name('store.district');
Route::get('/district/edit/{id}', [districtController::class, 'editDistrict'])->name('edit.district');
Route::put('/district/update/{id}', [districtController::class, 'updateDistrict'])->name('update.district');
Route::get('/district/delete/{id}', [districtController::class, 'deleteDistrict'])->name('delete.district');

//  SubDistrict all Routes
Route::get('/subdistrict', [subdistrictController::class, 'index'])->name('admin.subdistrict');
Route::get('/subdistrict/add', [subdistrictController::class, 'addSubDistrict'])->name('add.subdistrict');
Route::post('/subdistrict/store', [subdistrictController::class, 'storeSubDistrict'])->name('store.subdistrict');
Route::get('/subdistrict/edit/{id}', [subdistrictController::class, 'editSubDistrict'])->name('edit.subdistrict');
Route::put('/subdistrict/update/{id}', [subdistrictController::class, 'updateSubDistrict'])->name('update.subdistrict');
Route::get('/subdistrict/delete/{id}', [subdistrictController::class, 'deleteSubDistrict'])->name('delete.subdistrict');

//  Json Data For Category and District
Route::get('/get/subcategory/{category_id}', [postController::class, 'getSubCategory']);
Route::get('/get/subdistrict/{district_id}', [postController::class, 'getSubDistrict']);

//  Posts all Routes
Route::get('/posts/create', [postController::class, 'create'])->name('create.post');
Route::post('/posts/store', [postController::class, 'store'])->name('store.post');
Route::get('/posts', [postController::class, 'index'])->name('index.post');
Route::get('/posts/edit/{id}', [postController::class, 'editPost'])->name('edit.post');
Route::put('/posts/update/{id}', [postController::class, 'updatePost'])->name('update.post');
Route::get('/posts/delete/{id}', [postController::class, 'deletePost'])->name('delete.post');

//   Setting all Routes
// Social Update Setting
Route::get('/socials/setting', [settingController::class, 'socialSetting'])->name('social.setting');
Route::put('/socials/update/{id}', [settingController::class, 'updateSocials'])->name('update.socials');
// Seos Update Setting
Route::get('/seos/setting', [settingController::class, 'seosSetting'])->name('seo.setting');
Route::put('/seos/update/{id}', [settingController::class, 'updateSeos'])->name('update.seos');
// prayer Update Setting
Route::get('/prayers/setting', [settingController::class, 'prayerSetting'])->name('prayer.setting');
Route::put('/prayers/update/{id}', [settingController::class, 'updateprayers'])->name('update.prayers');
// Live Tv Update Setting
Route::get('/livetvs/setting', [settingController::class, 'livetvSetting'])->name('livetv.setting');
Route::put('/livetvs/update/{id}', [settingController::class, 'updatelivetvs'])->name('update.livetv');
Route::get('/livetvs/active/{id}', [settingController::class, 'Activelivetv'])->name('active.livetv');
Route::get('/livetvs/deactive/{id}', [settingController::class, 'deActivelivetv'])->name('deactive.livetv');
// Notices Update Setting
Route::get('/notices/setting', [settingController::class, 'noticeSetting'])->name('notice.setting');
Route::put('/notices/update/{id}', [settingController::class, 'updateNotices'])->name('update.notice');
Route::get('/notices/active/{id}', [settingController::class, 'ActiveNotice'])->name('active.notice');
Route::get('/notices/deactive/{id}', [settingController::class, 'deActiveNotice'])->name('deactive.notice');

//   Websites all Routes
Route::get('/websites/add', [websiteController::class, 'addWebsite'])->name('add.website');
Route::post('/websites/store', [websiteController::class, 'storeWebsite'])->name('store.website');
Route::get('/websites', [websiteController::class, 'index'])->name('website.index');
Route::get('/websites/edit/{id}', [websiteController::class, 'edit'])->name('website.edit');
Route::put('/websites/update/{id}', [websiteController::class, 'update'])->name('website.update');
Route::get('/websites/delete/{id}', [websiteController::class, 'delete'])->name('website.delete');

//   Gallory all Routes
//   Photo Gallory
Route::get('/gallery/photo', [galleryController::class, 'photoGallery'])->name('photo.gallery');
Route::get('/gallery/photo/add', [galleryController::class, 'addPhoto'])->name('add.photo');
Route::post('/gallery/photo/store', [galleryController::class, 'storePhoto'])->name('store.photo');
Route::get('/gallery/photo/edit/{id}', [galleryController::class, 'editPhoto'])->name('edit.photo');
Route::put('/gallery/photo/update/{id}', [galleryController::class, 'updatePhoto'])->name('update.photo');
Route::get('/gallery/photo/delete/{id}', [galleryController::class, 'deletePhoto'])->name('delete.photo');

//   video Gallory
Route::get('/gallery/video', [galleryController::class, 'videoGallery'])->name('video.gallery');
Route::get('/gallery/video/add', [galleryController::class, 'addvideo'])->name('add.video');
Route::post('/gallery/video/store', [galleryController::class, 'storevideo'])->name('store.video');
Route::get('/gallery/video/edit/{id}', [galleryController::class, 'editVideo'])->name('edit.video');
Route::put('/gallery/video/update/{id}', [galleryController::class, 'updateVideo'])->name('update.video');
Route::get('/gallery/video/delete/{id}', [galleryController::class, 'deleteVideo'])->name('delete.video');

// Frontend

// Multi Langusage
Route::get('/lang/english', [extraController::class, 'english'])->name('lang.english');
Route::get('/lang/arabic', [extraController::class, 'arabic'])->name('lang.arabic');

// Post Single
Route::get('/post/Single/{id}', [extraController::class, 'postSingle'])->name('post.single');

// all posts category
Route::get('/category/{id}/{category_en}', [extraController::class, 'all_post'])->name('all_post');
Route::get('/subcategory/{id}/{subcategory_en}', [extraController::class, 'all_postsub'])->name('all_postsub');

// Search By District
Route::get('/get/subdistrict/frontend/{district_id}', [extraController::class, 'getSubDistrictFrontend']);
Route::get('/search/district', [extraController::class, 'searchDistrict'])->name('searchDistrict');

// Advretisement Routes
Route::get('/Advretisement/list', [adsController::class, 'ad_list'])->name('ads_list');
Route::get('/Advretisement/add', [adsController::class, 'ad_add'])->name('add.ads');
Route::post('/Advretisement/store', [adsController::class, 'storeAds'])->name('storeAds');
Route::get('/Advretisement/edit/{id}', [adsController::class, 'editAds'])->name('edit.ads');
Route::put('/Advretisement/update/{id}', [adsController::class, 'updateAds'])->name('update.ads');
Route::get('/Advretisement/delete/{id}', [adsController::class, 'deleteAds'])->name('delete.ad');

// Writer Roles Route delete.writer
Route::get('/Writer/list', [roleController::class, 'listWriter'])->name('list.writer');
Route::get('/Writer/add', [roleController::class, 'addWriter'])->name('add.writer');
Route::post('/Writer/store', [roleController::class, 'storeWriter'])->name('store.writer');
Route::get('/Writer/edit/{id}', [roleController::class, 'editWriter'])->name('edit.writer');
Route::put('/Writer/update/{id}', [roleController::class, 'updateWriter'])->name('update.writer');
Route::get('/Writer/delete/{id}', [roleController::class, 'deleteWriter'])->name('delete.writer');

// all website setting Route
Route::get('/website/setting', [websiteSettingController::class, 'mainWebsetting'])->name('website.setting');
Route::put('/website/update/{id}', [websiteSettingController::class, 'mainWebUpdate'])->name('website.update');

// Account Setting Route
Route::get('/account/setting', [AdminController::class, 'accountSetting'])->name('account.setting');
Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('edit.profile');
Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('update.profile');
