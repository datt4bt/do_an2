<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;


class KhoaController
{
	
	 public function get_all(){
		$array_khoa=Khoa::get();
		return view('khoa.view_all',compact('array_khoa'));
	}
	 public function insert(){
		
		$max_ma=Khoa::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('khoa.view_insert',compact('ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		Khoa::create($rq->all());
		return redirect()->route('khoa.get_all');
	}
	 public function update($ma){
		//$khoa=Khoa::where('ma','=',$ma)->first();
		$khoa=Khoa::find($ma);
		return view('khoa.view_update',compact('khoa'));
	}
	 public function process_update($ma,Request $rq){
		Khoa::find($ma)->update($rq->all());
		
		return redirect()->route('khoa.get_all');
	}
	 public function delete($ma){
		
		Khoa::destroy($ma);
		return redirect()->route('khoa.get_all');
	}
}
