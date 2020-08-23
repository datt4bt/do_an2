@extends('giao_dien.index')
@section('content')
<form action="{{ route('nganh_hoc_chi_tiet.select_nganh') }}" method="POST">
	{{ csrf_field() }}
<select class="custom-select" name="ma_nganh_hoc">
	
		@foreach ($array as $nganh)
		<option value="{{ $nganh->ma }}" 
			@if ($nganh->ma==$ma)
				selected 
			@endif

			>{{ $nganh->ten }}</option>
	@endforeach
	</select>
	<button type="submit" class="btn btn-danger">Chọn</button>
	</form>
	<form>
		{{ csrf_field() }}

	
		<table class="table">
		<tr>
			<th>Mã </th>
			<th>Tên</th>
			<th></th>
		</tr>
	

		@foreach ($mon as $sv)
		<tr>
			<td>{{ $sv->ma}}</td>
			<td>{{ $sv->ten}}</td>
			<td><a href="{{ route('nganh_hoc_chi_tiet.delete_nganh', ['ma_nganh'=>$ma,'ma_mon'=>$sv->ma]) }}">Xóa</a></td>
			
		</tr>
				
				
				
		
		@endforeach
		
		
		
		</table>
		<a href="{{ route('nganh_hoc_chi_tiet.insert') }}"><button type="button" class="btn btn-primary">Sửa</button></a>
	</form>


@endsection