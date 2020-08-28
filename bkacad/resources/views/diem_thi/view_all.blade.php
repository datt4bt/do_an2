

@extends('giao_dien.index')
@section('content')
@if (Session::has('loi_lan2'))
	<h3 style="color: red">{{ Session::get('loi_lan2') }}</h3>
@endif
@include('diem_thi.ajax')
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