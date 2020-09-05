@extends('giao_dien_sinh_vien.index')
@section('content')
@if (Session::has('loi_khoa'))
	<h3 style="color: red">{{ Session::get('loi_khoa') }}</h3>
@endif
<h1 style="text-align: center"> Thêm Khóa</h1>
<form class="needs-validation" action=" {{ route('khoa.process_insert') }} " method="post">
	{{csrf_field()}}
	<div class="col-md-6 mb-3">
		<label for="validationDefault01">Tên </label>
		<input type="text" class="form-control" id="validationDefault01" name="ten"  required>
	</div>
	<button>Thêm</button>
</form>

@endsection