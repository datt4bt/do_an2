@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('sinh_vien.insert') }}">Thêm Sinh viên</a></button>
<hr>
<form action="{{ route('sinh_vien.get_one')}}" method="POST">
    {{ csrf_field() }}
	<select class="custom-select" name="ma_khoa_hoc" id="chon_khoa_hoc" >
		<option disabled selected >Mời bạn chọn Khóa</option>
		@foreach ($array_khoa as $khoa)
	<option value="{{$khoa->ma}}">{{$khoa->ten}}</option>
        @endforeach
       
        </select>
       
        <select class="custom-select" name="ma_lop" id="chon_lop">
            <option disabled selected >Mời bạn chọn Lớp</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>
<hr>
<h3 style="text-align: center">Danh sách Lớp {{ $info->ten }}- Khóa:{{ $info->khoa->ten }}-Ngành:{{ $info->nganh_hoc->ten }}</h3>
<table class="table table-striped">
	<tr>
		<td>Mã </td>
		<td>Tên </td>
		<td>Giới tính</td>
		<td>Ngày sinh</td>
		<td>Địa chỉ</td>
		<td>Sđt</td>
		<td>Email</td>
		
		
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
				
				
				<td><a href="{{ route('sinh_vien.update',['ma'=>$sinh_vien->ma]) }}">Sửa</a></td>
				<td><a onclick="return confirm('Bạn có chắc muốn xóa ?')" href="{{ route('sinh_vien.delete',['ma'=>$sinh_vien->ma]) }}">Xóa</a></td>
			</tr>
		@endforeach
	
</table>
@endsection
@push('js')
    

<script type="text/javascript">
//Chọn Lớp
 $(document).ready(function () {
     $("#chon_khoa_hoc").change(function () {
         
           var ma_khoa_hoc=$(this).val();
          $('#chon_lop').html('');
           $.ajax({
               type: "GET",
               url: "{{route('diem_thi.get_lop')}}",
               data: {ma_khoa_hoc:ma_khoa_hoc},
               dataType: "json",
              
           })
           .done(function(response){
               $(response).each(function () {

                $('#chon_lop').append(
                    `<option value='${this.ma}'>
                        ${this.ten}
                    </option>`
                );
               });
               $('#chon_lop').trigger('change');
              
           })
            .fail(function() {
             alert("lỗi rồi");
             });
         
	 });
	});

</script>
@endpush