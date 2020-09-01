@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Thêm Sinh Viên</h2>
<form  class="was-validated" action=" {{ route('sinh_vien.process_insert') }} " method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma" value="{{$ma_moi}}">
	<div class="form-group">
	  <label for="col-sm-2 col-form-label">Tên Sinh viên</label>
	  <input type="text" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" name="ten" required> 
	</div>
	<div class="form-group">
		<label for="col-sm-2 col-form-label">Giới tính:</label>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio1" value="1" checked>
			<label class="form-check-label" for="inlineRadio1">Nam</label>
		  </div>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="gioi_tinh" id="inlineRadio1" value="0">
			<label class="form-check-label" for="inlineRadio1">Nữ</label>
		  </div>
	  </div>
	  <div class="form-group">
		<label for="col-sm-2 col-form-label">Ngày sinh</label>
		<input type="date"  name="ngay_sinh" required>
	  </div>
	  <div class="form-group">
		<label for="col-sm-2 col-form-label">SĐT</label>
		<input type="text" class="form-control is-invalid" name="sdt" required>
	  </div>
	  <div class="form-group">
		<label for="col-sm-2 col-form-label">Địa chỉ</label>
		<input type="text" class="form-control is-invalid" name="dia_chi" required>
	  </div>
	  <div class="form-group">
		<label for="col-sm-2 col-form-label">Email</label>
		<input type="email" class="form-control is-invalid"  name="email" >
	  </div>
	<label for="col-sm-2 col-form-label">Lớp</label>
	<select class="form-control" name="ma_lop">
		@foreach ($array_lop as $lop)
			<option value="{{ $lop->ma }}">{{ $lop->ten }}</option>
		@endforeach
	  </select>
	<br>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection