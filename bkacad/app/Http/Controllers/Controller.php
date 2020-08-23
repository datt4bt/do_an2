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


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
    public function index(){
		
		return view('giao_dien.index');
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
	public function process_login(Request $rq){
		try {
			$admin=Admin::where('ten',$rq->ten_admin)->where('mat_khau',$rq->mat_khau)->firstOrFail();
		} catch (Exception $e) {
			return redirect()->route('login')->with('error','Lỗi đăng nhập');
		}
		Session::put('ma',$admin->ma);
		Session::put('ten',$admin->ten);
		Session::put('anh',$admin->anh);
		Session::put('cap_do',$admin->cap_do);
		return redirect()->route('home');
	}
	public function logout(){
		Session::flush();
		return redirect()->route('login')->with('error','Đăng xuất thành công');
	}
}
