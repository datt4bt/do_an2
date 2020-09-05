@extends('giao_dien_sinh_vien.index')
@section('content')
<br>
<h3 style="text-align: center" >Bảng điểm sinh viên :{{Session::get('ten_sinh_vien')}}</h3>
<table class="table table-bordered">
<tr>
	<th>Môn học</th>
	<th>Hình thức</th>
	<th>Lần 1</th>
	<th>Lần 2</th>
	<th>Lần 1</th>
	<th>Lần 2</th>
	
</tr>
		@foreach($array_mon as $mon_hoc )
	<tr>
		<td>{{$mon_hoc->ten}}</td>
		<td>{{$mon_hoc->kieu_diem->ten}}</td>
		<td>
			@foreach($array_diem as $diem )
			@if($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==1  &&  $diem->hinh_thuc==1 && $diem->so_lan==1) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
		 
			@elseif($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==2 &&  $diem->hinh_thuc==2 && $diem->so_lan==1) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
			@elseif($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==3 &&  $diem->hinh_thuc==1 && $diem->so_lan==1) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
			@endif
			@endforeach
		</td>
		<td>
			@foreach($array_diem as $diem )
			@if($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==1 &&  $diem->hinh_thuc==1 && $diem->so_lan==2) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
		 
			@elseif($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==2 &&  $diem->hinh_thuc==2 && $diem->so_lan==2) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
			@elseif($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==3 &&  $diem->hinh_thuc==1 && $diem->so_lan==2) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
			@endif
			@endforeach
		</td>
		<td>
			@foreach($array_diem as $diem )
		
			
			@if($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==3 &&  $diem->hinh_thuc==2 && $diem->so_lan==1) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
			@endif
			@endforeach
		</td>
		<td>
			@foreach($array_diem as $diem )
		
			
			@if($diem->ma_mon_hoc==$mon_hoc->ma && $diem->ma_kieu_diem==3 &&  $diem->hinh_thuc==2 && $diem->so_lan==2) 
			{{$diem_chi_tiet[$diem->ma_mon_hoc][$diem->ma_kieu_diem][$diem->hinh_thuc][$diem->so_lan]}} 
			@endif
			@endforeach
		</td>
	
		
	</tr>
			@endforeach
		
	
	

		
	
</table>
@endsection