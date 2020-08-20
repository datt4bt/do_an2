<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemThi;
use App\Models\Khoa;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\NganhHoc;
use App\Models\SinhVien;


class Diem_ThiController
{
	
	 public function get_all(){
		$array_khoa=Khoa::get();
	
	
		return view('diem_thi.view_all',compact('array_khoa'));
	}
	public function get_lop(Request $rq){
			$ma_khoa_hoc=$rq->get('ma_khoa_hoc');
            $lops = Lop:: where("ma_khoa_hoc",$ma_khoa_hoc)->get();
            
            return $lops;
           
        
	}
	public function get_mon(Request $rq){
		$ma_lop=$rq->get('ma_lop');
		$ma_nganh_hoc = Lop::where("ma",$ma_lop)->value('ma_nganh_hoc');
		
		$mon_hoc=NganhHoc::with('array_mon_hoc')
		->find($ma_nganh_hoc);
		
		return $mon_hoc->array_mon_hoc;
	   
	
}
public function process_nhap_diem(Request $rq){
	$array_khoa=Khoa::get();
	$ma_khoa_hoc=$rq->ma_khoa_hoc;
	$khoa_hoc = Khoa::where("ma",$ma_khoa_hoc)->value('ten');
	$ma_lop=$rq->ma_lop;
	$lop = Lop::where("ma",$ma_lop)->value('ten');
	$ma_mon=$rq->ma_mon;
	$mon = MonHoc::where("ma",$ma_mon)->value('ten');
	
	$array_sinh_vien = SinhVien::where("ma_lop",$ma_lop)->get();
	$array_mon_hoc = MonHoc::where("ma",$ma_mon)->get();
	

	
	return view('diem_thi.view_nhap_diem',compact('array_khoa','array_sinh_vien','array_mon_hoc','khoa_hoc','lop','mon'));
   

}
public function luu_diem(Request $rq){
	DiemThi::create($rq->all());
	
   
}
	
}
