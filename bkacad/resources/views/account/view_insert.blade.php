@extends('giao_dien.index')
@section('content')
<form class="form" action=" {{ route('account.process_insert_anh') }} " method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	
	Chọn ảnh
	<input type="file" name="anh"><br>
	<button>Thêm</button>
</form>

@endsection