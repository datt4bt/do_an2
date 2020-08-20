
@extends('giao_dien.index')
@section('content')
<form action="{{ route('sinh_vien.process_update',['ma'=>$sinh_vien->ma]) }}" method="post">
	{{csrf_field()}}
	
	<div class="form-group">
		<label for="exampleInputEmail1">Tên Sinh viên</label>
		<input type="text" class="form-control" value="{{ $sinh_vien->ten }}" name="ten" aria-describedby="emailHelp">
	  </div>
	  <div class="form-group">
		<label for="col-sm-2 col-form-label">Giới tính:</label>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" @if( $sinh_vien->gioi_tinh==1) checked @endif name="gioi_tinh" id="inlineRadio1" value="1">
			<label class="form-check-label" for="inlineRadio1">Nam</label>
		  </div>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" @if($sinh_vien->gioi_tinh ==0) checked @endif  name="gioi_tinh" id="inlineRadio1" value="0">
			<label class="form-check-label" for="inlineRadio1">Nữ</label>
		  </div>
	  </div>
	
		<div class="form-group">
		  <label for="exampleInputEmail1">Ngày sinh</label>
		  <input type="date" class="form-control" value="{{ $sinh_vien->ngay_sinh }}" name="ngay_sinh" aria-describedby="emailHelp">
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">SĐT</label>
		  <input type="text" class="form-control"value="{{ $sinh_vien->sdt }}" name="sdt" aria-describedby="emailHelp">
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Địa chỉ</label>
		  <input type="text" class="form-control"value="{{ $sinh_vien->dia_chi }}" name="dia_chi" aria-describedby="emailHelp">
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Email</label>
		  <input type="email" class="form-control" value="{{ $sinh_vien->email }}" name="email" aria-describedby="emailHelp">
		</div>
	  <label for="exampleInputEmail1">Lớp</label>
	  <select class="form-control" name="ma_lop">
		  @foreach ($array_lop as $lop)
			  <option value="{{ $lop->ma }}"
				  @if ( $lop->ma ==$sinh_vien->ma_lop )
					  selected
				  @endif
				>
				{{ $lop->ten }}
				
				</option>
		  @endforeach
		</select>
	  <br>
	  <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection