

@extends('giao_dien.index')
@section('content')


<form action="{{ route('phan_cong.process_get_all')}}" method="POST">
    {{ csrf_field() }}
	<select class="custom-select" name="ma_khoa" id="chon_khoa_hoc" >
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