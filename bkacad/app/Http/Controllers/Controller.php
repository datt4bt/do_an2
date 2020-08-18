<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Nganh_Hoc;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
    public function index(){
		$array_nganh=Nganh_Hoc::get();
		return view('giao_dien.index',compact('array_nganh'));
	}
	public function login(){
	
		return view('login');
	}
	public function process_login(Request $rq){
		try {
			$admin=Admin::where('ten_dang_nhap',$rq->ten_admin)->where('mat_khau',$rq->mat_khau)->firstOrFail();
		} catch (Exception $e) {
			//throw $th;
		}
	}
}
