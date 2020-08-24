@extends('giao_dien.index')
@section('content')
@if (Session::has('loi_nganh_hoc'))
	<h3 style="color: red">{{ Session::get('loi_nganh_hoc') }}</h3>
@endif
<h1 style="text-align: center"> Thêm Ngành học</h1>
<form class="form" action=" {{ route('nganh_hoc.process_insert') }} " method="post">
	{{csrf_field()}}
	
<input type="hidden" name="ma" value="{{$ma_moi}}">
	Tên Ngành Học
	<input type="text" name="ten">
	<button>Thêm</button>
</form>
@endsection