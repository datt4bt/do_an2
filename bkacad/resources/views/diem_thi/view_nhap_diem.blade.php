

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
<form action="{{ route('diem_thi.luu_diem')}}" method="POST">
    {{ csrf_field() }}
    <h1 style="text-align: center">Danh sách lớp</h1>
    <table class="table table-striped">
      
             <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên</th>
                <th scope="col">Ngày Sinh</th>
                @foreach($array_mon_hoc as $mon_hoc )
                @if ($mon_hoc->ma_kieu_diem==1)
                
                    <th scope="col">Lý thuyết</th>   
                
                @elseif($mon_hoc->ma_kieu_diem==2)
                
                    <th scope="col">Thực hành</th>    
                
                @elseif($mon_hoc->ma_kieu_diem==3)
                
                    <th scope="col">Lý thuyết</th> 
                    <th scope="col">Thực hành</th>    
                
                @endif
                @endforeach

                
             </tr>
             <tr>
              @foreach($array_sinh_vien as $sinh_vien )
                <input type="hidden" name="ma_sinh_vien[]" value="{{$sinh_vien->ma}}">
                <td>{{$sinh_vien->ma}}</td>
                <td>{{$sinh_vien->ten}}</td>
                <td>{{$sinh_vien->ngay_sinh}}</td>
                @foreach($array_mon_hoc as $mon_hoc )
                <input type="hidden" name="ma_mon_hoc[]" value="{{$mon_hoc->ma}}">
                <input type="hidden" name="ma_kieu_diem[]" value="{{$mon_hoc->ma_kieu_diem}}">
                <input type="hidden" name="so_lan[]" value="1">
                
                @if ($mon_hoc->ma_kieu_diem==1)
                
                    <td scope=""> <div class="col-md-3 mb-3">
                        <input type="number" name="diem[]" class="form-control" id="validationCustom05" required>
                        <div class="invalid-feedback">
                          Vui lòng không để trống
                        </div>
                      </div>
                    </td>   
                
                @elseif($mon_hoc->ma_kieu_diem==2)
                
                <td scope=""> <div class="col-md-3 mb-3">
                    <input type="number" name="diem[]" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                      Vui lòng không để trống
                    </div>
                  </div>
                </td>       
                
                @elseif($mon_hoc->ma_kieu_diem==3)
                
                <td scope=""> <div class="col-md-3 mb-3">
                    <input type="number" name="diem[]" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                      Vui lòng không để trống
                    </div>
                  </div>
                </td>   
                <td scope=""> <div class="col-md-3 mb-3">
                    <input type="number" name="diem[]" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                      Vui lòng không để trống
                    </div>
                  </div>
                </td>      
                
                @endif
              
               
          
            </tr>
              @endforeach
           
              @endforeach
          
      
        
              
      </table>
      <hr>
      <button type="submit" class="btn btn-danger ">Lưu Điểm</button>
</form>
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