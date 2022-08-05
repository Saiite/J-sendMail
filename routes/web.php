<?php

use App\Http\Livewire\Lock;
use App\Http\Livewire\Post;
use App\Models\historiques;
use App\Http\Livewire\Index;
use App\Http\Livewire\Users;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\Profile;
use App\Http\Livewire\PostEdit;

use App\Http\Livewire\LiveTable;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\EditProfile;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\PostEditEdit;

use App\Http\Livewire\UdaptProfile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\ProfileExample;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Components\Forms;
use App\Http\Controllers\MailController;
use App\Http\Livewire\ResetPasswordExample;

use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Components\Notifications;

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

Route::view('users', 'livewire.home');
Route::redirect('/', '/index');
Route::redirect('/', '/login');
Route::get('/live-table', LiveTable::class)->name('live-table');
Route::get('/post',  Post::class)->name('post');


Route::get('/post-edit',  PostEdit::class)->name('post-edit');

Route::get('postes/{id}/edit',  PostEditEdit::class)->name('post-edit-edit');



Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');


Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');




Route::middleware('auth')->group(function () {
    Route::get('users/{id}/edit', Profile::class)->name('profile');
  
   
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
   
   
   
    
    
});

Route::get('/udapt-profile',  UdaptProfile::class)->name('udapt-profile');

Route::get('udapt-profile/{id}/edit', EditProfile::class)->name('edit-profile');


