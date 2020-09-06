<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KieuDiem;


class Kieu_DiemController
{
	
	 public function get_all(){
		$array_kieu_diem=KieuDiem::paginate(10);
		return view('kieu_diem.view_all',compact('array_kieu_diem'));
	}
	 public function insert(){
		
		$max_ma=KieuDiem::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('kieu_diem.view_insert',compact('ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		$check=KieuDiem::where('ten',$rq->ten)->count();
		
		if($check==1){
			return redirect()->route('kieu_diem.insert')->with('loi_kieu_diem','Tên  bị trùng.Vui lòng thử lại');
		}else{
			KieuDiem::create($rq->all());
		return redirect()->route('kieu_diem.get_all');}
	}
	 public function update($ma){
		//$kieu_diem=KieuDiem::where('ma','=',$ma)->first();
		$kieu_diem=KieuDiem::find($ma);
		return view('kieu_diem.view_update',compact('kieu_diem'));
	}
	 public function process_update($ma,Request $rq){
		$check=KieuDiem::where('ma',$ma)->first();
		
		if($check->ten==$rq->ten)
		{
			return redirect()->route('kieu_diem.get_all');
		}
		else{
			$check_ten=KieuDiem::where('ten',$rq->ten)->count();
			
		if($check_ten==1)
		{	
			$kieu_diem=KieuDiem::find($ma);
			$a=0;
		return view('kieu_diem.view_update',compact('kieu_diem','ma','a'));
			

		}
		else{
			KieuDiem::find($ma)->update($rq->all());
			return redirect()->route('kieu_diem.get_all');
		}
	
	}
	}
	 public function delete($ma){
		
		KieuDiem::destroy($ma);
		return redirect()->route('kieu_diem.get_all');
	}
}
