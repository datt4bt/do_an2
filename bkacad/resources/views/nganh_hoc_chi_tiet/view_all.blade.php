@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('nganh_hoc_chi_tiet.insert') }}">Thêm</a></button>
<table class="table table-striped">
	<tr>
		<td>Tên môn học </td>
		<td></td>
		<td></td>
	</tr>

		@foreach ($array_nganh_hoc_chi_tiet as $nganh_hoc_chi_tiet)
			<tr>
				<td>{{$nganh_hoc_chi_tiet->ma}}</td>
				<td>{{$nganh_hoc_chi_tiet->ten}}</td>
				<td>{{$nganh_hoc_chi_tiet->kieu_diem->ten}}</td>
				<td><a href="{{ route('nganh_hoc_chi_tiet.update',['ma_nganh_hoc'=>$nganh_hoc_chi_tiet->ma]) }}">Sửa</a></td>
				<td><a href="{{ route('nganh_hoc_chi_tiet.delete',['ma_hoc'=>$nganh_hoc_chi_tiet->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection