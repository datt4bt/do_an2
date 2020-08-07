@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('process_insert_kieu_diem') }} " method="post">
	{{csrf_field()}}
	Tên 
	<input type="text" name="ten">
	<button>Them</button>
</form>

@endsection