<?php

namespace App\Http\Controllers;
use App\Imports\SinhVienImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\DiemThi;
use App\Models\SinhVien;


class Sinh_VienController
{
	
	 public function get_all(){
	
		$array_khoa=Khoa::get();
			  
		
		return view('sinh_vien.view_all',compact('array_khoa'));
	} 
	public function get_one(Request $rq){
		$array_sinh_vien=SinhVien::where('ma_lop',$rq->ma_lop)->paginate(10);
		
			  $info=Lop::with('khoa')->with('nganh_hoc')->where('ma',$rq->ma_lop)->first();
			  $array_khoa=Khoa::get();
		
		
		return view('sinh_vien.view_one',compact('array_khoa','info','array_sinh_vien'));
	}
	 public function insert(){
		$max_ma=SinhVien::max('ma');
		$ma_moi=$max_ma+1;
		
		$array_lop=Lop::get();
		return view('sinh_vien.view_insert',compact('array_lop','ma_moi'));
	}
	public function insert_excel(){
	
		return view('sinh_vien.view_insert_excel');
	}
	public function process_insert_excel(Request $rq){
		$sinh_vien=new SinhVienImport;
		Excel::import($sinh_vien, $rq->file_excel);
		
		return redirect()->route('sinh_vien.get_all');
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
	public function view_diem($ma){
		$array_mon=MonHoc::with('kieu_diem')->get();
	$array_diem=DiemThi::where("ma_sinh_vien",$ma)->with('sinh_vien')->get();
	$sinh_vien=SinhVien::where("ma",$ma)->with('lop')->first();
	$diem_chi_tiet=[];
	foreach($array_diem as $array)
			{
			
				
				$diem_chi_tiet[$array->ma_mon_hoc][$array->ma_kieu_diem][$array->hinh_thuc][$array->so_lan]=$array->diem;
			
			
			}
	
	
		return view('sinh_vien.view_diem',compact('diem_chi_tiet','array_diem','array_mon','sinh_vien'));
	}
}
