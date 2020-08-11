@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('nganh_hoc.process_insert') }} " method="post">
	{{csrf_field()}}
	Tên Ngành Học
	<input type="text" name="ten">
	<button>Them</button>
</form>
@endsection