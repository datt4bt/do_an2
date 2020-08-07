<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kieu_diem;


class Kieu_diemController
{
	
	 public function get_all(){
		$array_kieu_diem=Kieu_diem::get();
		return view('kieu_diem.view_all',compact('array_kieu_diem'));
	}
	 public function insert(){
		
		return view('kieu_diem.view_insert');
	}
	 public function process_insert(Request $rq){
		
		Kieu_diem::create($rq->all());
		return redirect()->route('get_all_kieu_diem');
	}
	 public function update($ma){
		//$kieu_diem=Kieu_diem::where('ma','=',$ma)->first();
		$kieu_diem=Kieu_diem::find($ma);
		return view('kieu_diem.view_update',compact('kieu_diem'));
	}
	 public function process_update($ma,Request $rq){
		Kieu_diem::find($ma)->update($rq->all());
		
		return redirect()->route('get_all_kieu_diem');
	}
	 public function delete($ma){
		
		Kieu_diem::destroy($ma);
		return redirect()->route('get_all_kieu_diem');
	}
}
