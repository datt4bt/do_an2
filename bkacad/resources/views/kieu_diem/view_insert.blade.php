@extends('giao_dien.index')
@section('content')
@if (Session::has('loi_kieu_diem'))
	<h3 style="color: red">{{ Session::get('loi_kieu_diem') }}</h3>
@endif
<h1 style="text-align: center"> Thêm Hình thức thi </h1>
<form class="form" action=" {{ route('kieu_diem.process_insert') }} " method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma" value="{{$ma_moi}}">
	Tên 
	<input type="text" name="ten">
	<button>Thêm</button>
</form>

@endsection