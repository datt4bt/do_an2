
@extends('giao_dien.index')
@section('content')
@if (isset($a))
	<h3 style="color: red">Tên đã tồn tại vui lòng thử lại</h3>
@endif
<form action="{{ route('kieu_diem.process_update',['ma'=>$kieu_diem->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên 
	<input type="text" value="{{ $kieu_diem->ten }}" name="ten">
	<button>Sửa</button>
</form>

@endsection