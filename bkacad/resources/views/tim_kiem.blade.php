@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Kết quả tìm kiếm :{{$tim_kiem}}</h2>
<hr>
<h4 style="text-align: center">Danh sách Lớp tìm được </h4>
<table class="table">
	<tr>
		<td>Mã Lớp</td>
        <td>Tên Lớp</td>
        <td>Khóa</td>
		<td>Ngành học</td>
		
	</tr>

		@foreach ($array_lop as $lop)
			<tr>
				<td>{{$lop->ma}}</td>
                <td><a href="{{ route('sinh_vien.view_tim_kiem',['ma'=>$lop->ma]) }}">{{$lop->ten}}</a></td>
                <td>{{$lop->khoa->ten}}</td>
                <td>{{$lop->nganh_hoc->ten}}</td>
				
			</tr>
		@endforeach
		
</table>
{{$array_lop->appends(['tim_kiem' => $tim_kiem])->links()}}
<h4 style="text-align: center">Danh sách Sinh viên tìm được </h4>
<table class="table">
	<tr>
		<td>Mã </td>
		<td>Tên Ngành học</td>
		<td>Ngày Sinh</td>
		<td>Lớp</td>
	</tr>

		@foreach ($array_sinh_vien as $sinh_vien)
			<tr>
				<td>{{$sinh_vien->ma}}</td>
                <td><a href="{{ route('sinh_vien.view_diem',['ma'=>$sinh_vien->ma]) }}">{{$sinh_vien->ten}}</a></td>
                <td>{{$sinh_vien->ngay_sinh}}</td>
                <td>{{$sinh_vien->lop->ten}}</td>
				
			</tr>
		@endforeach
		
</table>
{{$array_sinh_vien->appends(['tim_kiem' => $tim_kiem])->links()}}
@endsection