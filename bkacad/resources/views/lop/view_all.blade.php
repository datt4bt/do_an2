@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('lop.insert') }}">Thêm</a></button>
<form action="{{ route('lop.get_one') }}" method="get">
	
	<label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_nganh_hoc">
	@foreach ($array_nganh_hoc as $nganh_hoc)
		<option value="{{ $nganh_hoc->ma }}">{{ $nganh_hoc->ten }}</option>
	@endforeach
	  </select>
	  <label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_khoa_hoc">
	@foreach ($array_khoa_hoc as $khoa_hoc)
		<option value="{{ $khoa_hoc->ma }}">{{ $khoa_hoc->ten }}</option>
	@endforeach
	  </select>
	  <button type="submit" class="btn btn-primary">Chọn</button>
</form>
@endsection