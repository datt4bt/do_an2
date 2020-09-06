
@extends('giao_dien.index')
@section('content')
@if (isset($a))
	<h3 style="color: red">Tên đã tồn tại vui lòng thử lại</h3>
@endif
<form action="{{ route('mon_hoc.process_update',['ma'=>$mon_hoc->ma]) }}" method="post">
	{{csrf_field()}}
	
	<div class="form-group">
		<label for="exampleInputEmail1">Tên môn học</label>
		<input type="text" class="form-control" value="{{$mon_hoc->ten }}" name="ten" aria-describedby="emailHelp">
	   
	  </div>
	  <label for="exampleInputEmail1">Hình thức thi</label>
	  <select class="form-control" name="ma_kieu_diem">
		  @foreach ($array_kieu_diem as $kieu_diem)
			  <option value="{{ $kieu_diem->ma }}"
				  @if ( $kieu_diem->ma ==$mon_hoc->ma_kieu_diem )
					  selected
				  @endif
				>
				{{ $kieu_diem->ten }}
				
				</option>
		  @endforeach
		</select>
	  <br>
	  <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection