@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('admin.insert') }}">Thêm</a></button>
<table class="table table-striped">
	<tr>
		<th>Mã </th>
		<th>Tên đăng nhập</th>
		<th>Họ tên</th>
		<th>Ảnh</th>
		<th>Email</th>
		<th>Chức vụ</th>
		
		<td></td>
	</tr>

		@foreach ($array_admin as $admin)
			<tr>
				<td>{{$admin->ma}}</td>
				<td>{{$admin->ten}}</td>
				<td>{{$admin->ten_admin}}</td>
				<td><img width="200px" height="200px" src="{{ asset('storage').'/'. $admin->anh }}" alt=""></td>
				<td>{{$admin->email}}</td>
				<td>@if ($admin->cap_do==0)
					Giáo vụ
					@else
					Giáo viên
				@endif</td>
				
				<td>
					@if ($admin->cap_do==1)
					<a  onclick="return confirm('Bạn có chắc muốn xóa ?')"href="{{ route('admin.delete',['ma'=>$admin->ma]) }}">Xóa</a>
						@else
					
					@endif</td>
			</tr>
		@endforeach
	
</table>
@endsection