
@extends('giao_dien_sinh_vien.index')
@section('content')
<form action="{{ route('khoa.process_update',['ma'=>$khoa->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên 
	<input type="text" value="{{ $khoa->ten }}" name="ten">
	<button>Sửa</button>
</form>

@endsection