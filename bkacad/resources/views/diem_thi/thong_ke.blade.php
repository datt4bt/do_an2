

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
<table class="table">
    <tr>
        <th scope="col">Mã</th>
        <th scope="col">Tên</th>
        <th scope="col">Ngày Sinh</th>
        <th scope="col">Lần 1</th>
        <th scope="col">Lần 2</th>
        <th scope="col">Ghi chú</th>
        
    </tr>
    @foreach ($array_diem as $diem)
    <tr>
        <td>{{$diem->sinh_vien->ma}}</td>
        <td>{{$diem->sinh_vien->ten}}</td>
        <td>{{$diem->sinh_vien->ngay_sinh}}</td>
        <td>
            @if ($diem->so_lan==1)
            {{$lan1=$diem->diem}}
            @else
                
            @endif
           
        </td>
        <td>
            @if ($diem->so_lan==2)
            {{$lan2=$diem->diem}}
            @else
               
            @endif
        </td>
        <td>
            @if ($diem->diem>=5 & $diem->so_lan==1) 
           
            @elseif($diem->diem<5 & $diem->so_lan==1)
             Thi lần 2  
             @elseif($diem->diem<5 & $diem->so_lan==2)
                Học lại
            @endif 
        </td>
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