<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kieu_Diem;


class Kieu_DiemController
{
	
	 public function get_all(){
		$array_kieu_diem=Kieu_Diem::get();
		return view('kieu_diem.view_all',compact('array_kieu_diem'));
	}
	 public function insert(){
		
		$max_ma=Kieu_Diem::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('kieu_diem.view_insert',compact('ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		Kieu_Diem::create($rq->all());
		return redirect()->route('kieu_diem.get_all');
	}
	 public function update($ma){
		//$kieu_diem=Kieu_Diem::where('ma','=',$ma)->first();
		$kieu_diem=Kieu_Diem::find($ma);
		return view('kieu_diem.view_update',compact('kieu_diem'));
	}
	 public function process_update($ma,Request $rq){
		Kieu_Diem::find($ma)->update($rq->all());
		
		return redirect()->route('kieu_diem.get_all');
	}
	 public function delete($ma){
		
		Kieu_Diem::destroy($ma);
		return redirect()->route('kieu_diem.get_all');
	}
}
