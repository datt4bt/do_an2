@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('nganh_hoc.process_insert') }} " method="post">
	{{csrf_field()}}
<input type="hidden" name="ma" value="{{$ma_moi}}">
	Tên Ngành Học
	<input type="text" name="ten">
	<button>Thêm</button>
</form>
@endsection