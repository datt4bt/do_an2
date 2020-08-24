

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
        <label for="">Lần thi:</label>
        <select class="custom-select" name="so_lan" >
            <option  value="1"  selected  >lần1</option>
            <option  value="2"@foreach($array_diem as $mon_hoc )
            @if ($mon_hoc->so_lan==2)
                selected
            @endif
            @endforeach  >lần2</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>
<form action="{{ route('diem_thi.luu_diem')}}" method="POST">
    {{ csrf_field() }}
    <h1 style="text-align: center">Danh sách Sinh viên thi lại lần 2</h1>
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
              @foreach($array_diem as $sinh_vien )
             
                <td >{{$sinh_vien->ma}}</td>
                <td>{{$sinh_vien->ten}}</td>
                <td>{{$sinh_vien->ngay_sinh}}</td>
               
               
               
                
               
                    @if ($mon_hoc->ma_kieu_diem==1)
                
                    <td scope=""> <div class="col-md-3 mb-3">
                        <input data-sinh_vien="{{$sinh_vien->ma}}"
                         data-mon_hoc="{{$sinh_vien->ma_mon_hoc}}" 
                         data-kieu_diem="{{$sinh_vien->ma_kieu_diem}}"  
                         data-so_lan="{{$sinh_vien->so_lan}}"
                         data-hinh_thuc="{{$sinh_vien->hinh_thuc}}" style="width:70px"  
                         type="number" class="diem"  
                      
                         @if (isset($sinh_vien->ma_kieu_diem) &&  $sinh_vien->ma_kieu_diem==1  )
                             value="{{$sinh_vien->diem}}"
                        
                         @endif
                       
                         class="form-control" id="validationCustom05"  required>
                        <div class="invalid-feedback">
                          Vui lòng không để trống
                        </div>
                      
                    </td>   
                
                @elseif($mon_hoc->ma_kieu_diem==2)
                
                <td scope=""> <div class="col-md-3 mb-3">
                    <input data-sinh_vien="{{$sinh_vien->ma}}"
                     data-mon_hoc="{{$sinh_vien->ma_mon_hoc}}" 
                     data-kieu_diem="{{$sinh_vien->ma_kieu_diem}}"  
                     data-so_lan="{{$sinh_vien->so_lan}}"
                     data-hinh_thuc="{{$sinh_vien->hinh_thuc}}" style="width:70px"  
                     type="number" class="diem"  
                  
                     @if (isset($sinh_vien->ma_kieu_diem) &&  $sinh_vien->ma_kieu_diem==2  )
                         value="{{$sinh_vien->diem}}"
                    
                     @endif
                   
                     class="form-control" id="validationCustom05"  required>
                    <div class="invalid-feedback">
                      Vui lòng không để trống
                    </div>
                  
                </td>   
                
                @elseif($mon_hoc->ma_kieu_diem==3)
                
                <td scope=""> <div class="col-md-3 mb-3">
                    <input data-sinh_vien="{{$sinh_vien->ma}}"
                     data-mon_hoc="{{$sinh_vien->ma_mon_hoc}}" 
                     data-kieu_diem="{{$sinh_vien->ma_kieu_diem}}"  
                     data-so_lan="{{$sinh_vien->so_lan}}"
                     data-hinh_thuc="{{$sinh_vien->hinh_thuc}}" style="width:70px"  
                     type="number" class="diem"  
                  
                     @if (isset($sinh_vien->ma_kieu_diem) &&  $sinh_vien->ma_kieu_diem==3 &&  $sinh_vien->hinh_thuc==1 )
                         value="{{$sinh_vien->diem}}"
                         @else 
                         type="hidden"
                     @endif
                   
                     class="form-control" id="validationCustom05"  required>
                    <div class="invalid-feedback">
                      Vui lòng không để trống
                    </div>
                </td>   
                <td  <input data-sinh_vien="{{$sinh_vien->ma}}"
                    data-mon_hoc="{{$sinh_vien->ma_mon_hoc}}" 
                    data-kieu_diem="{{$sinh_vien->ma_kieu_diem}}"  
                    data-so_lan="{{$sinh_vien->so_lan}}"
                    data-hinh_thuc="{{$sinh_vien->hinh_thuc}}" style="width:70px"  
                    type="number" class="diem"  
                 
                    @if (isset($sinh_vien->ma_kieu_diem) &&  $sinh_vien->ma_kieu_diem==3  &&  $sinh_vien->hinh_thuc==2)
                        value="{{$sinh_vien->diem}}"
                   
                   @else 
                   type="hidden"
                   
                    @endif
                  
                    class="form-control" id="validationCustom05"  required>
                   <div class="invalid-feedback">
                     Vui lòng không để trống
                   </div>
                </td>      
                
                @endif
                  </tr>
              @endforeach
           
                 
          
      
        
              
      </table>
    
     
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
     //nhập điểm
     $(".diem").change(function () {
      
     
      var ma_sinh_vien = $(this).data('sinh_vien');
      var ma_mon_hoc = $(this).data('mon_hoc');
      var ma_kieu_diem = $(this).data('kieu_diem');
      var so_lan = $(this).data('so_lan');
      var hinh_thuc = $(this).data('hinh_thuc');
      var diem =$(this).val();
      if(diem<0)
      {
        alert("Điểm phải nằm trong khoảng 0->10");
       
      }
      else if(diem>10)
      {
        alert("Điểm phải nằm trong khoảng 0->10");
      }
      else{
        $.ajax({
        type: "GET",
        url: "{{route('diem_thi.luu_diem')}}",
        data: {
          ma_sinh_vien:ma_sinh_vien,
          ma_mon_hoc:ma_mon_hoc,
          ma_kieu_diem:ma_kieu_diem,
          so_lan:so_lan,
          hinh_thuc:hinh_thuc,
          diem:diem
        
        },
        dataType: "json",
       
    });
      }
     
    
});
//

//
 });

</script>
@endpush