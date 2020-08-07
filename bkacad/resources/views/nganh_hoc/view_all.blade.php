@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('insert_nganh_hoc') }}">Thêm</a></button>
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
				<td><a href="{{ route('update_nganh_hoc',['ma'=>$nganh_hoc->ma]) }}">Sửa</a></td>
				<td><a href="{{ route('delete_nganh_hoc',['ma'=>$nganh_hoc->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection