@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('kieu_diem.process_insert') }} " method="post">
	{{csrf_field()}}
	Tên 
	<input type="text" name="ten">
	<button>Them</button>
</form>

@endsection