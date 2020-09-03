<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\PhanCong;
use App\Models\Lop;
use App\Models\MonHoc;

class PhanCongController
{
	
	 public function get_all(){
		$array_phan_cong=PhanCong::get();
		return view('phan_cong.view_all',compact('array_phan_cong'));
	}
	 public function insert(){
		
	$array_admin=Admin::where('cap_do',1)->get();
	$array_mon=MonHoc::get();
	$array_lop=Lop::with('khoa')->get();
		
		return view('phan_cong.view_insert',compact('array_admin','array_mon','array_lop'));
	}
	 public function process_phan_cong(Request $rq){
		$check_phan_cong=PhanCong::where('ma_mon_hoc' , $rq->ma_mon)->where('ma_lop_hoc' , $rq->ma_lop)->where('ma_admin' , $rq->ma_admin)->count();
		if($check_phan_cong==1){
			return redirect()->route('phan_cong.insert')->with('loi_phan_cong','Thông tin phân công đã tồn tại,vui lòng thử lại');
		}
		else
		{
		$check=PhanCong::where('ma_mon_hoc' , $rq->ma_mon)->where('ma_lop_hoc' , $rq->ma_lop)->count();
		if($check<3)
		{
			PhanCong::insert([
            'ma_lop_hoc' => $rq->ma_lop,
            'ma_mon_hoc' => $rq->ma_mon,
        
            'ma_admin' => $rq->ma_admin
		]);
		}
		else{
			return redirect()->route('phan_cong.insert')->with('loi_phan_cong','Không thể thêm phân công.Do đã đủ số lượng,vui lòng xóa phân công và thử lại');
		}

	}}
	
}
