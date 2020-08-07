@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('process_insert_nganh_hoc') }} " method="post">
	{{csrf_field()}}
	Tên Ngành Học
	<input type="text" name="ten">
	<button>Them</button>
</form>
@endsection