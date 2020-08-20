
@extends('giao_dien.index')
@section('content')
<form action="{{ route('khoa.process_update',['ma'=>$khoa->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên 
	<input type="text" value="{{ $khoa->ten }}" name="ten">
	<button>Sửa</button>
</form>

@endsection