<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mon_Hoc;
use App\Models\Kieu_Diem;


class Mon_HocController
{
	
	 public function get_all(){
		$array_mon_hoc=Mon_Hoc::with('kieu_diem')->get();
		
		return view('mon_hoc.view_all',compact('array_mon_hoc'));
	}
	 public function insert(){
		$array_kieu_diem=Kieu_Diem::get();
		return view('mon_hoc.view_insert',compact('array_kieu_diem'));
	}
	 public function process_insert(Request $rq){
		
		Mon_Hoc::create($rq->all());
		return redirect()->route('mon_hoc.get_all');
	}
	 public function update($ma){
		//$mon_hoc=Mon_Hoc::where('ma','=',$ma)->first();
		$mon_hoc=Mon_Hoc::find($ma);
		$array_kieu_diem=Kieu_Diem::get();
		return view('mon_hoc.view_update',compact('mon_hoc','array_kieu_diem'));
	}
	 public function process_update($ma,Request $rq){
		Mon_Hoc::find($ma)->update($rq->all());
		
		return redirect()->route('mon_hoc.get_all');
	}
	 public function delete($ma){
		
		Mon_Hoc::destroy($ma);
		return redirect()->route('mon_hoc.get_all');
	}
}
