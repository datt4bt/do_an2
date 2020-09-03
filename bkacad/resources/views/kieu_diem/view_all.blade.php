@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('kieu_diem.insert') }}">Thêm</a></button>
<table class="table table-striped">
	<tr>
		<td>Mã </td>
		<td>Tên </td>
		<td></td>
		<td></td>
	</tr>

		@foreach ($array_kieu_diem as $kieu_diem)
			<tr>
				<td>{{$kieu_diem->ma}}</td>
				<td>{{$kieu_diem->ten}}</td>
				<td><a href="{{ route('kieu_diem.update',['ma'=>$kieu_diem->ma]) }}">Sửa</a></td>
				<td><a onclick="return confirm('Bạn có chắc muốn xóa ?')" href="{{ route('kieu_diem.delete',['ma'=>$kieu_diem->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection