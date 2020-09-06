<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\NganhHoc;
use App\Models\Admin;
use Exception;
use Session;
use App\Models\SinhVien;

use App\Models\Khoa;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\KieuDiem;




class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
    public function index(){
		$hinh_thuc=KieuDiem::count();
		$khoa_hoc=Khoa::count();
		$lop_hoc=Lop::count();
		$nganh_hoc=NganhHoc::count();
		$mon_hoc=MonHoc::count();
		$sinh_vien=SinhVien::count();
		$giao_vu=Admin::where('cap_do',0)->count();
		$giao_vien=Admin::where('cap_do',1)->count();
		
		return view('giao_dien.home',compact('khoa_hoc','lop_hoc','nganh_hoc','mon_hoc','sinh_vien','hinh_thuc','giao_vu','giao_vien'));
	}
	public function tim_kiem(Request $rq){
		$tim_kiem = $rq->tim_kiem;
		$array_lop = Lop::where('ten','like',"%$tim_kiem%")->with('khoa')->with('nganh_hoc')->paginate(10);
		$array_sinh_vien = SinhVien::where('ten','like',"%$tim_kiem%")->with('lop')->paginate(10);


		return view('tim_kiem',compact('tim_kiem','array_lop','array_sinh_vien'));
		
	}
	public function index_sinh_vien(){
		
		return view('giao_dien_sinh_vien.index');
	}
	public function login(){
	
		if (Session::has('ma'))
		{
			return redirect()->route('home');
		}
		else{
			return view('login');
		}
		
	}
	public function login_sinh_vien(){
	
		
			return view('login_sinh_vien');
		
		
	}
	public function process_login(Request $rq){
		try {
			$admin=Admin::where('ten',$rq->ten_admin)->where('mat_khau',$rq->mat_khau)->firstOrFail();
		} catch (Exception $e) {
			return redirect()->route('login')->with('error','Lỗi đăng nhập');
		}
		Session::put('ma',$admin->ma);
		Session::put('ten',$admin->ten);
		Session::put('email',$admin->email);
		Session::put('anh',$admin->anh);
		Session::put('cap_do',$admin->cap_do);
		return redirect()->route('home');
	}
	public function logout(){
		Session::flush();
		return redirect()->route('login')->with('error','Đăng xuất thành công');
	}
	
	public function process_login_sinh_vien(Request $rq){
		try {
			$sinh_vien=SinhVien::where('ma',$rq->ma_sinh_vien)->where('ngay_sinh',$rq->ngay_sinh)->firstOrFail();
		} catch (Exception $e) {
			return redirect()->route('login_sinh_vien')->with('error','Lỗi đăng nhập');
		}
		Session::put('ma_sinh_vien',$sinh_vien->ma);
		Session::put('ten_sinh_vien',$sinh_vien->ten);
		Session::put('sdt',$sinh_vien->sdt);
		Session::put('email_sinh_vien',$sinh_vien->email);
		
	
		return redirect()->route('sv.view_diem_tung_sinh_vien');
	}
	public function logout_sinh_vien(){
		Session::flush();
		return redirect()->route('login_sinh_vien')->with('error','Đăng xuất thành công');
	}
}
