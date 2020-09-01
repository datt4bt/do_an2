<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Storage;
use Session;
use Exception;

class AccountController
{
	
	public function info_user(){
		
	
		$info_detail=Admin::where('ma',Session::get('ma'))->first();
		return view('account.info_user',compact('info_detail'));
	}
	public function view_update_info(){
		
	
		$info_detail=Admin::where('ma',Session::get('ma'))->first();
		return view('account.view_update_info',compact('info_detail'));
	}
	public function process_update_info(Request $rq){
		if(Session::get('ten')==$rq->ten){
			$check=Admin::where('ma',Session::get('ma'))->first();
			
			if(isset($check->email))
			{
				if($check->email==$rq->email)
			{
				Admin::where('ma',Session::get('ma'))->update(['ten_admin'=>$rq->ten_admin]);
			}
			elseif($rq->email==""){
				Admin::where('ma',Session::get('ma'))->update(['ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
			}
			else{
				$check_email=Admin::where('email',$rq->email)->count();
				if($check_email==1)
			{
				return redirect()->route('account.view_update_info')->with('loi_ten','Tên email bị trùng');
			}
			else{
				Admin::where('ma',Session::get('ma'))->update(['ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
			}}
			}
			else{
				return redirect()->route('home');
			}
		}
		else{
			$check=Admin::where('ma',Session::get('ma'))->first();
			$check_ten=Admin::where('ten',$rq->ten)->first();
			if($check_ten->ten==$rq->ten)
			{
				return redirect()->route('account.view_update_info')->with('loi_ten','Tên đăng nhập bị trùng');
			}
			
			else{
				if($check->email==$rq->email)
				{
					Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin]);
				}
				elseif($rq->email==""){
					Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
				}
				else{
					Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
				}
			}
		
		}
		
			
				
				
				return redirect()->route('account.info_user');
			
	
		
  
		
}
  
   
	 public function insert_anh(){	
		return view('account.view_insert');
	}
	 public function process_insert_anh(Request $rq){
		 
		 $link=Storage::disk('public')->put('anh_dai_dien', $rq->anh);
	Admin::where('ma',Session::get('ma'))
	->update(['anh'=>$link]);
	Session::put('anh',$link);
	return redirect()->route('account.info_user');
	}
	
}
