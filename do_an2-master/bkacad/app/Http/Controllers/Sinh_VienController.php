<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\SinhVien;


class Sinh_VienController
{
	
	 public function get_all(){
		$array_sinh_vien=SinhVien::with('lop')->get();
		
		return view('sinh_vien.view_all',compact('array_sinh_vien'));
	}
	 public function insert(){
		$max_ma=SinhVien::max('ma');
		$ma_moi=$max_ma+1;
		$array_lop=Lop::get();
		return view('sinh_vien.view_insert',compact('array_lop','ma_moi'));
	}
	 public function process_insert(Request $rq){
		
		SinhVien::create($rq->all());
		return redirect()->route('sinh_vien.get_all');
	}
	 public function update($ma){
		//$sinh_vien=SinhVien::where('ma','=',$ma)->first();
		$sinh_vien=SinhVien::find($ma);
		$array_lop=Lop::get();
		return view('sinh_vien.view_update',compact('sinh_vien','array_lop'));
	}
	 public function process_update($ma,Request $rq){
		SinhVien::find($ma)->update($rq->all());
		
		return redirect()->route('sinh_vien.get_all');
	}
	 public function delete($ma){
		
		SinhVien::destroy($ma);
		return redirect()->route('sinh_vien.get_all');
	}
}
