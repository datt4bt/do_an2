<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemThi;
use App\Models\Khoa;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\NganhHoc;
use App\Models\SinhVien;
use App\Models\PhanCong;
use Session;


class Diem_ThiController
{
	
	 public function get_all($ma){
		$array_khoa=Khoa::get();
	
	
		return view('diem_thi.view_all',compact('array_khoa','ma'));
	}
	public function insert(){
		$array_lop = PhanCong::where('ma_admin',Session::get('ma'))
			
		->join('lop','lop.ma','phan_cong.ma_lop_hoc')
		
        ->select('lop.ma','lop.ten')
        ->distinct()
		->get();
		$array_mon = PhanCong::where('ma_admin',Session::get('ma'))
        ->join('mon_hoc','mon_hoc.ma','phan_cong.ma_mon_hoc')
        ->select('mon_hoc.ma','mon_hoc.ten')
        ->distinct()
		->get();
		$check_mon = PhanCong::where('ma_admin',Session::get('ma'))
        ->join('mon_hoc','mon_hoc.ma','phan_cong.ma_mon_hoc')
        ->select('mon_hoc.ma','mon_hoc.ten')
        ->distinct()
		->count();
		$check_lop = PhanCong::where('ma_admin',Session::get('ma'))
			
		->join('lop','lop.ma','phan_cong.ma_lop_hoc')
		
        ->select('lop.ma','lop.ten')
        ->distinct()
		->count();

		if($check_lop==0 || $check_mon==0)
	 {
		return redirect()->route('home')->with('loi_insert','Thông tin phân công đã tồn tại,vui lòng thử lại');
	 }
	 else{
		return view('diem_thi.view_insert',compact('array_lop','array_mon'));

	 }
		
	   
	
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
	$array_lop = PhanCong::where('ma_admin',Session::get('ma'))
			
		->join('lop','lop.ma','phan_cong.ma_lop_hoc')
		
        ->select('lop.ma','lop.ten')
        ->distinct()
		->get();
		$array_mon = PhanCong::where('ma_admin',Session::get('ma'))
        ->join('mon_hoc','mon_hoc.ma','phan_cong.ma_mon_hoc')
        ->select('mon_hoc.ma','mon_hoc.ten')
        ->distinct()
        ->get();

	$so_lan=$rq->so_lan;
	if($so_lan==1)
	{
		

		
		$ma_lop=$rq->ma_lop;
		$lop_hoc = Lop::where("ma",$ma_lop)->value('ten');
		$ma_mon=$rq->ma_mon;
		$mon_hoc = MonHoc::where("ma",$ma_mon)->value('ten');
		
		$array_sinh_vien = SinhVien::where("ma_lop",$ma_lop)->get();
		$array_mon_hoc = MonHoc::where("ma",$ma_mon)->get();
		
		
	
		
			$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)->where('so_lan',1)->get();
			return view('diem_thi.view_nhap_diem',compact('array_sinh_vien','array_mon_hoc','lop_hoc','mon_hoc','array_diem','array_lop','array_mon'));
		
		
		
	}
	else if($so_lan==2)
	{
	

		
		$ma_lop=$rq->ma_lop;
		$lop_hoc = Lop::where("ma",$ma_lop)->value('ten');
		$ma_mon=$rq->ma_mon;
		$mon_hoc = MonHoc::where("ma",$ma_mon)->value('ten');
		
		

		$array_mon_hoc = MonHoc::where("ma",$ma_mon)->get();
		$check=DiemThi::where("ma_mon_hoc",$ma_mon)->where('so_lan',2)->count();
		
		if($check==0)
		{
			return redirect()->route('diem_thi.insert')->with('loi_lan2','Lớp '. $lop_hoc .  ' Môn ' . $mon_hoc . ' không có học sinh thi lần 2');
		}
		else{
			$array_sinh_vien = SinhVien::join('diem_thi','diem_thi.ma_sinh_vien','sinh_vien.ma')
		->where('diem_thi.so_lan',2)
		->where('diem_thi.ma_mon_hoc',$ma_mon)
        ->select('sinh_vien.ma','sinh_vien.ten','sinh_vien.ngay_sinh')
        ->distinct()
		->get();
		
			$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)->where('so_lan',2)->get();
			
			return view('diem_thi.view_nhap_diem_thi_lai',compact('array_sinh_vien','array_mon_hoc','lop_hoc','mon_hoc','array_diem','array_lop','array_mon'));
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
			$diem_lan2->diem = 0;
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
		->update(['diem'=>$rq->diem]);
			
		
		
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
public function thong_ke_diem_thi(Request $rq){
	$kieu=$rq->kieu_thong_ke;
	if($kieu==1)
	{
		$array_khoa=Khoa::get();
	
		$ma_khoa_hoc=$rq->ma_khoa_hoc;
		$khoa_hoc = Khoa::where("ma",$ma_khoa_hoc)->value('ten');
		$ma_lop=$rq->ma_lop;
		$lop = Lop::where("ma",$ma_lop)->value('ten');
		$array_sinh_vien = SinhVien::where("ma_lop",$ma_lop)->get();
		
		$array_mon_hoc = MonHoc::get();
		$diem_chi_tiet=[];
	

		
		$check=DiemThi::count();
		if($check==0)
		{
			return redirect()->route('diem_thi.thong_ke', ['ma'=>3])->with('loi_thong_ke','Lớp '. $lop . ' -Khóa ' . $khoa_hoc . ' không có Sinh viên nào được nhập điểm');
		}
		else{
			$array_diem=DiemThi::with('mon_hoc')->get();
			foreach($array_diem as $array)
			{
			
				
				$diem_chi_tiet[$array->ma_sinh_vien][$array->ma_mon_hoc][$array->ma_kieu_diem][$array->hinh_thuc][$array->so_lan]=$array->diem;
			
			
			}
		
		return view('diem_thi.thong_ke_tat_ca',compact('array_khoa','array_sinh_vien','khoa_hoc','lop','array_diem','kieu','array_mon_hoc','diem_chi_tiet'));
		
		}
	
	}
	else if($kieu==2)
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
		
		
		
		$check=DiemThi::where("ma_mon_hoc",$ma_mon)
		->where('so_lan',1)
		->where('diem','<',5)
		->count();
		if($check==0)
		{
			return redirect()->route('diem_thi.thong_ke', ['ma'=>3])->with('loi_thong_ke','Lớp '. $lop . ' -Khóa ' . $khoa_hoc . ' Môn ' . $mon . ' không có Sinh viên thi lần 2');
		}
		else{
			$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)
			->where('so_lan',1)
			->where('diem','<',5)
			->get();
		return view('diem_thi.thong_ke_sinh_vien',compact('array_khoa','array_sinh_vien','array_mon_hoc','khoa_hoc','lop','mon','array_diem','kieu'));
		//return view('diem_thi.test',compact('array_khoa','array_sinh_vien','array_diem','khoa_hoc','lop','mon','diem_chi_tiet'));
		}

	}
	else if($kieu==3)
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
		
		
		
		$check=DiemThi::where("ma_mon_hoc",$ma_mon)
		->where('so_lan',2)
		->where('diem','<',5)
		->count();
		if($check==0)
		{
			return redirect()->route('diem_thi.thong_ke', ['ma'=>3])->with('loi_thong_ke_hoc_lai','Lớp '. $lop . ' -Khóa ' . $khoa_hoc . ' Môn ' . $mon . ' không có Sinh viên học lại');
		}
		else{
			$array_diem=DiemThi::where("ma_mon_hoc",$ma_mon)
			->where('so_lan',2)
			->where('diem','<',5)
			->get();
			
		return view('diem_thi.sinh_vien_hoc_lai',compact('array_khoa','array_sinh_vien','array_mon_hoc','khoa_hoc','lop','mon','array_diem','kieu'));
		//return view('diem_thi.test',compact('array_khoa','array_sinh_vien','array_diem','khoa_hoc','lop','mon','diem_chi_tiet'));
		}
	}
}
public function view_diem_tung_sinh_vien(){

	$array_mon=MonHoc::with('kieu_diem')->get();
	$array_diem=DiemThi::where("ma_sinh_vien",Session::get('ma_sinh_vien'))->with('sinh_vien')->get();
	
	$diem_chi_tiet=[];
	foreach($array_diem as $array)
			{
			
				
				$diem_chi_tiet[$array->ma_mon_hoc][$array->ma_kieu_diem][$array->hinh_thuc][$array->so_lan]=$array->diem;
			
			
			}
	
	return view('page_sinh_vien.view_all',compact('diem_chi_tiet','array_diem','array_mon'));
	//return view('diem_thi.test',compact('array_khoa','array_sinh_vien','array_diem','khoa_hoc','lop','mon','diem_chi_tiet'));


}
	
}
