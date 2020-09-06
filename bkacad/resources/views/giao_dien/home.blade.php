@extends('giao_dien.index')
@section('content')
<h4 style="text-align: center" >Thống kê</h4>
<table class="table table-striped">
	<tr>
        <td>Khoá</td>
        <td>{{ $khoa_hoc }}</td>
    </tr>
    <tr>
        <td>Ngành</td>
        <td>{{ $nganh_hoc }}</td>
    </tr>
    <tr>
        <td>Hình thức thi</td>
        <td>{{ $hinh_thuc }}</td>
    </tr>
    <tr>
        <td>Lớp</td>
        <td>{{ $lop_hoc }}</td>
    </tr>
    <tr>
        <td>Môn</td>
        <td>{{ $mon_hoc }}</td>
    </tr>
    <tr>
        <td>Sinh viên</td>
        <td>{{ $sinh_vien }}</td>
    </tr>
    <tr>
        <td>Giáo vụ</td>
        <td>{{ $giao_vu }}</td>
    </tr>
    <tr>
        <td>Giáo viên</td>
        <td>{{ $giao_vien }}</td>
	</tr>

	
		
	
</table>

@endsection