<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\SubRankController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RoleAccountController;
use App\Http\Controllers\admin\StatusStaffController;
use App\Http\Controllers\admin\RequestStaffController;
use App\Http\Controllers\admin\RankController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ResetRankController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\staff\HomeStaffController;
use App\Http\Controllers\user\HomeUserController;

// Routes user
Route::prefix('/')->group(function(){
    Route::get('/', [HomeUserController::class, 'index'])->name('homeUser');
    Route::get('/request_staff', [HomeUserController::class, 'formRequestStaff'])->name('user.formRequestStaff');
    Route::post('/request_staff', [HomeUserController::class, 'requestStaff'])->name('user.requestStaff');
    Route::prefix('/login')->group(function(){
        Route::get('/', [AccountController::class, 'login'])->name('login');
        Route::post('/', [AccountController::class, 'checkLogin'])->name('checkLogin');
    });
    Route::prefix('/plow')->group(function(){
        Route::get('/', [OrderController::class, 'myOrder'])->name('user.plow.index');
        Route::get('/price', [HomeUserController::class, 'price'])->name('user.plow.price');
        Route::get('/create', [OrderController::class, 'create'])->name('user.plow.create');
        Route::post('/create', [OrderController::class, 'solveFormCreate'])->name('user.plow.solveFormCreate');
    });
    Route::prefix('/info')->group(function(){
        Route::get('/reset_rank', [ResetRankController::class, 'index'])->name('user.info.reset_rank');
    });
    Route::prefix('/payment')->group(function(){
        Route::get('/', [PaymentController::class, 'index'])->name('user.payment.index')->middleware('auth');
        Route::get('/create', [PaymentController::class, 'create'])->name('user.payment.create')->middleware('auth');
        Route::post('/create', [PaymentController::class, 'solveFormCreate'])->name('user.payment.solveFormCreate')->middleware('auth');
        Route::get('/comfirm/{code?}', [PaymentController::class, 'comfirm'])->name('user.payment.comfirm');
    });
    Route::prefix('/profile')->group(function(){
        Route::get('/view/{id?}', [HomeUserController::class, 'view'])->name('user.profile.view');
        Route::get('/edit/{id?}', [HomeUserController::class, 'edit'])->name('user.profile.edit');
        Route::post('/edit/{id?}', [HomeUserController::class, 'solveFormEdit'])->name('user.profile.solveedit');
    });
});

// Routes admin
Route::prefix('admin')->middleware('auth')->middleware('checkLoginAdmin')->group(function(){
    Route::prefix('account')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
        Route::get('/add', [AccountController::class, 'formAdd'])->name('admin.account.formAdd');
        Route::post('/add', [AccountController::class, 'add'])->name('admin.account.add');
        Route::get('/delete/{id?}', [AccountController::class, 'delete'])->name('admin.account.delete');
        Route::get('/update/{id?}', [AccountController::class, 'formUpdate'])->name('admin.account.formUpdate');
        Route::post('/update/{id?}', [AccountController::class, 'update'])->name('admin.account.update');
        Route::get('/role/{id?}', [AccountController::class, 'role'])->name('admin.account.role');
    });
    Route::prefix('role')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create', [RoleController::class, 'showCreate'])->name('admin.role.showcreate');
        Route::post('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::get('/edit/{id?}', [RoleController::class, 'showEdit'])->name('admin.role.showedit');
        Route::post('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::get('/delete/{id?}', [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::get('/detail', [RoleAccountController::class, 'findByIdRole'])->name('admin.role.detail');
        Route::post('/detail', [RoleAccountController::class, 'add'])->name('admin.role.detail.add');
        Route::get('/detail/delete/{id}', [RoleAccountController::class, 'delete'])->name('admin.role.detail.detete');
    });
    Route::prefix('staff')->group(function(){
        Route::get('/', [StatusStaffController::class, 'index'])->name('admin.staff.index');
        Route::get('/request_staff', [RequestStaffController::class, 'index'])->name('admin.account.requestStaff');
        Route::get('/request_staff/delete/{id?}', [RequestStaffController::class, 'delete'])->name('admin.account.requestStaff.delete');
        Route::get('/request_staff/accept/{id?}', [RequestStaffController::class, 'accept'])->name('admin.account.requestStaff.accept');
    });
    Route::prefix('rank')->group(function(){
        Route::get('/', [RankController::class, 'index'])->name('admin.rank.index');
        Route::get('/create', [RankController::class, 'create'])->name('admin.rank.create');
        Route::post('/create', [RankController::class, 'solveFormCreate'])->name('admin.rank.solveFormCreate');
        Route::get('/delete/{id?}', [RankController::class, 'delete'])->name('admin.rank.delete');
    });
    Route::prefix('subrank')->group(function(){
        Route::get('/', [SubRankController::class, 'index'])->name('admin.subrank.index');
        Route::get('/create', [SubRankController::class, 'create'])->name('admin.subrank.create');
        Route::post('/create', [SubRankController::class, 'solveFormCreate'])->name('admin.subrank.solveFormCreate');
        Route::get('/delete/{id?}', [SubRankController::class, 'delete'])->name('admin.subrank.delete');
    });
    Route::prefix('blog')->group(function(){
        Route::get('/', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/create', [BlogController::class, 'solveCreate'])->name('admin.blog.solveCreate');
        Route::get('/delete/{id?}', [BlogController::class, 'delete'])->name('admin.blog.delete');
    });
});


Route::prefix('staff')->middleware('checkStaff')->group(function(){
    Route::get('/', [HomeStaffController::class, 'index'])->name('staff.index');
});
