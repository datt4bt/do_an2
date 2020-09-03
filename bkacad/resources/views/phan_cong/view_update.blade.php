
@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Sửa thông tin Phân công Lớp:{{$lop_hoc->ten}}-Môn:{{$mon_hoc->ten}}</h2>
<form action="{{ route('phan_cong.process_update') }}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma_lop" value="{{$lop_hoc->ma}}">
	<input type="hidden" name="ma_mon" value="{{$mon_hoc->ma}}">
	<input type="hidden" name="ma_admin" value="{{$ma_admin}}">
	<div class="col-md-3 mb-3">
		<label for="validationDefault04">Chọn Admin thay thế</label>
		<select name="ma_admin_moi" class="custom-select" >
			@foreach($array_admin as $admin )
		<option value="{{$admin->ma}}"
			@foreach($array_ma as $ad )
			@if($admin->ma==$ad->ma_admin)
			hidden
			@endif
			@endforeach
			>{{$admin->ten_admin}}({{$admin->ten}})</option>
			
			@endforeach
		</select>
	  </div>
	  <button type="submit" class="btn btn-primary">Sửa</button>
</form>

@endsection