@extends('giao_dien.index')
@section('content')

<form action="{{ route('diem_thi.process_insert')}}" method="POST">
  {{ csrf_field() }}
<select class="custom-select" name="ma_lop"  >
 
  @foreach ($array_lop as $lop)
<option value="{{$lop->ma}}"
  @if($lop->ten==$lop_hoc)
        selected
      @endif
      >{{$lop->ten}}</option>
      @endforeach
     
      </select>
      <select class="custom-select" name="ma_mon"  >
          
          @foreach ($array_mon as $mon)
      <option value="{{$mon->ma}}" 
        @if($mon->ten==$mon_hoc)
        selected
      @endif>
      {{$mon->ten}}</option>
          @endforeach
         
          </select>
          <label for="">Lần thi:</label>
      <select class="custom-select" name="so_lan" >
          <option  value="1"  selected >lần1</option>
          <option  value="2" >lần2</option>
      </select>
     
     
      <br>
      <button type="submit" class="btn btn-primary">Chọn</button>
   
  
</form>
<form class="was-validated"  action="{{ route('diem_thi.luu_diem')}}" method="POST">
    {{ csrf_field() }}
    <h1 style="text-align: center">Nhập điểm thi lần 2</h1>
    
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
                
                    <th colspan="1">Lý thuyết</th> 
                    <th></th>
                    <th colspan="1">Thực hành</th>    
                
                @endif
                @endforeach


              
           </tr>
             <tr>
              @foreach($array_sinh_vien as $sinh_vien )
             
                <td >{{$sinh_vien->ma}}</td>
                <td>{{$sinh_vien->ten}}</td>
                <td>{{$sinh_vien->ngay_sinh}}</td>
               
               
               
                @if ($mon_hoc->ma_kieu_diem==1)
                
                    
                    <td scope="">  <div class="form-row">
                      <input data-sinh_vien="{{$sinh_vien->ma}}"
                       data-mon_hoc="{{$mon_hoc->ma}}" 
                       data-kieu_diem="{{$mon_hoc->ma_kieu_diem}}"  
                       data-so_lan="2"
                       data-hinh_thuc="1" style="width:90px"  
                       type="number" class="form-control is-invalid diem"    
                       @foreach($array_diem as $diem ) 
                       @if (isset($diem->ma_kieu_diem) &&  $diem->ma_kieu_diem==1 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->so_lan==2)
                           value="{{$diem->diem}}"
                      
                       @endif
                       @endforeach
                        required>
                       
                      
                    </div>
                  </td>  
                
                @elseif($mon_hoc->ma_kieu_diem==2)
                
               
              <td scope="">  <div class="form-row">
                <input data-sinh_vien="{{$sinh_vien->ma}}"
                type="number"
                 data-mon_hoc="{{$mon_hoc->ma}}" 
                 data-kieu_diem="{{$mon_hoc->ma_kieu_diem}}"  
                 data-so_lan="2" 
                 data-hinh_thuc="2" style="width:90px" class="form-control is-invalid diem"  
                 @foreach($array_diem as $diem ) 
                 @if (isset($diem->ma_kieu_diem) &&  $diem->ma_kieu_diem==2 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->so_lan==2)
                     value="{{$diem->diem}}"
                
                 @endif
               
                   
                
                 @endforeach
                 
               
                  required>
               
              </div>

            </td>      
                
                @elseif($mon_hoc->ma_kieu_diem==3)
                
                 
               
              
                
           @foreach($array_diem as $diem ) 
           @if (isset($diem->diem) &&  $diem->ma_kieu_diem==3 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->hinh_thuc==1 && $diem->so_lan==2  )
           
           @if($diem->diem==0)
           <td>  <div class="form-row">
            <input 
            data-sinh_vien="{{$sinh_vien->ma}}"
           data-mon_hoc="{{$mon_hoc->ma}}" 
           data-kieu_diem="{{$mon_hoc->ma_kieu_diem}}"  
           data-so_lan="2" 
           data-hinh_thuc="1"
           type="number" class="form-control is-invalid diem"  
          value="{{$diem->diem}}"
          style="width:90px"   required>
   
        </div>
      </td>   
          @endif
         
        
         
          
           @endif
              
           @endforeach  
           <td></td>     
               
              
           
        
           
          
           @foreach($array_diem as $diem ) 
           @if (isset($diem->diem) &&  $diem->ma_kieu_diem==3 && $sinh_vien->ma==$diem->ma_sinh_vien && $diem->hinh_thuc==2 && $diem->so_lan==2  )
           
           @if($diem->diem==0)
           <td>  <div class="form-row">
            <input 
            data-sinh_vien="{{$sinh_vien->ma}}"
           data-mon_hoc="{{$mon_hoc->ma}}" 
           data-kieu_diem="{{$mon_hoc->ma_kieu_diem}}"  
           data-so_lan="2" 
           data-hinh_thuc="2"
           type="number" class="form-control is-invalid diem" 
          value="{{$diem->diem}}"
          style="width:90px"  required>
   
        </div>
      </td>   
          @endif
         
        
         
          
           @endif
              
           @endforeach  
           <td></td> 
     
      
            
            
          
               
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