@extends('giao_dien.index')
@section('content')
<form action="{{ route('nganh_hoc_chi_tiet.select_nganh') }}" method="GET">
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
			<td><a href="{{ route('nganh_hoc_chi_tiet.delete_nganh') }}">Xóa</a></td>
		</tr>
				
				
				
		
		@endforeach
		
		
		
		</table>
	</form>


@endsection