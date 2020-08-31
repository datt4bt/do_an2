<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController
{
	
	 public function get_all(){
		$array_admin=Admin::get();
		return view('admin.view_all',compact('array_admin'));
	}
	 public function insert(){
		
		$max_ma=Admin::max('ma');
		$ma_moi=$max_ma+1;
		
		return view('admin.view_insert',compact('ma_moi'));
	}
	 public function process_insert(Request $rq){
		$check=Admin::where('ten',$rq->ten)->count();
		
		if($check==1){
			return redirect()->route('admin.insert')->with('loi','Tên đăng nhập bị trùng.Vui lòng thử lại');
		}else{
			if($rq->email=="")
			{
				Admin::create($rq->all());
			return redirect()->route('admin.get_all');
			}
			else{
				$check_email=Admin::where('email',$rq->email)->count();
				if($check_email==1){
					return redirect()->route('admin.insert')->with('email','Email bị trùng.Vui lòng thử lại');
				}else{
				Admin::create($rq->all());
				return redirect()->route('admin.get_all');
			}
			
		}}
		
	}
	 public function update($ma){
		//$admin=Admin::where('ma','=',$ma)->first();
		$admin=Admin::find($ma);
		return view('admin.view_update',compact('admin'));
	}
	 public function process_update($ma,Request $rq){
		Admin::find($ma)->update($rq->all());
		
		return redirect()->route('admin.get_all');
	}
	 public function delete($ma){
		$admin=Admin::find($ma);
		if($admin->cap_do==0){
			return redirect()->route('admin.get_all')->with('error','d') ;
		}
		else{
			Admin::destroy($ma);
		return redirect()->route('admin.get_all');
		}
		
	}
}
