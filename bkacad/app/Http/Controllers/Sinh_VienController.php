<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\Sinh_Vien;


class Sinh_VienController
{
	
	 public function get_all(){
		$array_sinh_vien=Sinh_Vien::with('lop')->get();
		
		return view('sinh_vien.view_all',compact('array_sinh_vien'));
	}
	 public function insert(){
		$array_lop=Lop::get();
		return view('sinh_vien.view_insert',compact('array_lop'));
	}
	 public function process_insert(Request $rq){
		
		Sinh_Vien::create($rq->all());
		return redirect()->route('sinh_vien.get_all');
	}
	 public function update($ma){
		//$sinh_vien=Sinh_Vien::where('ma','=',$ma)->first();
		$sinh_vien=Sinh_Vien::find($ma);
		$array_lop=Lop::get();
		return view('sinh_vien.view_update',compact('sinh_vien','array_lop'));
	}
	 public function process_update($ma,Request $rq){
		Sinh_Vien::find($ma)->update($rq->all());
		
		return redirect()->route('sinh_vien.get_all');
	}
	 public function delete($ma){
		
		Sinh_Vien::destroy($ma);
		return redirect()->route('sinh_vien.get_all');
	}
}
