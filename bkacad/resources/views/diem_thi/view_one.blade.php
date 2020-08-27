@extends('giao_dien.index')
@section('content')


</form>
<form action="{{ route('diem_thi.luu_diem')}}" method="POST">
    {{ csrf_field() }}
    <h1 style="text-align: center">Nhập điểm</h1>
   @foreach($array_diem as $diem)
       {{ $diem }}
   @endforeach
    
     
</form>
@endsection
