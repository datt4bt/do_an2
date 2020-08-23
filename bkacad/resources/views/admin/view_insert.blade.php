@extends('giao_dien.index')
@section('content')
<h2>Thêm tài khoản</h2>
<form class="needs-validation"  action=" {{ route('admin.process_insert') }} " method="post">
	{{csrf_field()}}
	<input type="hidden" name="ma" value="{{$ma_moi}}">
	<div class="col-md-6 mb-3">
		<label for="validationDefault01">Tên đăng nhập</label>
		<input type="text" class="form-control" id="validationDefault01" name="ten"  required>
	</div>
	<div class="col-md-6 mb-3">
		<label for="validationDefault01">Mật khẩu</label>
		<input type="password" class="form-control" id="validationDefault01" name="mat_khau"  required>
	</div>
	<div class="col-md-6 mb-3">
		<label for="validationDefault01">Họ tên</label>
		<input type="text" class="form-control" id="validationDefault01" name="ten_admin"  required>
		<input type="hidden"  name="anh"  >
	</div>
	<div class="col-md-6 mb-3">
		<label for="validationDefault01">Email</label>
		<input type="email" class="form-control"  name="email"  >
	</div>
	<label >Cấp độ</label>
	<div class="form-check">
		
		<input  type="radio"  name="cap_do"  checked value="1"  > <b>Giáo vụ</b>
		
		<input  type="radio"  name="cap_do"  value="0"  > <b>Giáo viên</b>
		
	</div>
	<button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection