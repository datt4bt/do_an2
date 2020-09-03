@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('nganh_hoc.insert') }}">Thêm</a></button>
<table class="table">
	<tr>
		<td>Mã Ngành học</td>
		<td>Tên Ngành học</td>
		<td></td>
		<td></td>
	</tr>

		@foreach ($array_nganh_hoc as $nganh_hoc)
			<tr>
				<td>{{$nganh_hoc->ma}}</td>
				<td>{{$nganh_hoc->ten}}</td>
				<td><a href="{{ route('nganh_hoc.update',['ma'=>$nganh_hoc->ma]) }}">Sửa</a></td>
				<td><a onclick="return confirm('Bạn có chắc muốn xóa ?')" href="{{ route('nganh_hoc.delete',['ma'=>$nganh_hoc->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection