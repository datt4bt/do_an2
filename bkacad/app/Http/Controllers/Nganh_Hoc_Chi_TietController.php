<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mon_Hoc;
use App\Models\Nganh_Hoc;
use App\Nganh_Hoc_Chi_Tiet;

class Nganh_Hoc_Chi_TietController
{
	public function get_all($ma){
		$array_nganh_hoc_chi_tiet=Nganh_Hoc_Chi_Tiet::where('ma_nganh_hoc','=',$ma);
		
		//dd($array_nganh_hoc_chi_tiet);
   }
   public function insert(){
	$array_nganh_hoc_chi_tiet=Nganh_Hoc::get();
	$array_mon_hoc_chi_tiet=Mon_Hoc::get();
	return view('nganh_hoc_chi_tiet.view_insert',compact('array_nganh_hoc_chi_tiet','array_mon_hoc_chi_tiet'));
}
public function process_insert(Request $rq){
		
	$ma_nganh_hoc=$rq->get('ma_nganh_hoc');
	
	$nganh_hoc=Nganh_Hoc::find($ma_nganh_hoc)->array_nganh_hoc()->sync($rq->get('mon_hoc_chi_tiet'));
	
	
	
}
}
