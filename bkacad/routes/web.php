<?php

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

use Illuminate\Routing\RouteGroup;

Route::get('/','Controller@index')->name('home');

//Khoa
Route::group(['prefix' => 'khoa','as'=>'khoa.'], function() {
    Route::get('','KhoaController@get_all')->name('get_all');
    Route::get('insert','KhoaController@insert')->name('insert');
    Route::post('process_insert','KhoaController@process_insert')->name('process_insert');
    Route::get('update/{ma}','KhoaController@update')->name('update');
    Route::post('process_update/{ma}','KhoaController@process_update')->name('process_update');
    Route::get('delete/{ma}','KhoaController@delete')->name('delete');   //
});


//Ngành học
Route::group(['prefix' => 'nganh_hoc','as'=>'nganh_hoc.'], function() {
    Route::get('','Nganh_HocController@get_all')->name('get_all');
    Route::get('insert','Nganh_HocController@insert')->name('insert');
    Route::post('process_insert','Nganh_HocController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Nganh_HocController@update')->name('update');
    Route::post('process_update/{ma}','Nganh_HocController@process_update')->name('process_update');
    Route::get('delete/{ma}','Nganh_HocController@delete')->name('delete');   //
});
//Kiểu điểm
Route::group(['prefix' => 'kieu_diem','as'=>'kieu_diem.'], function() {
    Route::get('','Kieu_DiemController@get_all')->name('get_all');
    Route::get('insert','Kieu_DiemController@insert')->name('insert');
    Route::post('process_insert','Kieu_DiemController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Kieu_DiemController@update')->name('update');
    Route::post('process_update/{ma}','Kieu_DiemController@process_update')->name('process_update');
    Route::get('delete/{ma}','Kieu_DiemController@delete')->name('delete');   //
});
//Môn học
Route::group(['prefix' => 'mon_hoc','as'=>'mon_hoc.'], function() {
    Route::get('','Mon_HocController@get_all')->name('get_all');
    Route::get('insert','Mon_HocController@insert')->name('insert');
    Route::post('process_insert','Mon_HocController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Mon_HocController@update')->name('update');
    Route::post('process_update/{ma}','Mon_HocController@process_update')->name('process_update');
    Route::get('delete/{ma}','Mon_HocController@delete')->name('delete');   //
});
//Ngành học chi tiết
Route::group(['prefix' => 'nganh_hoc_chi_tiet','as'=>'nganh_hoc_chi_tiet.'], function() {
    Route::get('','Nganh_Hoc_Chi_TietController@get_all')->name('get_all');
    Route::get('insert','Nganh_Hoc_Chi_TietController@insert')->name('insert');
    Route::post('process_insert','Nganh_Hoc_Chi_TietController@process_insert')->name('process_insert');
   
});
//Lớp
Route::group(['prefix' => 'lop','as'=>'lop.'], function() {
    Route::get('','LopController@get_all')->name('get_all');
    Route::get('insert','LopController@insert')->name('insert');
    Route::post('process_insert','LopController@process_insert')->name('process_insert');
    Route::get('update/{ma}','LopController@update')->name('update');
    Route::post('process_update/{ma}','LopController@process_update')->name('process_update');
    Route::get('delete/{ma}','LopController@delete')->name('delete');   
});
//Sinh viên
Route::group(['prefix' => 'sinh_vien','as'=>'sinh_vien.'], function() {
    Route::get('','Sinh_VienController@get_all')->name('get_all');
    Route::get('insert','Sinh_VienController@insert')->name('insert');
    Route::post('process_insert','Sinh_VienController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Sinh_VienController@update')->name('update');
    Route::post('process_update/{ma}','Sinh_VienController@process_update')->name('process_update');
    Route::get('delete/{ma}','Sinh_VienController@delete')->name('delete');   
});
//Điểm
Route::group(['prefix' => 'diem_thi','as'=>'diem_thi.'], function() {
    Route::get('','Diem_ThiController@get_all')->name('get_all');
    Route::get('get_lop','Diem_ThiController@get_lop')->name('get_lop');
    Route::get('get_mon','Diem_ThiController@get_mon')->name('get_mon');
    Route::get('insert','Diem_ThiController@insert')->name('insert');
   
   // Route::get('update/{ma}','Diem_ThiController@update')->name('update');
    //Route::post('process_update/{ma}','Diem_ThiController@process_update')->name('process_update');
   // Route::get('delete/{ma}','Diem_ThiController@delete')->name('delete');   
});
