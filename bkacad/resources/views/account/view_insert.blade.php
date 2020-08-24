@extends('giao_dien.index')
@section('content')
<form class="was-validated" action=" {{ route('account.process_insert_anh') }} " method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	
	<h5>Chọn ảnh đại diện:</h5>
	<input type="file"  id="validatedInputGroupCustomFile" name="anh" required><br>
	<hr>
	<button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection