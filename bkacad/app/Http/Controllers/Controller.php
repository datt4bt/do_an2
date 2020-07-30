<?php

namespace App\Http\Controllers;

class Controller{
	public function tinh_tong($a,$b){
		$tong=$a+$b;
		$hieu=$a-$b;
		$tich=$a*$b;
		$thuong=$a/$b;
		return view('tinh_tong',[
				'tong'=>$tong,
				'hieu'=>$hieu,
				'tich'=>$tich,
				'thuong'=>$thuong
		]);	
	} 
	
}