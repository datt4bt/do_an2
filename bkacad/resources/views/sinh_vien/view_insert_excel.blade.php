@extends('giao_dien.index')
@section('content')


<h2 style="text-align: center">Thêm Sinh Viên</h2>
<form action=" {{ route('sinh_vien.process_insert_excel') }} " enctype="multipart/form-data" method="post">
	{{csrf_field()}}
	
	<div class="form-group">
	  <label for="col-sm-2 col-form-label">Chọn file</label>
	  <input type="file" class="form-control" name="file_excel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" aria-describedby="emailHelp">
	</div>
	
	 
	<br>
	<div class="form-group">
		<label for="col-sm-2 col-form-label">Để tránh sai sót.Bạn có thể tải File Excel mẫu về và điền vào nó.</label>
		<a href="https://drive.google.com/file/d/1OHByRHfCzW870A4CLsb60sTTD_OHNsuh/view?usp=sharing" target="_blank"><u>Tải File tại đây</u></a>
	  </div>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection