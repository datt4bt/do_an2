@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('lop.insert') }}">Thêm</a></button>
<form action="" method="post">
	{{ csrf_field() }}
	<label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_nganh_hoc">
	@foreach ($array_nganh_hoc as $nganh_hoc)
		<option value="{{ $nganh_hoc->ma }}" 
            @foreach ($array_lop as $lop)
            @if($nganh_hoc->ma==$lop->ma_nganh_hoc)
                selected
            @endif
            @endforeach
            >{{ $nganh_hoc->ten }}</option>
	@endforeach
      </select>
      <label for="exampleInputEmail1">Ngành học</label>
      <select class="form-control" name="ma_khoa_hoc">
      @foreach ($array_khoa_hoc as $khoa_hoc)
          <option value="{{ $khoa_hoc->ma }}"
            @foreach ($array_lop as $lop)
            @if($khoa_hoc->ma==$lop->ma_khoa_hoc)
                selected
            @endif
            @endforeach  
            >{{ $khoa_hoc->ten }}</option>
      @endforeach
        </select>
	  <button type="submit" class="btn btn-primary">Chọn</button>
</form>
<h3 style="text-align: center"> Danh sách lớp-Ngành:
    @foreach ($array_lop as $lop)
  {{  $lop->nganh_hoc->ten }}
       
  @break
    @endforeach
    -Khóa
    @foreach ($array_lop as $lop)
    {{  $lop->khoa->ten }}
         
    @break
      @endforeach
</h3>
<table class="table table-striped">
	<tr>
	
		<td>Tên </td>
		<td>Ngành Học</td>
		
		<td></td>
	</tr>

		@foreach ($array_lop as $lop)
			<tr>
				
				<td>{{$lop->ten}}</td>
				<td>{{$lop->nganh_hoc->ten}}</td>
				
				<td><a href="{{ route('lop.update',['ma'=>$lop->ma]) }}">Sửa</a></td>
				<td><a href="{{ route('lop.delete',['ma'=>$lop->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection