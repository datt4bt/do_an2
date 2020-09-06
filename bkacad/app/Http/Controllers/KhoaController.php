<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;


class KhoaController
{
	
	 public function get_all(){
		$array_khoa=Khoa::paginate(10);
		return view('khoa.view_all',compact('array_khoa'));
	}
	 public function insert(){
		
	
		
		return view('khoa.view_insert');
	}
	 public function process_insert(Request $rq){
		$check=Khoa::where('ten',$rq->ten)->count();
		
		if($check==1){
			return redirect()->route('khoa.insert')->with('loi_khoa','Tên  bị trùng.Vui lòng thử lại');
		}else{
		Khoa::create($rq->all());
		return redirect()->route('khoa.get_all');}
	}
	 public function update($ma){
		//$khoa=Khoa::where('ma','=',$ma)->first();
		$khoa=Khoa::find($ma);
		return view('khoa.view_update',compact('khoa'));
	}
	 public function process_update($ma,Request $rq){
		$check=Khoa::where('ma',$ma)->first();
		
		if($check->ten==$rq->ten)
		{
			return redirect()->route('khoa.get_all');
		}
		else{
			$check_ten=Khoa::where('ten',$rq->ten)->count();
			
		if($check_ten==1)
		{	
			$khoa=Khoa::find($ma);
			$a=0;
		return view('khoa.view_update',compact('khoa','ma','a'));
			

		}
		else{
			Khoa::find($ma)->update($rq->all());
			return redirect()->route('khoa.get_all');
		}
	
	}
		
	
	}
	 public function delete($ma){
		
		Khoa::destroy($ma);
		return redirect()->route('khoa.get_all');
	}
}
