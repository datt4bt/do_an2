@extends('giao_dien.index')
@section('content')
@if (Session::has('loi_phan_cong'))
	<h3 style="color: red">{{ Session::get('loi_phan_cong') }}</h3>
@endif
@if (Session::has('thanh_cong'))
	<script>
		alert('Bạn đã thêm Phân công thành công');
	</script>
@endif
<h2 style="text-align: center"> Phân công </h2>
<form action="{{ route('phan_cong.process_phan_cong') }}" method="post">
	{{ csrf_field() }}
	<div class="col-md-3 mb-3">
		<label for="validationDefault04">Chọn môn</label>
		<select name="ma_mon" class="custom-select" >
			@foreach ($array_mon as $mon)
			<option value="{{ $mon->ma }}">
				{{ $mon->ten }}
			</option>
		@endforeach
		</select>
	  </div>
	
	<br>
	<div class="col-md-3 mb-3">
		<label for="validationDefault04">Chọn giáo viên</label>
		<select name="ma_admin" class="custom-select" >
			@foreach ($array_admin as $admin)
			<option value="{{ $admin->ma }}">
			@if($admin->ten_admin=="")
			{{ $admin->ten }}
			@else
			{{ $admin->ten_admin }}({{ $admin->ten }})
			@endif

			</option>
		@endforeach
		</select>
	  </div>

	
	<br>

	<div class="col-md-3 mb-3">
		<label for="validationDefault04">Chọn lớp</label>
		<select name="ma_lop" class="custom-select" >
			@foreach ($array_lop as $lop)
			<option value="{{ $lop->ma }}">
				{{ $lop->ten }}({{ $lop->khoa->ten }})
			</option>
		@endforeach
		</select>
	  </div>
	
	<br>
	<button>Phân công</button>
</form>


@endsection