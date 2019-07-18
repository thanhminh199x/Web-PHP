<?php
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

// Trang chu
Route::get('trangchu','frontend\homeController@getIndex' )->name('home');

Route::get('searchMBC', 'frontend\homeController@searchMBC');
Route::get('postSearch', 'frontend\homeController@postSearch')->name('search');
Route::post('handleAjax', 'frontend\homeController@handleAjax')->name('ajax');
Route::get('gioithieu','frontend\homeController@getGt' )->name('gioithieu');
Route::get('vanban','frontend\homeController@getVb' )->name('vanban');
Route::get('huongdan','frontend\homeController@getHd' )->name('huongdan');
Route::group(['prefix' => 'mbc-english', 'as'=>'english.'], function () {
    Route::get('','frontend\homeControllerE@getIndex' )->name('home');
    Route::get('searchMBC', 'frontend\homeControllerE@searchMBC');
    Route::get('postSearch', 'frontend\homeControllerE@postSearch')->name('search');
    Route::post('handleAjax', 'frontend\homeControllerE@handleAjax')->name('ajax');
    Route::get('gioithieu','frontend\homeControllerE@getGt' )->name('gioithieu');
    Route::get('vanban','frontend\homeControllerE@getVb' )->name('vanban');
    Route::get('huongdan','frontend\homeControllerE@getHd' )->name('huongdan');
});

Route::post('ajaxTinh','Backend\HandleAjax@ajaxTinh')->name('ajaxtinh');
Route::post('ajaxHuyen','Backend\HandleAjax@ajaxHuyen')->name('ajaxhuyen');
Route::post('ajaxSearch','Backend\HandleAjax@ajaxSearch')->name('ajaxSearch');
Route::group(['prefix' => 'admin','as'=>'admin.','namespace'=>'Backend','middleware'=>['checklogin']], function() {
    
    Route::get('', 'adminController@getindex')->name('index');
    Route::get('nhat-ky-hoat-dong', 'adminController@diary')->name('diary')->middleware('CheckAdmin');
    Route::post('import-file-excel', 'adminController@import_excel')->name('import_excel');
    Route::get('cap-nhat-file-excel', 'adminController@import_excels')->name('import_excels');
    Route::get('cai-dat-tai-khoan', 'adminController@setting_account')->name('setting_account');
    Route::get('quan-ly-tai-khoan', 'adminController@manage_account')->name('manage_account')->middleware('CheckAdmin'); 
    Route::get('tao-tai-khoan', 'adminController@add_account')->name('add_account')->middleware('CheckAdmin');
    Route::post('tao-tai-khoan', 'adminController@createAcc')->name('createAcc')->middleware('CheckAdmin');
    Route::post('cap-nhat-tai-khoan', 'adminController@update_account')->name('update_account');
    Route::post('doi-mat-khau', 'adminController@changePass')->name('changePass');
    Route::post('xoa-tai-khoan', 'adminController@deleteAcc')->name('deleteAcc')->middleware('CheckAdmin');
    Route::post('cap-nhat-quyen', 'adminController@updateRole')->name('updateRole')->middleware('CheckAdmin');
    Route::post('ajaxAccount', 'adminController@getAcc')->name('getAcc')->middleware('CheckAdmin');
    Route::post('tim-kiem-tai-khoan', 'a;;dminController@searchAcc')->name('searchAcc')->middleware('CheckAdmin');
    Route::post('getHuyenById', 'adminController@getHuyenById')->name('getHuyenById');
    Route::post('them-doi-tuong-gan-ma','adminController@PostaddTinhChiTiet')->name('add_dtgm');
    
    Route::group(['prefix' => 'tinh'], function() {
        Route::get('','adminController@getTinh')->name('tinh');
        Route::get('add','adminController@addTinh')->name('add_tinh');
        Route::post('add','adminController@PostaddTinh');
        Route::get('edit/{id}','adminController@editTinh')->name('edit_tinh');
        Route::post('edit/{id}','adminController@postEditTinh');
        Route::get('delete/{id}','adminController@deleteTinh')->name('delete_tinh');
    });
    
    Route::group(['prefix' => 'huyen'], function() {
        Route::get('','adminController@getHuyen')->name('huyen');
        // Route::get('','adminController@PostgetHuyen');
        Route::get('add','adminController@addHuyen')->name('add_huyen');
        Route::post('add','adminController@PostaddHuyen');  
        Route::get('edit/{id}','adminController@editHuyen')->name('edit_huyen');
        Route::post('edit/{id}','adminController@postEditHuyen');
        Route::get('delete/{id}','adminController@deleteHuyen')->name('delete_huyen');
    });
    Route::get('doi-tuong-gan-ma','adminController@getHuyenChiTiet')->name('doituongganma');
    Route::group(['prefix' => 'huyenchitiet'], function() {
        Route::get('','adminController@getHuyenChiTiet')->name('huyenchitiet');
        // Route::get('','adminController@PostgetHuyen');
        Route::get('add','adminController@addHuyenChiTiet')->name('add_huyenchitiet');
        Route::post('add','adminController@PostaddHuyenChiTiet');  
        Route::get('edit/{id}','adminController@editHuyenChiTiet')->name('edit_huyenchitiet');
        Route::post('edit/{id}','adminController@postEditHuyenChiTiet');
        Route::get('delete/{id}','adminController@deleteHuyenChiTiet')->name('delete_huyenchitiet');
    });
    Route::group(['prefix' => 'tinhchitiet'], function() {
        Route::get('','adminController@getTinhChiTiet')->name('tinhchitiet');
        // Route::get('','adminController@PostgetHuyen');
        Route::get('add','adminController@addTinhChiTiet')->name('add_tinhchitiet');
        Route::post('add','adminController@PostaddTinhChiTiet');  
        Route::get('edit/{id}','adminController@editTinhChiTiet')->name('edit_tinhchitiet');
        Route::post('edit/{id}','adminController@postEditTinhChiTiet');
        Route::get('delete/{id}','adminController@deleteTinhChiTiet')->name('delete_tinhchitiet');
    });
    
    
    
});

// Route Login
Route::group(['middleware'=>['checklogout']], function () {
    Route::get('/','loginControler@getLogin')->name('login');
    Route::post('/','loginControler@postLogin');
});
Route::get('logout','loginControler@getLogout')->name('logout');    



