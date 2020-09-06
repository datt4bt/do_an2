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

use App\Http\Middleware\CheckGiaoVien;
use Illuminate\Routing\RouteGroup;


//middleware
Route::group(['middleware' => ['CheckLogin']], function () {
    Route::get('/','Controller@index')->name('home');
    Route::get('tim_kiem','Controller@tim_kiem')->name('tim_kiem');
    //Khoa
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'khoa','as'=>'khoa.'], function() {
    Route::get('','KhoaController@get_all')->name('get_all');
    Route::get('insert','KhoaController@insert')->name('insert');
    Route::post('process_insert','KhoaController@process_insert')->name('process_insert');
    Route::get('update/{ma}','KhoaController@update')->name('update');
    Route::post('process_update/{ma}','KhoaController@process_update')->name('process_update');
    Route::get('delete/{ma}','KhoaController@delete')->name('delete');   //
});
    //Phân công
    Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'phan_cong','as'=>'phan_cong.'], function() {
        Route::get('','PhanCongController@get_all')->name('get_all');
        Route::post('process_get_all','PhanCongController@process_get_all')->name('process_get_all');
        Route::get('insert','PhanCongController@insert')->name('insert');
        Route::post('process_phan_cong','PhanCongController@process_phan_cong')->name('process_phan_cong');
        Route::get('update/{ma_lop}/{ma_mon}/{ma_admin}','PhanCongController@update')->name('update');
        Route::post('process_update','PhanCongController@process_update')->name('process_update');
        Route::get('delete/{ma_lop}/{ma_mon}/{ma_admin}','PhanCongController@delete')->name('delete');   //
    });


//Ngành học
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'nganh_hoc','as'=>'nganh_hoc.'], function() {
    Route::get('','Nganh_HocController@get_all')->name('get_all');
    Route::get('insert','Nganh_HocController@insert')->name('insert');
    Route::post('process_insert','Nganh_HocController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Nganh_HocController@update')->name('update');
    Route::post('process_update/{ma}','Nganh_HocController@process_update')->name('process_update');
    Route::get('delete/{ma}','Nganh_HocController@delete')->name('delete');   //
});
//Kiểu điểm
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'kieu_diem','as'=>'kieu_diem.'], function() {
    Route::get('','Kieu_DiemController@get_all')->name('get_all');
    Route::get('insert','Kieu_DiemController@insert')->name('insert');
    Route::post('process_insert','Kieu_DiemController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Kieu_DiemController@update')->name('update');
    Route::post('process_update/{ma}','Kieu_DiemController@process_update')->name('process_update');
    Route::get('delete/{ma}','Kieu_DiemController@delete')->name('delete');   //
});
//Môn học
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'mon_hoc','as'=>'mon_hoc.'], function() {
    Route::get('','Mon_HocController@get_all')->name('get_all');
    Route::get('insert','Mon_HocController@insert')->name('insert');
    Route::post('process_insert','Mon_HocController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Mon_HocController@update')->name('update');
    Route::post('process_update/{ma}','Mon_HocController@process_update')->name('process_update');
    Route::get('delete/{ma}','Mon_HocController@delete')->name('delete');   //
});
//Ngành học chi tiết
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'nganh_hoc_chi_tiet','as'=>'nganh_hoc_chi_tiet.'], function() {
    Route::get('','Nganh_Hoc_Chi_TietController@get_all')->name('get_all');
    Route::get('insert','Nganh_Hoc_Chi_TietController@insert')->name('insert');
    Route::post('process_insert','Nganh_Hoc_Chi_TietController@process_insert')->name('process_insert');
    Route::post('select_nganh','Nganh_Hoc_Chi_TietController@select_nganh')->name('select_nganh');
    Route::post('nganh','Nganh_Hoc_Chi_TietController@nganh')->name('nganh');
    Route::get('delete_nganh/{ma_nganh}/{ma_mon}','Nganh_Hoc_Chi_TietController@delete_nganh')->name('delete_nganh');
   
});
//Lớp
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'lop','as'=>'lop.'], function() {
    Route::get('','LopController@get_all')->name('get_all');
       
    Route::post('get_one','LopController@get_one')->name('get_one');
    
    Route::get('insert','LopController@insert')->name('insert');
    Route::post('process_insert','LopController@process_insert')->name('process_insert');
    Route::get('update/{ma}','LopController@update')->name('update');
    Route::post('process_update/{ma}','LopController@process_update')->name('process_update');
    Route::get('delete/{ma}','LopController@delete')->name('delete');   
});
//Sinh viên
Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'sinh_vien','as'=>'sinh_vien.'], function() {
    Route::get('','Sinh_VienController@get_all')->name('get_all');
    Route::post('get_one','Sinh_VienController@get_one')->name('get_one');
    Route::get('view_tim_kiem/{ma}','Sinh_VienController@view_tim_kiem')->name('view_tim_kiem');
    Route::get('insert','Sinh_VienController@insert')->name('insert');
    //form excel
    Route::get('insert_excel','Sinh_VienController@insert_excel')->name('insert_excel');
    Route::post('process_insert_excel','Sinh_VienController@process_insert_excel')->name('process_insert_excel');
    //
    Route::get('view_diem/{ma}','Sinh_VienController@view_diem')->name('view_diem');
    Route::post('process_insert','Sinh_VienController@process_insert')->name('process_insert');
    Route::get('update/{ma}','Sinh_VienController@update')->name('update');
    Route::post('process_update/{ma}','Sinh_VienController@process_update')->name('process_update');
    Route::get('delete/{ma}','Sinh_VienController@delete')->name('delete');   
});
//Điểm
Route::group(['prefix' => 'diem_thi','as'=>'diem_thi.'], function() {
    Route::get('','Diem_ThiController@get_all')->name('get_all');
    Route::get('get_one','Diem_ThiController@get_one')->name('get_one');
    Route::get('get_lop','Diem_ThiController@get_lop')->name('get_lop');
    Route::get('get_mon','Diem_ThiController@get_mon')->name('get_mon');
    Route::get('luu_diem','Diem_ThiController@luu_diem')->name('luu_diem');
    Route::get('insert','Diem_ThiController@insert')->name('insert')->middleware(CheckGiaoVien::class);
    Route::post('process_insert','Diem_ThiController@process_insert')->name('process_insert');
    Route::get('thong_ke/{ma}','Diem_ThiController@get_all')->name('thong_ke');
    Route::post('process_thong_ke','Diem_ThiController@process_thong_ke')->name('process_thong_ke');
    Route::post('thong_ke_diem_thi','Diem_ThiController@thong_ke_diem_thi')->name('thong_ke_diem_thi');
   // Route::get('update/{ma}','Diem_ThiController@update')->name('update');
    //Route::post('process_update/{ma}','Diem_ThiController@process_update')->name('process_update');
   // Route::get('delete/{ma}','Diem_ThiController@delete')->name('delete');  
       

});
//Tài khoản
Route::group(['prefix' => 'account','as'=>'account.'], function() {
    Route::get('info_user','AccountController@info_user')->name('info_user');
    Route::get('view_update_info','AccountController@view_update_info')->name('view_update_info');
    Route::post('process_update_info','AccountController@process_update_info')->name('process_update_info');
    Route::get('insert_anh','AccountController@insert_anh')->name('insert_anh');
    Route::post('process_insert_anh','AccountController@process_insert_anh')->name('process_insert_anh');
  
}); 
//Admin

Route::group(['middleware' => ['CheckAdmin'],'prefix' => 'admin','as'=>'admin.'], function() {
    Route::get('','AdminController@get_all')->name('get_all');
    Route::get('insert','AdminController@insert')->name('insert');
    Route::post('process_insert','AdminController@process_insert')->name('process_insert');
    Route::get('delete/{ma}','AdminController@delete')->name('delete');
  
}); 
});
//middleware

Route::group(['middleware' => ['CheckSinhVien'],'prefix' => 'sv','as'=>'sv.'], function() {
    Route::get('view_diem_tung_sinh_vien','Diem_ThiController@view_diem_tung_sinh_vien')->name('view_diem_tung_sinh_vien');
    Route::get('info_user_sinh_vien','AccountController@info_user_sinh_vien')->name('info_user_sinh_vien');
    Route::get('view_update_info_sinh_vien','AccountController@view_update_info_sinh_vien')->name('view_update_info_sinh_vien');
    Route::post('process_update_info_sinh_vien','AccountController@process_update_info_sinh_vien')->name('process_update_info_sinh_vien');
});
  

Route::get('login','Controller@login')->name('login');
Route::get('login_sinh_vien','Controller@login_sinh_vien')->name('login_sinh_vien');
Route::post('process_login_sinh_vien','Controller@process_login_sinh_vien')->name('process_login_sinh_vien');
Route::post('process_login','Controller@process_login')->name('process_login');
Route::get('logout','Controller@logout')->name('logout');
Route::get('logout_sinh_vien','Controller@logout_sinh_vien')->name('logout_sinh_vien');
