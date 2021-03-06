@extends('giao_dien.index')
@section('content')
@if (Session::has('loi_lop'))
	<h3 style="color: red">{{ Session::get('loi_lop') }}</h3>
@endif
<h2 style="text-align: center">Thêm môn học</h2>
<form action=" {{ route('lop.process_insert') }} " method="post">
	{{csrf_field()}}
	<label for="exampleInputEmail1">Khóa học</label>
	<select class="form-control" name="ma_khoa_hoc">
		@foreach ($array_khoa_hoc as $khoa_hoc)
			<option value="{{ $khoa_hoc->ma }}">{{ $khoa_hoc->ten }}</option>
		@endforeach
	  </select>
	  <label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_nganh_hoc">
		@foreach ($array_nganh_hoc as $nganh_hoc)
			<option value="{{ $nganh_hoc->ma }}">{{ $nganh_hoc->ten }}</option>
		@endforeach
	  </select>
	 	 <label for="exampleInputEmail1">Tên</label>
		<input type="text" class="form-control" name="ten">
	<br>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection