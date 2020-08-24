<?php

namespace App\Http\Controllers;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\NganhHoc;


class Nganh_HocController
{
	
	 public function get_all(){
		$array_nganh_hoc=NganhHoc::get();
		return view('nganh_hoc.view_all',compact('array_nganh_hoc'));
	}
	 public function insert(){
		$max_ma=NganhHoc::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('nganh_hoc.view_insert',compact('ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		$check=NganhHoc::where('ten',$rq->ten)->count();
		
		if($check==1){
			return redirect()->route('nganh_hoc.insert')->with('loi_nganh_hoc','Tên  bị trùng.Vui lòng thử lại');
		}else{
			NganhHoc::create($rq->all());
		return redirect()->route('nganh_hoc.get_all');}
	}
	 public function update($ma){
		//$nganh_hoc=Nganh_Hoc::where('ma','=',$ma)->first();
		$nganh_hoc=NganhHoc::find($ma);
		return view('nganh_hoc.view_update',compact('nganh_hoc'));
	}
	 public function process_update($ma,Request $rq){
		NganhHoc::find($ma)->update($rq->all());
		
		return redirect()->route('nganh_hoc.get_all');
	}
	 public function delete($ma){
		
		NganhHoc::destroy($ma);
		return redirect()->route('nganh_hoc.get_all');
	}
}
