<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\NganhHoc;
use App\Models\Khoa;


class LopController
{
	
	 public function get_all(){
		$array_lop=Lop::with('nganh_hoc')->get();
		$array_khoa=Lop::with('khoa')->get();
		
		return view('lop.view_all',compact('array_lop','array_khoa'));
	}
	 public function insert(){
		$array_nganh_hoc=NganhHoc::get();
		$array_khoa_hoc=Khoa::get();
		return view('lop.view_insert',compact('array_nganh_hoc','array_khoa_hoc'));
	}
	 public function process_insert(Request $rq){
		$so_lop=$rq->so_lop;
		for ($i=1; $i <=$so_lop ; $i++) { 
			
		
			$lop = new Lop();
		
			if ($rq->ma_khoa_hoc==1) {
				$lop->ten = "LT$i";
			}
			else{
				$lop->ten = "QT$i";
			}
			
			$lop->ma_nganh_hoc = $rq->ma_nganh_hoc;
			$lop->ma_khoa_hoc = $rq->ma_khoa_hoc;
			$lop->save();
			
		}
		
		return redirect()->route('lop.get_all');
	}
	 public function update($ma){
		//$lop=Lop::where('ma','=',$ma)->first();
		$lop=Lop::find($ma);
		$array_nganh_hoc=NganhHoc::get();
		$array_khoa_hoc=Khoa::get();
		return view('lop.view_update',compact('lop','array_nganh_hoc','array_khoa_hoc'));
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
