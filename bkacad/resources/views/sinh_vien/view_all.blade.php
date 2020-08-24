@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('sinh_vien.insert_excel') }}">Thêm Sinh viên bằng file Excel</a></button>
<button class="button"><a  href="{{ route('sinh_vien.insert') }}">Thêm</a></button>

<table class="table table-striped">
	<tr>
		<td>Mã </td>
		<td>Tên </td>
		<td>Giới tính</td>
		<td>Ngày sinh</td>
		<td>Địa chỉ</td>
		<td>Sđt</td>
		<td>Email</td>
		<td>Lớp</td>
		<td></td>
	</tr>

		@foreach ($array_sinh_vien as $sinh_vien)
			<tr>
				<td>{{$sinh_vien->ma}}</td>
				<td>{{$sinh_vien->ten}}</td>
				<td>{{$sinh_vien->ten_gioi_tinh}}</td>
				<td>{{$sinh_vien->ngay_sinh}}</td>
				<td>{{$sinh_vien->dia_chi}}</td>
				<td>{{$sinh_vien->sdt}}</td>
				<td>{{$sinh_vien->email}}</td>
				<td>{{$sinh_vien->lop->ten}}</td>
				<td><a href="{{ route('sinh_vien.update',['ma'=>$sinh_vien->ma]) }}">Sửa</a></td>
				<td><a href="{{ route('sinh_vien.delete',['ma'=>$sinh_vien->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection