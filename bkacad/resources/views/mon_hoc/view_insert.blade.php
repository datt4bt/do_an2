@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Thêm môn học</h2>
<form action=" {{ route('mon_hoc.process_insert') }} " method="post">
	{{csrf_field()}}
	<div class="form-group">
	  <label for="exampleInputEmail1">Tên môn học</label>
	  <input type="text" class="form-control" name="ten" aria-describedby="emailHelp">
	 
	</div>
	<label for="exampleInputEmail1">Hình thức thi</label>
	<select class="form-control" name="ma_kieu_diem">
		@foreach ($array_kieu_diem as $kieu_diem)
			<option value="{{ $kieu_diem->ma }}">{{ $kieu_diem->ten }}</option>
		@endforeach
	  </select>
	<br>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection