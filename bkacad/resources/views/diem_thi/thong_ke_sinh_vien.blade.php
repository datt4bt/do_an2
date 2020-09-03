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
        <label for="">Thống kê theo:</label>
        <select class="custom-select" name="kieu_thong_ke" >
            <option  value="1"  @if($kieu==1)
                selected
            @endif >Tất cả</option>
            <option  value="2" @if($kieu==2)
            selected
        @endif  >Sinh viên thi lại lần 2</option>
            <option  value="3" @if($kieu==3)
            selected
        @endif  >Sinh viên học lại</option>
        </select>
       
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>
<form action="{{ route('diem_thi.luu_diem')}}" method="POST">
    {{ csrf_field() }}
    <h1 style="text-align: center"></h1>
    
    <table class="table table-striped">
      
             
             <tr>
              <th scope="col">Mã</th>
              <th scope="col">Tên</th>
              <th scope="col">Ngày Sinh</th>
              @foreach($array_mon_hoc as $mon_hoc )
                @if ($mon_hoc->ma_kieu_diem==1)
                
                    <th colspan="">Lý thuyết</th>   
                
                @elseif($mon_hoc->ma_kieu_diem==2)
                
                    <th colspan="">Thực hành</th>    
                
                @elseif($mon_hoc->ma_kieu_diem==3)
                
                    <th colspan="">Lý thuyết</th> 
                    <th colspan="">Thực hành</th>    
                
                @endif
                @endforeach
                <th scope="col">Ghi chú</th>

              
           </tr>
             <tr>
              @foreach($array_sinh_vien as $sinh_vien )
             
              @foreach($array_diem as $diem ) 
              @if  ($sinh_vien->ma==$diem->ma_sinh_vien)
              <td >{{$sinh_vien->ma}}</td>
              <td >{{$sinh_vien->ten}}</td>
              <td>{{$sinh_vien->ngay_sinh}}</td>
              @endif
              @endforeach
               
               
               
                @if ($mon_hoc->ma_kieu_diem==1)
                
                    
                    <td scope=""> 
                       @foreach($array_diem as $diem ) 
                       @if (isset($diem->ma_kieu_diem) &&  $diem->ma_kieu_diem==1 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->so_lan==1)
                       Thi lại(Điểm={{ $diem->diem }})
                      
                       @endif
                       @endforeach
                      
                       
                      
                  </td>  
                
                @elseif($mon_hoc->ma_kieu_diem==2)
                
               
                <td scope=""> 
                    @foreach($array_diem as $diem ) 
                    @if (isset($diem->ma_kieu_diem) &&  $diem->ma_kieu_diem==2 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->so_lan==1)
                        
                    Thi lại(Điểm={{ $diem->diem }})
                    @endif
                    @endforeach
                   
                    
                   
               </td>       
                
                @elseif($mon_hoc->ma_kieu_diem==3)
                
                 
               
                <td> 
                    @foreach($array_diem as $diem ) 
                    @if (isset($diem->ma_kieu_diem) &&  $diem->ma_kieu_diem==3 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->hinh_thuc==1 && $diem->so_lan==1 )
                      
                    Thi lại(Điểm={{ $diem->diem }})
                    @endif
                    @endforeach
                    
                 </td>      
            <td> 
             @foreach($array_diem as $diem ) 
             @if (isset($diem->ma_kieu_diem) &&  $diem->ma_kieu_diem==3 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->hinh_thuc==2 && $diem->so_lan==1 )
                 Thi lại(Điểm={{ $diem->diem }})
            
             @endif
             @endforeach
             
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