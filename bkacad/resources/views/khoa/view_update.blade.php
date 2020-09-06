
@extends('giao_dien.index')
@section('content')
@if (isset($a))
	<h3 style="color: red">Tên đã tồn tại vui lòng thử lại</h3>
@endif
<form action="{{ route('khoa.process_update',['ma'=>$khoa->ma]) }}" method="get">
	
	
	Tên 
	<input type="text" value="{{ $khoa->ten }}" name="ten">
	<button>Sửa</button>
</form>

@endsection