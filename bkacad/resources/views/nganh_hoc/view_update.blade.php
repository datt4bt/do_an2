
@extends('giao_dien.index')
@section('content')
<form action="{{ route('nganh_hoc.process_update',['ma'=>$nganh_hoc->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên Ngành Học
	<input type="text" value="{{ $nganh_hoc->ten }}" name="ten">
	<button>Sửa</button>
</form>
@endsection