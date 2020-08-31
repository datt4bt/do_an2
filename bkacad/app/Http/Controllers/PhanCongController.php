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
		
	$array_admin=Admin::where('ma',1)->get();
	$array_mon_hoc=MonHoc::get();
	$array_lop=Lop::get();
		
		return view('phan_cong.view_insert',compact('array_admin','array_mon_hoc','array_lop'));
	}
	 public function process_insert(Request $rq){
		$check=PhanCong::where('ten',$rq->ten)->count();
		
		if($check==1){
			return redirect()->route('phan_cong.insert')->with('loi_phan_cong','Tên  bị trùng.Vui lòng thử lại');
		}else{
			PhanCong::create($rq->all());
		return redirect()->route('phan_cong.get_all');}
	}
	 public function update($ma){
		//$phan_cong=Khoa::where('ma','=',$ma)->first();
		$phan_cong=PhanCong::find($ma);
		return view('phan_cong.view_update',compact('phan_cong'));
	}
	 public function process_update($ma,Request $rq){
		PhanCong::find($ma)->update($rq->all());
		
		return redirect()->route('phan_cong.get_all');
	}
	 public function delete($ma){
		
		PhanCong::destroy($ma);
		return redirect()->route('phan_cong.get_all');
	}
}
