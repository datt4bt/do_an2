@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('khoa.insert') }}">Thêm</a></button>
<table class="table table-striped">
	<tr>
		<td>Mã </td>
		<td>Tên </td>
		<td></td>
		<td></td>
	</tr>

		@foreach ($array_khoa as $khoa)
			<tr>
				<td>{{$khoa->ma}}</td>
				<td>{{$khoa->ten}}</td>
				<td><a href="{{ route('khoa.update',['ma'=>$khoa->ma]) }}">Sửa</a></td>
				<td><a onclick="return confirm('Bạn có chắc muốn xóa ?')" href="{{ route('khoa.delete',['ma'=>$khoa->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection