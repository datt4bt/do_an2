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
				<td>{{$nganh_hoc_chi_tiet->ma_nganh_hoc}}</td>
				<td>{{$nganh_hoc_chi_tiet->ma_mon_hoc}}</td>
				<td><a href="{{ route('nganh_hoc_chi_tiet.update',['ma_nganh_hoc'=>$nganh_hoc_chi_tiet->ma]) }}">Sửa</a></td>
				<td><a href="{{ route('nganh_hoc_chi_tiet.delete',['ma_hoc'=>$nganh_hoc_chi_tiet->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection