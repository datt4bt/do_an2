@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Thêm môn học</h2>
<form action=" {{ route('lop.process_insert') }} " method="post">
	{{csrf_field()}}
	<div class="form-group">
	  <label for="exampleInputEmail1">Tên </label>
	  <input type="text" class="form-control" name="ten" aria-describedby="emailHelp">
	 
	</div>
	<label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_nganh_hoc">
		@foreach ($array_nganh_hoc as $nganh_hoc)
			<option value="{{ $nganh_hoc->ma }}">{{ $nganh_hoc->ten }}</option>
		@endforeach
	  </select>
	<br>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection