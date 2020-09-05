<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Storage;
use Session;
use Exception;
use App\Models\SinhVien;

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
		
		if(Session::get('ten')==$rq->ten &&  Session::get('email')==$rq->email )
		{
			
			Admin::where('ma',Session::get('ma'))->update(['ten_admin'=>$rq->ten_admin]);
			return redirect()->route('account.info_user');
		}
		elseif(Session::get('ten')==$rq->ten &&  Session::get('email')!=$rq->email ){
			$check_email=Admin::where('email',$rq->email)->count();
			if($check_email==1)
			{
				return redirect()->route('account.view_update_info')->with('loi_ten','Tên email bị trùng');
			}
			else{
				Admin::where('ma',Session::get('ma'))->update(['ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
				Session::put('email',$rq->email);
			}
			
		}
		elseif(Session::get('ten')!=$rq->ten &&  Session::get('email')==$rq->email ){
			$check_ten=Admin::where('ten',$rq->ten)->count();
			if($check_ten==1)
			{
				return redirect()->route('account.view_update_info')->with('loi_ten','Tên email bị trùng');
			}
			else{
				Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin]);
				Session::put('ten',$rq->ten);
			}
			
		}
		elseif(Session::get('ten')!=$rq->ten &&  Session::get('email')!=$rq->email ){
			$check_ten=Admin::where('ten',$rq->ten)->count();
			$check_email=Admin::where('email',$rq->email)->count();
			if($check_ten==1)
			{
				return redirect()->route('account.view_update_info')->with('loi_ten','Tên email bị trùng');
			}
			else{
				if($check_email==1)
				{
					return redirect()->route('account.view_update_info')->with('loi_ten','Tên email bị trùng');
				}
				else{
					Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
					Session::put('ten',$rq->ten);
					Session::put('email',$rq->email);
				}
			}
			
		}
		return redirect()->route('account.info_user');
			//Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
		}
		

		


		//
		public function info_user_sinh_vien(){
		
	
			$info_detail=SinhVien::where('ma',Session::get('ma_sinh_vien'))->first();
			return view('page_sinh_vien.info_user_sinh_vien',compact('info_detail'));
		}
		public function view_update_info_sinh_vien(){
		
	
			$info_detail=SinhVien::where('ma',Session::get('ma_sinh_vien'))->first();
			return view('page_sinh_vien.view_update_info_sinh_vien',compact('info_detail'));
		}
		public function process_update_info_sinh_vien(Request $rq){
		
			if(Session::get('sdt')==$rq->sdt &&  Session::get('email_sinh_vien')==$rq->email )
			{
				
				SinhVien::where('ma',Session::get('ma_sinh_vien'))
				->update([
					'ten'=>$rq->ten,
					'gioi_tinh'=>$rq->gioi_tinh,
					'ngay_sinh'=>$rq->ngay_sinh,
					'dia_chi'=>$rq->dia_chi,
					
					]);
				return redirect()->route('sv.info_user_sinh_vien');
			}
			elseif(Session::get('sdt')==$rq->sdt &&  Session::get('email_sinh_vien')!=$rq->email ){
				$check_email=SinhVien::where('email',$rq->email)->count();
				if($check_email==1)
				{
					return redirect()->route('sv.view_update_info_sinh_vien')->with('loi_ten','Tên email bị trùng');
				}
				else{
					SinhVien::where('ma',Session::get('ma_sinh_vien'))
					->update([
						'ten'=>$rq->ten,
					'gioi_tinh'=>$rq->gioi_tinh,
					'ngay_sinh'=>$rq->ngay_sinh,
					'dia_chi'=>$rq->dia_chi,
					'email'=>$rq->email,

						]);
					Session::put('email_sinh_vien',$rq->email);
				}
				
			}
			elseif(Session::get('sdt')!=$rq->sdt &&  Session::get('email_sinh_vien')==$rq->email ){
				$check_sdt=SinhVien::where('sdt',$rq->sdt)->count();
				if($check_sdt==1)
				{
					return redirect()->route('sv.view_update_info_sinh_vien')->with('loi_ten','Tên email bị trùng');
				}
				else{
					SinhVien::where('ma',Session::get('ma_sinh_vien'))->update([
						'ten'=>$rq->ten,
						'gioi_tinh'=>$rq->gioi_tinh,
						'ngay_sinh'=>$rq->ngay_sinh,
						'sdt'=>$rq->sdt,
						'dia_chi'=>$rq->dia_chi,
						
						]);
					Session::put('sdt',$rq->sdt);
				}
				
			}
			elseif(Session::get('sdt')!=$rq->sdt &&  Session::get('email_sinh_vien')!=$rq->email ){
				$check_sdt=SinhVien::where('sdt',$rq->sdt)->count();
				$check_email=SinhVien::where('email',$rq->email)->count();
				if($check_sdt==1)
				{
					return redirect()->route('sv.view_update_info_sinh_vien')->with('loi_ten','Tên email bị trùng');
				}
				else{
					if($check_email==1)
					{
						return redirect()->route('sv.view_update_info_sinh_vien')->with('loi_ten','Tên email bị trùng');
					}
					else{
						SinhVien::where('ma',Session::get('ma_sinh_vien'))->update([
							'ten'=>$rq->ten,
						'gioi_tinh'=>$rq->gioi_tinh,
						'ngay_sinh'=>$rq->ngay_sinh,
						'sdt'=>$rq->sdt,
						'dia_chi'=>$rq->dia_chi,
						'email'=>$rq->email,

							]);
						Session::put('sdt',$rq->sdt);
						Session::put('email_sinh_vien',$rq->email);
					}
				}
				
			}
			return redirect()->route('sv.info_user_sinh_vien');
				//Admin::where('ma',Session::get('ma'))->update(['ten'=>$rq->ten,'ten_admin'=>$rq->ten_admin,'email'=>$rq->email]);
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
