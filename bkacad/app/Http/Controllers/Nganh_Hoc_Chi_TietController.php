<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\NganhHoc;


class Nganh_Hoc_Chi_TietController
{
	public function get_all(){
		$ma=NganhHoc::min('ma');
			$array=NganhHoc::get();
			
			
			$mon_hoc=NganhHoc::with('array_mon_hoc')
			->find($ma);
			$mon=$mon_hoc->array_mon_hoc;
		return view('nganh_hoc_chi_tiet.view_all',compact('mon','ma','array'));
		return $mon;
	   
		
		//return $nganh_hoc_chi_tiet;
		//return view('nganh_hoc_chi_tiet.view_all',compact('array_nganh_hoc','nganh_hoc_chi_tiet'));
		
   }
   public function insert(){
	$array_nganh_hoc_chi_tiet=NganhHoc::get();
	$array_mon_hoc_chi_tiet=MonHoc::get();
	return view('nganh_hoc_chi_tiet.view_insert',compact('array_nganh_hoc_chi_tiet','array_mon_hoc_chi_tiet'));
}
public function process_insert(Request $rq){
		
	$ma_nganh_hoc=$rq->get('ma_nganh_hoc');
	
	$nganh_hoc=NganhHoc::find($ma_nganh_hoc)->array_mon_hoc()->sync($rq->get('mon_hoc_chi_tiet'));
	return;
	
	
	
}
public function select_nganh(Request $rq){
		$array=NganhHoc::get();
	$ma=$rq->get('ma_nganh_hoc');
	$mon_hoc=NganhHoc::with('array_mon_hoc')
			->find($ma);
			$mon=$mon_hoc->array_mon_hoc;
		return view('nganh_hoc_chi_tiet.view_all',compact('mon','ma','array'));
	
	
	
	
	
}
}
