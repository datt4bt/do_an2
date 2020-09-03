@extends('giao_dien.index')
@section('content')
@if (Session::has('loi_phan_cong'))
	<h3 style="color: red">{{ Session::get('loi_phan_cong') }}</h3>
@endif
<form action="{{ route('phan_cong.process_phan_cong') }}" method="post">
	{{ csrf_field() }}
	Chọn môn
	<select name="ma_mon">
		@foreach ($array_mon as $mon)
			<option value="{{ $mon->ma }}">
				{{ $mon->ten }}
			</option>
		@endforeach
	</select>
	<br>
	Chọn giáo viên
	<select name="ma_admin">
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
	<br>
	Chọn lớp
	<select name="ma_lop">
		@foreach ($array_lop as $lop)
			<option value="{{ $lop->ma }}">
				{{ $lop->ten }}({{ $lop->khoa->ten }})
			</option>
		@endforeach
	</select>
	<br>
	<button>Phân công</button>
</form>


@endsection