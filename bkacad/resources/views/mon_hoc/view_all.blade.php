@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('mon_hoc.insert') }}">Thêm</a></button>
<table class="table table-striped">
	<tr>
		<td>Mã </td>
		<td>Tên </td>
		<td>Hình thức thi</td>
		<td></td>
	</tr>

		@foreach ($array_mon_hoc as $mon_hoc)
			<tr>
				<td>{{$mon_hoc->ma}}</td>
				<td>{{$mon_hoc->ten}}</td>
				<td>{{$mon_hoc->kieu_diem->ten}}</td>
				<td><a href="{{ route('mon_hoc.update',['ma'=>$mon_hoc->ma]) }}">Sửa</a></td>
				<td><a onclick="return confirm('Bạn có chắc muốn xóa ?')"  href="{{ route('mon_hoc.delete',['ma'=>$mon_hoc->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
		
	
</table>
{{$array_mon_hoc->links()}}
@endsection