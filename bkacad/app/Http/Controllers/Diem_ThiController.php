<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemThi;
use App\Models\Khoa;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\NganhHoc;
use App\Models\SinhVien;


class Diem_ThiController
{
	
	 public function get_all($ma){
		$array_khoa=Khoa::get();
	
	
		return view('diem_thi.view_all',compact('array_khoa','ma'));
	}
	public function get_lop(Request $rq){
			$ma_khoa_hoc=$rq->get('ma_khoa_hoc');
            $lops = Lop:: where("ma_khoa_hoc",$ma_khoa_hoc)->get();
            
            return $lops;
           
        
	}
	public function get_mon(Request $rq){
		$ma_lop=$rq->get('ma_lop');
		$ma_nganh_hoc = Lop::where("ma",$ma_lop)->value('ma_nganh_hoc');
		
		$mon_hoc=NganhHoc::with('array_mon_hoc')
		->find($ma_nganh_hoc);
		

		return $mon_hoc->array_mon_hoc;
	   
	
}
public function get_one(Request $rq){
	$array_khoa=Khoa::get();
	$ma_khoa_hoc=1;
	$khoa_hoc = Khoa::where("ma",$ma_khoa_hoc)->value('ten');
	$ma_lop=1;
	$lop = Lop::where("ma",$ma_lop)->value('ten');
	
	$array_diem = DiemThi::with('mon_hoc')->where("ma_sinh_vien",1)->get();
	$diem_chi_tiet=[];
	

	foreach($array_diem as $array)
	{
	
		
		$diem_chi_tiet[$array->ma_sinh_vien][$array->ma_kieu_diem][$array->so_lan][$array->hinh_thuc]=$array->diem;
	
	
	}
	return $diem_chi_tiet;
	return view('diem_thi.view_one',compact('array_diem'));
	

	//
	//$array_sinh_vien= SinhVien::where("ma_lop",$ma_lop)->get();
	
	

	



 
	
	
	
	
	//return view('diem_thi.thong_ke',compact('array_khoa','array_diem','array_sinh_vien','khoa_hoc','lop','mon','diem_chi_tiet'));
	//return view('diem_thi.test',compact('array_khoa','array_sinh_vien','array_diem','khoa_hoc','lop','mon','diem_chi_tiet'));

}
public function process_insert(Request $rq){
	$so_lan=$rq->so_lan;
	if($so_lan==1)
	{
		$array_khoa=Khoa::get();

		$ma_khoa_hoc=$rq->ma_khoa_hoc;
		$khoa_hoc = Khoa::where("ma",$ma_khoa_hoc)->value('ten');
		$ma_lop=$rq->ma_lop;
		$lop = Lop::where("ma",$ma_lop)->value('ten');
		$ma_mon=$rq->ma_mon;
		$mon = MonHoc::where("ma",$ma_mon)->value('ten');
		
		$array_sinh_vien = SinhVien::where("ma_lop",$ma_lop)->get();
		$array_mon_hoc = MonHoc::where("ma",$ma_mon)->get();
		
		
	
		
			$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)->where('so_lan',1)->get();
			return view('diem_thi.view_nhap_diem',compact('array_khoa','array_sinh_vien','array_mon_hoc','khoa_hoc','lop','mon','array_diem'));
		
		
		
	}
	else if($so_lan==2)
	{
		$array_khoa=Khoa::get();

		$ma_khoa_hoc=$rq->ma_khoa_hoc;
		$khoa_hoc = Khoa::where("ma",$ma_khoa_hoc)->value('ten');
		$ma_lop=$rq->ma_lop;
		$lop = Lop::where("ma",$ma_lop)->value('ten');
		$ma_mon=$rq->ma_mon;
		$mon = MonHoc::where("ma",$ma_mon)->value('ten');
		
		

		$array_mon_hoc = MonHoc::where("ma",$ma_mon)->get();
		$check=DiemThi::where("ma_mon_hoc",$ma_mon)->where('so_lan',2)->count();
		
		if($check==0)
		{
			return redirect()->route('diem_thi.insert',['ma'=>1])->with('loi_lan2','Lớp '. $lop . ' -Khóa ' . $khoa_hoc . ' Môn ' . $mon . ' không có học sinh thi lần 2');
		}
		else{
			$array_sinh_vien = SinhVien::join('diem_thi','diem_thi.ma_sinh_vien','sinh_vien.ma')
		->where('diem_thi.so_lan',2)
		->where('diem_thi.ma_mon_hoc',$ma_mon)
        ->select('sinh_vien.ma','sinh_vien.ten','sinh_vien.ngay_sinh')
        ->distinct()
		->get();
		
			$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)->where('so_lan',2)->get();
			
			return view('diem_thi.view_nhap_diem_thi_lai',compact('array_khoa','array_sinh_vien','array_mon_hoc','khoa_hoc','lop','mon','array_diem'));
		}
		
		
	
			
	
	
	
   
	}
}
public function luu_diem(Request $rq){
	$check=DiemThi::where('ma_sinh_vien',$rq->ma_sinh_vien)
	->where('ma_mon_hoc',$rq->ma_mon_hoc)
	->where('ma_kieu_diem',$rq->ma_kieu_diem)
	->where('so_lan',$rq->so_lan)
	->where('hinh_thuc',$rq->hinh_thuc)->count();
	if($check==1)
	{
		DiemThi::where('ma_sinh_vien',$rq->ma_sinh_vien)
	->where('ma_mon_hoc',$rq->ma_mon_hoc)
	->where('ma_kieu_diem',$rq->ma_kieu_diem)
	->where('so_lan',$rq->so_lan)
	->where('hinh_thuc',$rq->hinh_thuc)->update(['diem' => $rq->diem]);
	}
	else{
		DiemThi::create($rq->all());
	}

	
	if($rq->so_lan==1){
		if($rq->diem<5){
			$diem_lan2 = new DiemThi();
			$diem_lan2->ma_sinh_vien = $rq->ma_sinh_vien;
			$diem_lan2->ma_mon_hoc = $rq->ma_mon_hoc;
			$diem_lan2->ma_kieu_diem = $rq->ma_kieu_diem;
			$diem_lan2->so_lan = 2;
			$diem_lan2->hinh_thuc = $rq->hinh_thuc;
		
			$diem_lan2->save();
		}
		elseif($rq->diem>=5){
			DiemThi::where('ma_sinh_vien',$rq->ma_sinh_vien)
		->where('ma_mon_hoc',$rq->ma_mon_hoc)
		->where('ma_kieu_diem',$rq->ma_kieu_diem)
		->where('so_lan',2)
		->where('hinh_thuc',$rq->hinh_thuc)
		->delete();
		}
		

	}
	elseif($rq->so_lan==2)
	{
		
		DiemThi::where('ma_sinh_vien',$rq->ma_sinh_vien)
		->where('ma_mon_hoc',$rq->ma_mon_hoc)
		->where('ma_kieu_diem',$rq->ma_kieu_diem)
		->where('so_lan',2)
		->where('hinh_thuc',$rq->hinh_thuc)
		->update('diem',$rq->diem);
			
		
		
	}

	
}
public function process_thong_ke(Request $rq){
	$array_khoa=Khoa::get();

	$ma_khoa_hoc=$rq->ma_khoa_hoc;
	$khoa_hoc = Khoa::where("ma",$ma_khoa_hoc)->value('ten');
	$ma_lop=$rq->ma_lop;
	$lop = Lop::where("ma",$ma_lop)->value('ten');
	$ma_mon=$rq->ma_mon;
	$mon = MonHoc::where("ma",$ma_mon)->value('ten');
	
	$array_sinh_vien = SinhVien::where("ma_lop",$ma_lop)->get();
	$array_mon_hoc = MonHoc::where("ma",$ma_mon)->get();
	
	$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)->get();
	
	
	
	return view('diem_thi.thong_ke',compact('array_khoa','array_sinh_vien','array_mon_hoc','khoa_hoc','lop','mon','array_diem'));
	//return view('diem_thi.test',compact('array_khoa','array_sinh_vien','array_diem','khoa_hoc','lop','mon','diem_chi_tiet'));

}
	
}
