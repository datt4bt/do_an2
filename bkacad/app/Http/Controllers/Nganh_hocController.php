<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nganh_hoc;


class Nganh_hocController
{
	
	 public function get_all(){
		$array_nganh_hoc=Nganh_hoc::get();
		return view('nganh_hoc.view_all',compact('array_nganh_hoc'));
	}
	 public function insert(){
		
		return view('nganh_hoc.view_insert');
	}
	 public function process_insert(Request $rq){
		
		Nganh_hoc::create($rq->all());
		return redirect()->route('get_all_nganh_hoc');
	}
	 public function update($ma){
		//$nganh_hoc=Nganh_hoc::where('ma','=',$ma)->first();
		$nganh_hoc=Nganh_hoc::find($ma);
		return view('nganh_hoc.view_update',compact('nganh_hoc'));
	}
	 public function process_update($ma,Request $rq){
		Nganh_hoc::find($ma)->update($rq->all());
		
		return redirect()->route('get_all_nganh_hoc');
	}
	 public function delete($ma){
		
		Nganh_hoc::destroy($ma);
		return redirect()->route('get_all_nganh_hoc');
	}
}
