<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HolidayController,
    RoleController,
    TaskController,
    TrashController,
    UserController,
    SalaryController,
    HomeController,
    MechineController,
    OvertimeController,
    PresenceController,
    PresenceConfigController,
    PresenceLogController,
    PaidLeaveController,
    GeneratePaidLeaveController,
    DepartementController,
    GenerateOvertimeController,
    KategoriController,
    PertanyaanController,
    SekolahController,
    SurveiController
};
use App\Http\Controllers\Auth\RegisterController;

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
    return view('first');
})->name('/');
Route::resource('survey', SurveiController::class);
Route::post('register.store', [RegisterController::class, 'store'])->name('register.store');
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home',                                 [HomeController::class, 'index'])->name('home');
    Route::patch('/users/reset/{id?}',                  [UserController::class, 'reset'])->name('users.reset');
    Route::resource('roles',                            RoleController::class);
    Route::get('trashs/{id}',                           [TrashController::class, 'listTrash'])->name('list.trashs');
    Route::get('trashs/kategori/restore/{id?}',       [TrashController::class,'restoreKategori'])->name('trashs.kategori.restore');
    Route::delete('trashs/kategori/delete/{id?}',     [TrashController::class,'deleteKategori'])->name('trashs.kategori.delete');
    Route::get('trashs/pertanyaan/restore/{id?}',        [TrashController::class,'restorePertanyaan'])->name('trashs.pertanyaan.restore');
    Route::delete('trashs/pertanyaan/delete/{id?}',      [TrashController::class,'deletePertanyaan'])->name('trashs.pertanyaan.delete');
    Route::get('trashs/users/restore/{id?}',            [TrashController::class,'restoreUsers'])->name('trashs.users.restore');
    Route::delete('trashs/users/delete/{id?}',          [TrashController::class,'deleteUsers'])->name('trashs.users.delete');
    Route::get('trashs/sekolah/restore/{id?}',            [TrashController::class,'restoreSekolah'])->name('trashs.sekolah.restore');
    Route::delete('trashs/sekolah/delete/{id?}',          [TrashController::class,'deleteSekolah'])->name('trashs.sekolah.delete');
    Route::get('trashs/departements/restore/{id?}',     [TrashController::class,'restoreDepartements'])->name('trashs.departements.restore');
    Route::delete('trashs/departements/delete/{id?}',   [TrashController::class,'deleteDepartements'])->name('trashs.departements.delete');
    Route::resource('kategoris',                           KategoriController::class);
    Route::resource('pertanyaans',                           PertanyaanController::class);
    Route::resource('sekolahs',                           SekolahController::class);
    Route::resource('trashs',                           TrashController::class);
    Route::resource('users',                            UserController::class);
    Route::resource('tasks',                            TaskController::class);
    Route::resource('departements',                     DepartementController::class);
    Route::resource('presences',                        PresenceController::class);
    Route::resource('salaries',                         SalaryController::class);
    Route::resource('mechine',                          MechineController::class);
    Route::resource('config',                           PresenceConfigController::class);
    Route::get('overtime/{id?}/export',                 [GenerateOvertimeController::class, 'export'])->name('overtime.export');
    Route::get('overtime/history',                      [OvertimeController::class, 'indexHistory'])->name('overtime.history');
    Route::resource('overtime',                         OvertimeController::class);
    Route::get('paidleave/{id?}/export',                [GeneratePaidLeaveController::class, 'export'])->name('paidleave.export');
    Route::get('paidleave/history',                     [PaidLeaveController::class, 'indexHistory'])->name('paidleave.history');
    Route::resource('paidleave',                        PaidLeaveController::class);
    Route::get('/get/datatables/mechine',               [MechineController::class, 'getDtRowData'])->name('get.datatables.mechine');
    Route::get('/profile',                              [HomeController::class, 'profile'])->name('profile');
    Route::patch('/profileupdate/{id?}',                [HomeController::class, 'profileupdate'])->name('profileupdate');
    Route::post('presencelogs',                         [PresenceLogController::class, 'sync'])->name('sync');
    Route::get('/cleaner',                              [HomeController::class, 'cleaner'])->name('cleaner');
    Route::get('/viewclear',                            [HomeController::class, 'viewclear'])->name('viewclear');
    Route::get('/routeclear',                           [HomeController::class, 'routeclear'])->name('routeclear');
    Route::get('/configclear',                          [HomeController::class, 'configclear'])->name('configclear');
    Route::get('/cacheclear',                           [HomeController::class, 'cacheclear'])->name('cacheclear');
    Route::get('/clearall',                             [HomeController::class, 'clearall'])->name('clearall');
});
