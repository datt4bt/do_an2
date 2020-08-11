
@extends('giao_dien.index')
@section('content')
<form action="{{ route('kieu_diem.process_update',['ma'=>$kieu_diem->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên 
	<input type="text" value="{{ $kieu_diem->ten }}" name="ten">
	<button>Sửa</button>
</form>

@endsection