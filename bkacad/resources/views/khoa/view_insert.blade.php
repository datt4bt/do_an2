@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('khoa.process_insert') }} " method="post">
	{{csrf_field()}}
	Tên 
	<input type="text" name="ten">
	<button>Thêm</button>
</form>

@endsection