<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;



Route::group([], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateAdmin'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // SLIDER
    Route::get('/create/slider', [SliderController::class, 'createSlider'])->name('create.slider');
    Route::post('/store/slider', [SliderController::class, 'storeSlider'])->name('store.slider');
    Route::get('/get/slider', [SliderController::class, 'getSlider'])->name('get.slider');
    Route::get('/edit/slider/{id}', [SliderController::class, 'editSlider'])->name('edit.slider');
    Route::post('/update/slider/{id}', [SliderController::class, 'updateSlider'])->name('update.slider');
    Route::post('/update/slider/active/{id}', [SliderController::class, 'activeSlider'])->name('update.active.slider');
    Route::post('/update/slider/inactive/{id}', [SliderController::class, 'inactiveSlider'])->name('update.inactive.slider');

    // ABOUT
    Route::get('/create/about', [AboutController::class, 'createAbout'])->name('create.about');
    Route::post('/store/about', [AboutController::class, 'storeAbout'])->name('store.about');
    Route::get('/get/about', [AboutController::class, 'getAbout'])->name('get.about');
    Route::get('/edit/about/{id}', [AboutController::class, 'editAbout'])->name('edit.about');
    Route::post('/update/about/{id}', [AboutController::class, 'updateAbout'])->name('update.about');
    Route::post('/update/about/active/{id}', [AboutController::class, 'activeAbout'])->name('update.active.about');
    Route::post('/update/about/inactive/{id}', [AboutController::class, 'inactiveAbout'])->name('update.inactive.about');

    // SKILL
    Route::get('/create/skill', [SkillController::class, 'createSkill'])->name('create.skill');
    Route::post('/store/skill', [SkillController::class, 'storeSkill'])->name('store.skill');
    Route::get('/get/skill', [SkillController::class, 'getSkill'])->name('get.skill');
    Route::get('/edit/skill/{id}', [SkillController::class, 'editSkill'])->name('edit.skill');
    Route::post('/update/skill/{id}', [SkillController::class, 'updateSkill'])->name('update.skill');
    Route::post('/update/skill/active/{id}', [SkillController::class, 'activeSkill'])->name('update.active.skill');
    Route::post('/update/skill/inactive/{id}', [SkillController::class, 'inactiveSkill'])->name('update.inactive.skill');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
?>