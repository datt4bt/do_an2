<form @if ($ma==1)
action="{{ route('diem_thi.process_insert')}}" 
@elseif($ma==2)
action="{{ route('diem_thi.process_thong_ke')}}" 
@elseif($ma==3)
action="{{ route('diem_thi.thong_ke_diem_thi')}}"
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
       
        @if ($ma==1)

        <label for="">Lần thi:</label>
        <select class="custom-select" name="so_lan" >
            <option  value="1"  selected >lần1</option>
            <option  value="2" >lần2</option>
        </select>

        @endif
        @if ($ma==3)

        <label for="">Thống kê theo:</label>
        <select class="custom-select" name="kieu_thong_ke" >
            <option  value="1"  selected >Tất cả</option>
            <option  value="2" >Sinh viên thi lại lần 2</option>
            <option  value="3" >Sinh viên học lại</option>
        </select>

        @endif
        <br>
        <button type="submit" class="btn btn-primary">Chọn</button>
     
	  
</form>