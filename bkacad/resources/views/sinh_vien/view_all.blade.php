@extends('giao_dien.index')
@section('content')
<button class="button"><a  href="{{ route('sinh_vien.insert_excel') }}">Thêm Sinh viên bằng file Excel</a></button>
<button class="button"><a  href="{{ route('sinh_vien.insert') }}">Thêm</a></button>

<form  class="need-validated" action="{{ route('sinh_vien.get_one')}}" method="POST">
    {{ csrf_field() }}
    <label  for="validationTextarea">Chọn Khóa</label>
	<select class="custom-select is-invalid" name="ma_khoa_hoc" id="chon_khoa_hoc"  required>
		<option disabled selected >Mời bạn chọn Khóa</option>
		@foreach ($array_khoa as $khoa)
	<option value="{{$khoa->ma}}">{{$khoa->ten}}</option>
        @endforeach
       
        </select>
        <label  for="validationTextarea">Lớp</label>
        <select class="custom-select is-invalid" name="ma_lop" id="chon_lop"  required>
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