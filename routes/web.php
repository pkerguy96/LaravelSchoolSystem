<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\DevoirsController;
use App\Http\Controllers\Backend\GlobalNotificationController;
use App\Http\Controllers\Backend\MessagesController;
use App\Http\Controllers\Backend\ModulesController;
use App\Http\Controllers\Backend\ProfessorController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\EtudiantController;

use App\Http\Controllers\Frontend\ProfesseurUserController;
use App\Http\Controllers\ProfesseurController;
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
// professor guard testing
Route::group(['prefix' => 'professeur', 'middleware' => ['professeur:professeur']], function () {

    route::get('/login', [ProfesseurController::class, 'loginform'])->name('professeur.login.portal');
    route::post('/login', [ProfesseurController::class, 'store'])->name('professeur.login');
});
Route::middleware(['auth:sanctum,professeur', 'verified'])->get('/professeur/dashboard', function () {
    return view('professeur.home');
})->name('dashboardprof');

Route::get('/', function () {
    return view('auth.login');
})->name('userlogin');

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login.page');
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
// all  routes
// Log out route 
Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.home');
})->name('dashboardadmin');
// ALL ADMIN ROUTES :
Route::group(['prefix' => 'Admin', 'middleware' => ['auth:admin']], function () {
    // admin profile 
    Route::get('/view', [AdminProfileController::class, 'ViewProfile'])->name('admin.profile');
    // admin profile edit
    Route::post('/edit', [AdminProfileController::class, 'EditAdmin'])->name('admin.edit');
    // admin update password route 

    Route::get('/update/password', [AdminProfileController::class, 'UpdateadminPassword'])->name('admin.settings');
    // admin edit  password
    Route::post('/edit/password', [AdminProfileController::class, 'UpdatePassword'])->name('admin.password');


    // ajax module getter
    Route::get('/Devoirs/get/all', [ModulesController::class, 'AlltpsGetAjax']);




    // view all students route 
    Route::get('/view/etudient', [UsersController::class, 'ListEtudient'])->name('etudient.list');
    // create  student route 
    Route::get('/ajoute/etudient', [UsersController::class, 'AjouteEtudiant'])->name('cree.etudient');
    // create  student  
    Route::post('/Add/Student', [UsersController::class, 'AddStudent'])->name('add.student');
    // delete student route 
    Route::get('/Delete/Student/{id}', [UsersController::class, 'DeleteStudent'])->name('delete.student');
    // edit student route page
    Route::get('/Edit/Student/{id}', [UsersController::class, 'EditStudentPage'])->name('edit.student');
    // save student edit 
    Route::post('/Save/Student', [UsersController::class, 'SaveStudent'])->name('save.student');

    // view all professor routes:

    // view all professors 
    Route::get('/view/Professor', [ProfessorController::class, 'ViewProfessors'])->name('professor.list');
    // professor add page route 
    Route::get('/Add/Professor', [ProfessorController::class, 'AddProfessor'])->name('add.professeur');
    // save professor
    Route::post('/Save/Professor', [ProfessorController::class, 'SaveProfessor'])->name('save.professor');
    // professor edit page route 
    Route::get('/edit/Professor/{id}', [ProfessorController::class, 'EditProfessor'])->name('professor.edit');
    // save professor edit 
    Route::post('/Modify/Professor', [ProfessorController::class, 'ModifyProf'])->name('modify.professor');
    // delete prof
    Route::get('/Delete/Professor/{id}', [ProfessorController::class, 'DeleteProfessor'])->name('delete.prof');

    // view all modules routes here 
    // view all modules route
    Route::get('/View/Modules', [ModulesController::class, 'ViewModules'])->name('module.list');
    // add new module route page
    Route::get('/Add/Modules', [ModulesController::class, 'Addmodules'])->name('add.module');
    //save modules
    Route::post('/Save/Modules', [ModulesController::class, 'SaveModules'])->name('save.modules');
    // edit module
    Route::get('/Edit/Modules/{id}', [ModulesController::class, 'EditModule'])->name('edit.module');
    // modify modules
    Route::post('/Modify/Modules', [ModulesController::class, 'ModifyModules'])->name('modify.modules');
    // delete module
    Route::get('/Delete/Modules/{id}', [ModulesController::class, 'DeleteModule'])->name('delete.module');

    // devoirs routes here 
    Route::get('/List/Devoirs', [DevoirsController::class, 'ListDevoirs'])->name('list.devoirs');
    // add devoir
    Route::get('/Add/Devoirs', [DevoirsController::class, 'AjouteDevoir'])->name('ajoute.devoir');
    //save devoir
    Route::post('/Save/Devoirs', [DevoirsController::class, 'SaveDevoir'])->name('save.devoir');
    // edit devoir
    Route::get('/Edit/Devoirs/{id}', [DevoirsController::class, 'EditDevoir'])->name('edit.devoir');
    // modify devoir
    Route::post('/Modify/Devoirs', [DevoirsController::class, 'ModifyDevoir'])->name('modify.devoir');
    // deleete devoir
    Route::get('/Delete/Devoirs/{id}', [DevoirsController::class, 'DeleteDevoir'])->name('delete.devoir');
    // notification 
    Route::get('/Notifications', [GlobalNotificationController::class, 'NotificationPage'])->name('admin.notification');
    Route::get('/Notifications/New', [GlobalNotificationController::class, 'WriteNotification'])->name('write.notification');

    Route::post('/Notifications/submit', [GlobalNotificationController::class, 'SubmitNotification'])->name('submit.notification');
});

//ALL PROFESSEURS ROUTES
Route::group(['prefix' => 'Professeur', 'middleware' => ['auth:professeur']], function () {

    Route::get('/view/all', [ProfesseurUserController::class, 'Alltps'])->name('prof.devoirs');
    Route::get('/Edit/Devoirs/{id}', [ProfesseurUserController::class, 'EditDevoir'])->name('profedit.devoir');
    Route::post('/Modify/Devoirs', [ProfesseurUserController::class, 'ModifyDevoir'])->name('modifypf.devoir');
    Route::get('/Delete/Devoirs/{id}', [ProfesseurUserController::class, 'DeleteDevoir'])->name('delete.devoirtp');
    Route::get('/Add/Devoirs', [ProfesseurUserController::class, 'AjouteDevoir'])->name('add.devoir');
    Route::post('/Save/Devoirs', [ProfesseurUserController::class, 'SaveDevoir'])->name('devoir.save.prof');
    Route::get('/all/Devoirs', [ProfesseurUserController::class, 'Allremises'])->name('remise.page');
    Route::get('/profile/edit', [ProfesseurUserController::class, 'Profprofile'])->name('profile.user');
    Route::post('/update/professeur', [ProfesseurUserController::class, 'Updateprofessor'])->name('update.professeur');
    Route::get('/profile/Settings', [ProfesseurUserController::class, 'ProfSettings'])->name('prof.settings');
    Route::post('/password', [ProfesseurUserController::class, 'ProfChangePw'])->name('change.prof.pw');
    Route::get('/Note/{id}/{user_id}', [ProfesseurUserController::class, 'ProfNote'])->name('professeur.note');
    Route::post('/submit/Tp', [ProfesseurUserController::class, 'NoteStore'])->name('submit.note');
    Route::get('/Devoirs/prof/all', [ProfesseurUserController::class, 'AllprofTpsAJax']);
});










//route::middleware(['auth:admin'])->group(function () {
//});
//route::prefix('admin')->group(function () {
//});

Route::get('/Profile', [EtudiantController::class, 'EtudiantProfile'])->name('user.profile');
Route::post('/modifier/info', [EtudiantController::class, 'ModifierEtudiant'])->name('modifier.etudiant');
Route::get('/Settings', [EtudiantController::class, 'EtudiantSettings'])->name('user.settings');
Route::post('/Password/Change', [EtudiantController::class, 'Changermdp'])->name('change.user.password');

Route::get('/calendar', [EtudiantController::class, 'calendar'])->name('etudiants.calendar');

Route::get('/devoirs/{id}', [EtudiantController::class, 'devoirs'])->name('devoirs.list');
Route::get('/deposite/{id}', [EtudiantController::class, 'deposite'])->name('deposite.tp');
Route::post('/deposite/Excercice', [EtudiantController::class, 'AddAnwsers'])->name('student.devoir.add');
Route::post('/sinscrire/module', [EtudiantController::class, 'RegisterModule'])->name('register.module');

Route::get('/messages/view', [MessagesController::class, 'Mindex'])->name('view.messages');
Route::get('/messages/new', [MessagesController::class, 'create'])->name('send.messsage');

Route::get('/messages/new/{id}', [MessagesController::class, 'createmessagedirectly'])->name('send.messsage.directly');

Route::post('/messages/store', [MessagesController::class, 'store'])->name('messages.store');
Route::get('/messages/reply/{id}', [MessagesController::class, 'show'])->name('conversation.talk');

Route::put('/messages/sent/{id}', [MessagesController::class, 'update'])->name('messages.update');
Route::get('/notification/view/all', [GlobalNotificationController::class, 'NotificationViewAjax']);
Route::get('/notification/seen', [GlobalNotificationController::class, 'viewednotifi']);

Route::get('notification/view', [GlobalNotificationController::class, 'viewallnotifications'])->name('view.all.notifications');

Route::get('/Subscribed/Modules/{id}', [EtudiantController::class, 'AllsubscribedModules']);

Route::get('/thread/delete/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');
Route::group(['prefix' => 'messages', 'as' => 'messages'], function () {
    Route::put('{thread}', [MessagesController::class, 'update'])->name('.update');
});


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('etudiants.list_modules');
})->name('dashboard');
