<?php

use App\Http\Livewire\Lock;
use App\Http\Livewire\Index;
use App\Http\Livewire\Users;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LiveTable;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\ProfileExample;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Components\Forms;
use App\Http\Controllers\MailController;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\CourrierList;
use App\Http\Livewire\CourrierIndex;
use App\Http\Livewire\CourrierEdit;
use App\Http\Livewire\CourrierShow;
use App\Http\Livewire\EmeteurList;
use App\Http\Livewire\EmplacementList;
use App\Http\Livewire\EmplacementIndex;
use App\Http\Livewire\EmplacementShow;
use App\Http\Livewire\EmplacementEdit;
use App\Http\Livewire\EmeteurEdit;
use App\Http\Livewire\EmeteurIndex;
use App\Http\Livewire\Notification;




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


Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');


Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::get('users/{id}/edit', Profile::class)->name('profile');

    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/courrier-list', CourrierList::class)->name('courrier-list');
    Route::get('/courrier-index', CourrierIndex::class)->name('courrier-index');
    Route::get('courrier/{id}/edit', CourrierEdit::class)->name('courrier-edit');
    Route::get('courrier/{courrier}', CourrierShow::class)->name('courrier-show');
    Route::get('/emeteur-list',EmeteurList::class)->name('emeteur-list');
    Route::get('/emeteur-index',EmeteurIndex::class)->name('emeteur-index');
    Route::get('emeteur/{id}/edit',EmeteurEdit::class)->name('emeteur-edit');
    Route::get('/emplacement-list',EmplacementList::class)->name('emplacement-list');
    Route::get('/emplacement-index',EmplacementIndex::class)->name('emplacement-index');
    Route::get('emplacement/{id}/edit', EmplacementEdit::class)->name('emplacement-edit');
    Route::get('emplacement/{emplacement}',EmplacementShow::class)->name('emplacement-show');
    Route::get('/typography', Typography::class)->name('typography');
    Route::get('/notiffication',Notification::class)->name('notification');


});
