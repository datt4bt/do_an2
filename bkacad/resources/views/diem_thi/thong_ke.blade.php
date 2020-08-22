

@extends('giao_dien.index')
@section('content')

<form action="" method="POST">
    {{ csrf_field() }}
	<select class="custom-select" name="ma_khoa_hoc" id="chon_khoa_hoc" >
        
    <option disabled selected >{{$khoa_hoc}}</option>
		@foreach ($array_khoa as $khoa)
    <option value="{{$khoa->ma}}" @if($khoa_hoc==$khoa->ma)
        selected
        
    @endif >{{$khoa->ten}}</option>
        @endforeach
       
        </select>
       
        <select class="custom-select" name="ma_lop" id="chon_lop">
            <option selected >{{$lop}}</option>
        </select>
        <select class="custom-select" name="ma_mon" id="chon_mon">
            <option selected >{{$mon}}</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>
<table class="table table-striped">
    <tr>
        <th scope="row"></th>
        <th scope="row"></th>
        <th scope="row"></th>
        
        <th colspan="2" style="text-align: center">Lý thuyết</th>
        <th colspan="2" style="text-align: center">Thực hành</th>
        <td></td>
       
    </tr>
    <tr>
        <th scope="col">Mã</th>
        <th scope="col">Tên</th>
        <th scope="col">Ngày Sinh</th>
        <td scope="col">Lần 1</td>
        <td scope="col">Lần 2</td>
        <td scope="col">Lần 1</td>
        <td scope="col">Lần 2</td>
        <th scope="col">Ghi chú</th>
        
    </tr>
  
    @foreach ($array_sinh_vien as $sinh_vien)
    <tr>
        <td>{{$sinh_vien->ma}}</td>
        <td>{{$sinh_vien->ten}}</td>
        <td>{{$sinh_vien->ngay_sinh}}</td>
       <td> {{ $diem_chi_tiet[$sinh_vien->ma][3][1][1] }}</td>
     
       
       
       
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
     $("#chon_lop").change(function () {
         
           var ma_lop=$(this).val();
          $('#chon_mon').html('');
           $.ajax({
               type: "GET",
               url: "{{route('diem_thi.get_mon')}}",
               data: {ma_lop:ma_lop},
               dataType: "json",
              
           })
           .done(function(response){
               $(response).each(function () {

                $('#chon_mon').append(
                    `<option value='${this.ma}'>
                        ${this.ten}
                    </option>`
                );
               })
              
           })
           .fail(function() {
             alert("lỗi rồi");
             });
         
     });
 });
</script>
@endpush