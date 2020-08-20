<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\NganhHoc;


class Nganh_Hoc_Chi_TietController
{
	public function get_all(){
		$array_nganh_hoc=NganhHoc::get();
	
			$min_ma=NganhHoc::min('ma');
			
			//$nganh_hoc_chi_tiet=Nganh_Hoc_Chi_Tiet::where('ma_nganh_hoc','=',$min_ma);
		
		
		return view('nganh_hoc_chi_tiet.view_all',compact('array_nganh_hoc','nganh_hoc_chi_tiet'));
		
   }
   public function insert(){
	$array_nganh_hoc_chi_tiet=NganhHoc::get();
	$array_mon_hoc_chi_tiet=MonHoc::get();
	return view('nganh_hoc_chi_tiet.view_insert',compact('array_nganh_hoc_chi_tiet','array_mon_hoc_chi_tiet'));
}
public function process_insert(Request $rq){
		
	$ma_nganh_hoc=$rq->get('ma_nganh_hoc');
	
	$nganh_hoc=NganhHoc::find($ma_nganh_hoc)->array_mon_hoc()->sync($rq->get('mon_hoc_chi_tiet'));
	
	
	
}
}
