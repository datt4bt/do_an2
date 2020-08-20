<form @if ($ma==1)
action="{{ route('diem_thi.process_insert')}}" 
@elseif($ma==2)
action="{{ route('diem_thi.process_thong_ke')}}" 
@endif

method="POST">
    {{ csrf_field() }}
	<select class="custom-select" name="ma_khoa_hoc" id="chon_khoa_hoc" >
		<option disabled selected >Mời bạn chọn Khóa</option>
		@foreach ($array_khoa as $khoa)
	<option value="{{$khoa->ma}}">{{$khoa->ten}}</option>
        @endforeach
       
        </select>
       
        <select class="custom-select" name="ma_lop" id="chon_lop">
            <option disabled selected >Mời bạn chọn Lớp</option>
        </select>
        <select class="custom-select" name="ma_mon" id="chon_mon">
            <option disabled selected >Mời bạn chọn Môn</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>