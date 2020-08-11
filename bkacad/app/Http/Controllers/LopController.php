<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\Nganh_Hoc;


class LopController
{
	
	 public function get_all(){
		$array_lop=Lop::with('nganh_hoc')->get();
		
		return view('lop.view_all',compact('array_lop'));
	}
	 public function insert(){
		$array_nganh_hoc=Nganh_Hoc::get();
		return view('lop.view_insert',compact('array_nganh_hoc'));
	}
	 public function process_insert(Request $rq){
		
		Lop::create($rq->all());
		return redirect()->route('lop.get_all');
	}
	 public function update($ma){
		//$lop=Lop::where('ma','=',$ma)->first();
		$lop=Lop::find($ma);
		$array_nganh_hoc=Nganh_Hoc::get();
		return view('lop.view_update',compact('lop','array_nganh_hoc'));
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
