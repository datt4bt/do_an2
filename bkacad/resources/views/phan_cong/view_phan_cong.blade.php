

@extends('giao_dien.index')
@section('content')


<form action="" method="POST">
    {{ csrf_field() }}
	<select class="custom-select" name="ma_khoa" id="chon_khoa_hoc" >
		<option disabled selected >Mời bạn chọn Khóa</option>
		@foreach ($array_khoa as $khoa)
	<option value="{{$khoa->ma}}">{{$khoa->ten}}</option>
        @endforeach
       
        </select>
       
        <select class="custom-select" name="ma_lop" id="chon_lop">
        <option disabled selected >Mời bạn chọn Lớp </option>
        </select>
       
       
      
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>
<h2 style="text-align: center">Danh sách Phân công lớp :{{$lop->ten}}-Khóa:{{$lop->khoa->ten}}</h2>
<table class="table">
    <tr>
        <th></th>
        <th>Tên Giáo viên</th>
        <th>Môn học</th>
        <th></th>
        <th></th>
    </tr>
  
       @foreach($array_lop as $lop )
       <tr>
        <th>{{$lop->admin->ten}}</th>
    <th>{{$lop->admin->ten_admin}}</th>
    <td>{{$lop->mon_hoc->ten}}</td>
    <td><a href="{{ route('phan_cong.update',['ma_lop'=>$lop->ma_lop_hoc,'ma_mon'=>$lop->ma_mon_hoc,'ma_admin'=>$lop->ma_admin]) }}">Sửa</a></td>
    <td><a onclick="return confirm('Bạn có chắc muốn xóa ?')" href="{{ route('phan_cong.delete',['ma_lop'=>$lop->ma_lop_hoc,'ma_mon'=>$lop->ma_mon_hoc,'ma_admin'=>$lop->ma_admin]) }}">Xóa</a></td>
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