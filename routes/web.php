<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

// ---------- Public ----------
Route::get('/', [PublicPageController::class, 'home'])->name('landing');
Route::get('/about', [PublicPageController::class, 'about'])->name('public.about');
Route::get('/management-team', [PublicPageController::class, 'managementTeam'])->name('public.management-team');
Route::get('/lease', [PublicPageController::class, 'lease'])->name('public.lease');
Route::get('/services', [PublicPageController::class, 'services'])->name('public.services');
Route::get('/project-gallery', [PublicPageController::class, 'projectGallery'])->name('public.project-gallery');
Route::get('/articles', [PublicPageController::class, 'articles'])->name('public.articles');
Route::get('/blog', [PublicPageController::class, 'blog'])->name('public.blog');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('public.contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('public.contact.submit')->middleware('throttle:5,1');
Route::get('/external-links', [PublicPageController::class, 'externalLinks'])->name('public.external-links');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware(['guest', 'throttle:5,1']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request')->middleware('guest');

// ---------- OTP (only enforced when ENABLE_OTP=true) ----------
Route::middleware('auth')->group(function () {
    Route::get('/otp/verify', [OtpController::class, 'show'])->name('otp.show');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');
    Route::post('/otp/resend', [OtpController::class, 'resend'])->name('otp.resend');
});

// ---------- Authenticated app ----------
Route::middleware(['auth', 'active_user', 'otp_verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Documents - viewable and manageable by every authenticated active role
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::patch('/documents/{document}/archive', [DocumentController::class, 'archive'])->name('documents.archive');
    Route::patch('/documents/{document}/restore', [DocumentController::class, 'restore'])->name('documents.restore');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    // Admin-only areas
    Route::middleware('role:admin')->group(function () {
        // User management
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
        Route::post('/users/{user}/reset-password', [UserManagementController::class, 'resetPassword'])->name('users.reset-password');

        // Audit logs
        Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('audit-logs.index');

        // Content management — team, blog, articles, and static-page text/images
        Route::name('admin.')->group(function () {
            Route::resource('team', TeamMemberController::class)->except(['show']);
            Route::resource('blog-posts', BlogPostController::class)->except(['show'])->parameters(['blog-posts' => 'post']);
            Route::resource('content-articles', ArticleController::class)->except(['show'])->parameters(['content-articles' => 'article']);
            Route::get('/pages/{page}/edit', [PageContentController::class, 'edit'])->name('pages.edit');
            Route::put('/pages/{page}', [PageContentController::class, 'update'])->name('pages.update');
        });
    });
});
