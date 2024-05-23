<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\Admin\Auth\ChangePassController;







Auth::routes();

// index page
Route::get('/', [HomeController::class, 'index'])->middleware('is.admin');

// login page
Route::get('/admin/login', [AdminLogin::class, 'login_page']);
// do login
Route::post('/admin/login', [AdminLogin::class, 'login']);
// do logout
Route::post('/admin/logout', [AdminLogin::class, 'logout']);


// create admin prefix group and set middlewre is admin to check if auth not admin login return to login page

Route::group([ 'as' => 'admin.', 'middleware' => ['is.admin']] , function () {
    // index page
    Route::get('/', [HomeController::class, 'index']);
    // change password page
    Route::get('/change-pass', [ChangePassController::class, 'index']);
    // change password function
    Route::post('/change-pass', [ChangePassController::class, 'change_pass'])->name("change_password");

    //admin
    Route::resource('admins', 'Admin\AdminController');

    //types
    Route::resource('types', 'Admin\TypeController');

     //bosla types
     Route::resource('bosla-types', 'Admin\boslaTypeController');

    //settings
    Route::resource('settings', 'Admin\SettingsController');

    //models
    Route::resource('models', 'Admin\ModelController');

    //main places
    Route::resource('main-places','Admin\mainPlaceController');

     //sub places
    Route::resource('sub-places','Admin\subPlaceController');


    //items
    Route::resource('items', 'Admin\ItemsController');

    Route::post('items/status/old/{id}','Admin\ItemsController@changeStatus')->name('changeStatus');

    Route::get('items/{id}/details','Admin\ItemsController@details');

    Route::get('/model/{id}', 'Admin\ItemsController@getmodel');
    Route::get('/place/{id}', 'Admin\ItemsController@getPlace');

    Route::get('items/{id}/details','Admin\ItemsController@specific');

    // Route::get('/{type}', 'Admin\ItemsController@test');

    Route::get('items/details/{id}', 'Admin\ItemsController@attribute');

    Route::post('items/add-details/{id}','Admin\ItemsController@addDetails')->name('adddetails');
    Route::post('main-places/{id}/edit','Admin\ItemsController@updateDetails')->name('Admin.updatedetails');
    Route::post('items/edit-details/{id}','Admin\ItemsController@editDetails')->name('editdetails');

    Route::delete('/items/delete-attribute/{id}','Admin\ItemsController@deleteAttribute')->name('item.destroy');

    Route::delete('/items/delete/{id}','Admin\ItemsController@delete')->name('items.deleteReport');

    Route::get('/trash','Admin\ItemsController@trash')->name('items.trash');

    Route::delete('/force/{id}','Admin\ItemsController@force')->name('items.forcedelete');
    Route::get('/restore/{id}','Admin\ItemsController@restore')->name('items.restore');


    //  reports

    Route::get('reports', 'Admin\ReportsController@index')->name('reports.index');

    Route::get('report/pdf',  'Admin\ReportsController@convertToPdf')->name('pdf');

    Route::get('report/all',  'Admin\ReportsController@all')->name('reports.all');

    Route::get('report/specific',  'Admin\ReportsController@specificData')->name('reports.specific');

    Route::get('report/added',  'Admin\ReportsController@added')->name('reports.add');
    Route::post('report/doadded',  'Admin\ReportsController@doadded')->name('reports.doadded');

    Route::get('report/notadded',  'Admin\ReportsController@notadded')->name('reports.notadd');
    Route::post('report/notdoadded',  'Admin\ReportsController@notdoadded')->name('reports.notdoadded');

    Route::get('report/old',  'Admin\ReportsController@old')->name('reports.old');
    Route::post('report/oldpdf',  'Admin\ReportsController@oldpdf')->name('oldpdf');

    Route::get('report/bosla',  'Admin\ReportsController@bosla')->name('reports.bosla');
    Route::post('report/boslapdf',  'Admin\ReportsController@boslapdf')->name('reports.boslapdf');

    Route::get('report/type',  'Admin\ReportsController@type')->name('reports.type');
    Route::post('report/typepdf',  'Admin\ReportsController@typepdf')->name('reports.typepdf');

    // backup routes
        //index backup

    Route::get('/backup', 'Admin\BackupController@index')->name('backup');

    // download backup
    Route::get('/backup/download/Laravel/{name}', 'Admin\BackupController@download');
    // delete backup
    Route::get('/backup/delete/Laravel/{name}', 'Admin\BackupController@delete_backup');

    Route::get('/backup/make_backup', 'Admin\BackupController@backup_now')->name('make_backup');
    // backup routes end

    // roles
    Route::resource('roles','Admin\RoleController')->except('show');

    Route::get('{type}','Admin\HomeController@getType');
    Route::get('{type}/not-added','Admin\HomeController@not');


});
