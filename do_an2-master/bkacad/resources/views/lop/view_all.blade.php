@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('lop.insert') }}">Thêm</a></button>
<table class="table table-striped">
	<tr>
		<td>Mã </td>
		<td>Tên </td>
		<td>Ngành Học</td>
		<td>Khóa</td>
		<td></td>
	</tr>

		@foreach ($array_lop as $lop)
			<tr>
				<td>{{$lop->ma}}</td>
				<td>{{$lop->ten}}</td>
				<td>{{$lop->nganh_hoc->ten}}</td>
				<td>{{$lop->khoa->ten}}</td>
				<td><a href="{{ route('lop.update',['ma'=>$lop->ma]) }}">Sửa</a></td>
				<td><a href="{{ route('lop.delete',['ma'=>$lop->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection