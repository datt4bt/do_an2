<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diem_Thi;
use App\Models\Khoa;
use App\Models\Lop;
use App\Models\Mon_Hoc;
use App\Models\Nganh_Hoc;
use App\Models\Nganh_Hoc_Chi_Tiet;

class Diem_ThiController
{
	
	 public function get_all(){
		$array_khoa=Khoa::get();
	
	
		return view('diem_thi.view_all',compact('array_khoa'));
	}
	public function get_lop(Request $rq){
			$ma_khoa_hoc=$rq->get('ma_khoa_hoc');
            $lops = Lop:: where("ma_khoa_hoc",$ma_khoa_hoc)->get();
            
            return $lops;
           
        
	}
	public function get_mon(Request $rq){
		$ma_lop=$rq->get('ma_lop');
		$ma_nganh_hoc = Lop::where("ma",$ma_lop)->value('ma_nganh_hoc');
		
		$mon_hoc=Nganh_Hoc::with('array_mon_hoc')
		->find($ma_nganh_hoc);
		
		return $mon_hoc->array_mon_hoc;
	   
	
}
	 public function insert(){
		
		$max_ma=Diem_Thi::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('diem_thi.view_insert',compact('ma_moi'));
	}
	
	 public function update($ma){
		//$diem_thi=Diem_Thi::where('ma','=',$ma)->first();
		$diem_thi=Diem_Thi::find($ma);
		return view('diem_thi.view_update',compact('diem_thi'));
	}
	 public function process_update($ma,Request $rq){
		Diem_Thi::find($ma)->update($rq->all());
		
		return redirect()->route('diem_thi.get_all');
	}
	 public function delete($ma){
		
		Diem_Thi::destroy($ma);
		return redirect()->route('diem_thi.get_all');
	}
}
