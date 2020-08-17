<?php

namespace App\Http\Controllers;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\Nganh_Hoc;


class Nganh_HocController
{
	
	 public function get_all(){
		$array_nganh_hoc=Nganh_Hoc::get();
		return view('nganh_hoc.view_all',compact('array_nganh_hoc'));
	}
	 public function insert(){
		$max_ma=Nganh_Hoc::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('nganh_hoc.view_insert',compact('ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		Nganh_Hoc::create($rq->all());
		return redirect()->route('nganh_hoc.get_all');
	}
	 public function update($ma){
		//$nganh_hoc=Nganh_Hoc::where('ma','=',$ma)->first();
		$nganh_hoc=Nganh_Hoc::find($ma);
		return view('nganh_hoc.view_update',compact('nganh_hoc'));
	}
	 public function process_update($ma,Request $rq){
		Nganh_Hoc::find($ma)->update($rq->all());
		
		return redirect()->route('nganh_hoc.get_all');
	}
	 public function delete($ma){
		
		Nganh_Hoc::destroy($ma);
		return redirect()->route('nganh_hoc.get_all');
	}
}
