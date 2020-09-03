

@extends('giao_dien.index')
@section('content')

@if (Session::has('loi_lan2'))
	<h3 style="color: red">{{ Session::get('loi_lan2') }}</h3>
@endif
<form action="{{ route('diem_thi.process_insert')}}" method="POST">
    {{ csrf_field() }}
	<select class="custom-select" name="ma_lop"  >
		
		@foreach ($array_lop as $lop)
	<option value="{{$lop->ma}}">{{$lop->ten}}</option>
        @endforeach
       
        </select>
        <select class="custom-select" name="ma_mon"  >
           
            @foreach ($array_mon as $mon)
        <option value="{{$mon->ma}}">{{$mon->ten}}</option>
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
@endsection