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

Route::get('/', function () {return view('giao_dien.index');})->name('home');
//Ngành học
Route::get('nganh_hoc','Nganh_hocController@get_all')->name('get_all_nganh_hoc');
Route::get('nganh_hoc/insert','Nganh_hocController@insert')->name('insert_nganh_hoc');
Route::post('nganh_hoc/process_insert','Nganh_hocController@process_insert')->name('process_insert_nganh_hoc');
Route::get('nganh_hoc/update/{ma}','Nganh_hocController@update')->name('update_nganh_hoc');
Route::post('nganh_hoc/process_update/{ma}','Nganh_hocController@process_update')->name('process_update_nganh_hoc');
Route::get('nganh_hoc/delete/{ma}','Nganh_hocController@delete')->name('delete_nganh_hoc');
//Kiểu điểm
Route::get('kieu_diem','Kieu_diemController@get_all')->name('get_all_kieu_diem');
Route::get('kieu_diem/insert','Kieu_diemController@insert')->name('insert_kieu_diem');
Route::post('kieu_diem/process_insert','Kieu_diemController@process_insert')->name('process_insert_kieu_diem');
Route::get('kieu_diem/update/{ma}','Kieu_diemController@update')->name('update_kieu_diem');
Route::post('kieu_diem/process_update/{ma}','Kieu_diemController@process_update')->name('process_update_kieu_diem');
Route::get('kieu_diem/delete/{ma}','Kieu_diemController@delete')->name('delete_kieu_diem');
