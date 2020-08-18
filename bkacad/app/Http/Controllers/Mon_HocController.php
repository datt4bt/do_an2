<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\KieuDiem;


class Mon_HocController
{
	
	 public function get_all(){
		$array_mon_hoc=MonHoc::with('kieu_diem')->get();
		
		return view('mon_hoc.view_all',compact('array_mon_hoc'));
	}
	 public function insert(){
		$max_ma=MonHoc::max('ma');
		$ma_moi=$max_ma+1;
		$array_kieu_diem=KieuDiem::get();
		return view('mon_hoc.view_insert',compact('array_kieu_diem','ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		MonHoc::create($rq->all());
		return redirect()->route('mon_hoc.get_all');
	}
	 public function update($ma){
		//$mon_hoc=Mon_Hoc::where('ma','=',$ma)->first();
		$mon_hoc=MonHoc::find($ma);
		$array_kieu_diem=KieuDiem::get();
		return view('mon_hoc.view_update',compact('mon_hoc','array_kieu_diem'));
	}
	 public function process_update($ma,Request $rq){
		MonHoc::find($ma)->update($rq->all());
		
		return redirect()->route('mon_hoc.get_all');
	}
	 public function delete($ma){
		
		MonHoc::destroy($ma);
		return redirect()->route('mon_hoc.get_all');
	}
}
