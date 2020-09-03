<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\PhanCong;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\Khoa;

class PhanCongController
{
	
	 public function get_all(){
		$array_khoa=Khoa::get();
	
	
		return view('phan_cong.view_all',compact('array_khoa'));
	}
	public function get_lop(Request $rq){
		$ma_khoa_hoc=$rq->get('ma_khoa_hoc');
		$lops = Lop:: where("ma_khoa_hoc",$ma_khoa_hoc)->get();
		
		return $lops;
	   
	
}
public function process_get_all(Request $rq){
		$array_lop=PhanCong::where('ma_lop_hoc',$rq->ma_lop)->with('admin')->with('mon_hoc')->with('lop')->get();
		
		$array_khoa=Khoa::get();
		$lop=Lop::where('ma',$rq->ma_lop)->with('khoa')->first();
	return view('phan_cong.view_phan_cong',compact('array_lop','array_khoa','lop'));
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

	}
	return redirect()->route('phan_cong.insert')->with('thanh_cong','Thông hử lại');
}
public function update($ma_lop,$ma_mon,$ma_admin){
	//$khoa=Khoa::where('ma','=',$ma)->first();
	$lop_hoc=Lop::where('ma',$ma_lop)->first();
	$mon_hoc=MonHoc::where('ma',$ma_mon)->first();
	$array_admin=Admin::where('cap_do',1)->get();
	$array_ma=PhanCong::where('ma_lop_hoc',$ma_lop)->where('ma_mon_hoc',$ma_mon)->get();
	return view('phan_cong.view_update',compact('array_admin','lop_hoc','mon_hoc','ma_admin','array_ma'));
}
 public function process_update(Request $rq){
	PhanCong::where('ma_lop_hoc',$rq->ma_lop)->where('ma_mon_hoc',$rq->ma_mon)->where('ma_admin',$rq->ma_admin)->delete();
	PhanCong::insert([
		'ma_lop_hoc' => $rq->ma_lop,
		'ma_mon_hoc' => $rq->ma_mon,
	
		'ma_admin' => $rq->ma_admin_moi
	]);
	
	return redirect()->route('phan_cong.get_all');
}
 public function delete($ma_lop,$ma_mon,$ma_admin){
	
	PhanCong::where('ma_lop_hoc',$ma_lop)->where('ma_mon_hoc',$ma_mon)->where('ma_admin',$ma_admin)->delete();
	return redirect()->route('phan_cong.get_all');
}

	
}
