<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\NganhHoc;
use App\Models\Khoa;


class LopController
{
	
	 public function get_all(){
		$array_nganh_hoc=NganhHoc::get();
		$array_khoa_hoc=Khoa::get();
		return view('lop.view_all',compact('array_nganh_hoc','array_khoa_hoc'));
	}
	public function get_one(Request $rq){
		$array_nganh_hoc=NganhHoc::get();
		$array_khoa_hoc=Khoa::get();
		$array_lop=Lop::with('nganh_hoc')->with('khoa')->where('ma_nganh_hoc',$rq->ma_nganh_hoc)->where('ma_khoa_hoc',$rq->ma_khoa_hoc)->get();
		
		
		return view('lop.view_one',compact('array_lop','array_nganh_hoc','array_khoa_hoc'));
	}
	 public function insert(){
		$array_nganh_hoc=NganhHoc::get();
		$array_khoa_hoc=Khoa::get();
		return view('lop.view_insert',compact('array_nganh_hoc','array_khoa_hoc'));
	}
	 public function process_insert(Request $rq){
		$check=Lop::where('ten',$rq->ten)->count();
		
		if($check==1){
			return redirect()->route('lop.insert')->with('loi_lop','Tên  bị trùng.Vui lòng thử lại');
		}else{
		Lop::create($rq->all());
		
		return redirect()->route('lop.get_all');
		}
	}
	 public function update($ma){
		//$lop=Lop::where('ma','=',$ma)->first();
		$lop=Lop::find($ma);
		$array_nganh_hoc=NganhHoc::get();
		$array_khoa_hoc=Khoa::get();
		return view('lop.view_update',compact('lop','array_nganh_hoc','array_khoa_hoc'));
	}
	 public function process_update($ma,Request $rq){
		Lop::find($ma)->update($rq->all());
		
		return redirect()->route('lop.get_all');
	}
	 public function delete($ma){
		
		Lop::destroy($ma);
		return redirect()->route('lop.get_all');
	}
}
