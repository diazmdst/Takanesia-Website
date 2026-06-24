<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

use App\Http\Controllers\MasterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [BerandaController::class, 'beranda'])->name('HalamanBeranda');
Route::get('/about', [BerandaController::class, 'about'])->name('HalamanAbout');
Route::get('/media', [BerandaController::class, 'media'])->name('HalamanMedia');
Route::get('/member', [BerandaController::class, 'member'])->name('HalamanMember');
Route::get('/discography', [BerandaController::class, 'discography'])->name('HalamanDiscography');
Route::get('/detail-media/{id}', [BerandaController::class, 'detailmedia'])->name('HalamanDMedia/{id}');
Route::get('/detail-disco/{id}', [BerandaController::class, 'detaildisco'])->name('HalamanDDisco/{id}');
Route::get('/admin', [MasterController::class, 'halamanlogin'])->name('HalamanLogin');
Route::post('/login', [MasterController::class, 'login'])->name('login');
Route::post('/logout', [MasterController::class, 'user_logout'])->name('Logout');
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('dashboard', [MasterController::class, 'dashboard'])->name('HalamanDashboard');
    Route::get('admin_about', [MasterController::class, 'admin_about'])->name('HalamanAdminAbout');
    Route::post('/edit_about/{id}', [MasterController::class, 'edit_about'])->name('Edit_About');
    Route::delete('/about/{about}', [MasterController::class, 'destroy'])->name('About.destroy');
    // Route::get('dashboard', [MasterController::class, 'dashboard'])->name('HalamanDashboard');
    Route::get('admin_kategori', [MasterController::class, 'admin_kategori'])->name('HalamanAdminKategori');
    Route::post('/tambah_kategori', [MasterController::class, 'tambah_kategori'])->name('Tambah_Kategori');
    Route::post('/edit_kategori/{id}', [MasterController::class, 'edit_kategori'])->name('Edit_Kategori');
    Route::delete('/kategori/{kategori}', [MasterController::class, 'kategori_destroy'])->name('kategori.destroy');

    Route::get('admin_kategori_disco', [MasterController::class, 'admin_kategori_disco'])->name('HalamanAdminKategori_disco');
    Route::post('/tambah_kategori_disco', [MasterController::class, 'tambah_kategori_disco'])->name('Tambah_Kategori_disco');
    Route::post('/edit_kategori_disco/{id}', [MasterController::class, 'edit_kategori_disco'])->name('Edit_Kategori_disco');
    Route::delete('/kategori_disco/{kategori_disco}', [MasterController::class, 'kategori_disco_destroy'])->name('Kategori_disco.destroy');

    Route::get('admin_color_setting', [MasterController::class, 'admin_color_setting'])->name('HalamanAdminColor_setting');
    Route::post('/tambah_color_setting', [MasterController::class, 'tambah_color_setting'])->name('Tambah_Color_setting');
    Route::post('/edit_color_setting/{id}', [MasterController::class, 'edit_color_setting'])->name('Edit_Color_setting');
    Route::delete('/color_setting/{color_setting}', [MasterController::class, 'color_setting_destroy'])->name('Color_setting.destroy');

    Route::get('admin_media', [MasterController::class, 'admin_media'])->name('HalamanAdminmedia');
    Route::post('/tambah_media', [MasterController::class, 'tambah_media'])->name('Tambah_Media');
    Route::post('/edit_media/{id}', [MasterController::class, 'edit_media'])->name('Edit_Media');
    Route::delete('/media/{media}', [MasterController::class, 'media_destroy'])->name('Media.destroy');
    Route::delete('/item/detail-picture/{id}', [MasterController::class, 'deletePicture']);

    // admin_member
    Route::get('admin_member', [MasterController::class, 'admin_member'])->name('HalamanAdminmember');
    Route::post('/tambah_member', [MasterController::class, 'tambah_member'])->name('Tambah_Member');
    Route::post('/edit_member/{id}', [MasterController::class, 'edit_member'])->name('Edit_Member');
    Route::delete('/member/{member}', [MasterController::class, 'member_destroy'])->name('Member.destroy');
    Route::delete('/member/detail-picture/{id}', [MasterController::class, 'deletePictureMember']);

    //admin_discography
    Route::get('admin_disco', [MasterController::class, 'admin_disco'])->name('HalamanAdmindisco');
    Route::post('/tambah_disco', [MasterController::class, 'tambah_disco'])->name('Tambah_disco');
    Route::post('/edit_disco/{id}', [MasterController::class, 'edit_disco'])->name('Edit_disco');
    Route::delete('/disco/{disco}', [MasterController::class, 'disco_destroy'])->name('Disco.destroy');
});
