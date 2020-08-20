
@extends('giao_dien.index')
@section('content')
<form action="{{ route('lop.process_update',['ma'=>$lop->ma]) }}" method="post">
	{{csrf_field()}}
	
	<div class="form-group">
		<label for="exampleInputEmail1">Tên </label>
		<input type="text" class="form-control" value="{{$lop->ten }}" name="ten" aria-describedby="emailHelp">
	   
	  </div>
	  <label for="exampleInputEmail1">Ngành học</label>
	  <select class="form-control" name="ma_nganh_hoc">
		  @foreach ($array_nganh_hoc as $nganh_hoc)
			  <option value="{{ $nganh_hoc->ma }}"
				  @if ( $nganh_hoc->ma ==$lop->ma_nganh_hoc )
					  selected
				  @endif
				>
				{{ $nganh_hoc->ten }}
				
				</option>
		  @endforeach
		</select>
		<label for="exampleInputEmail1">Ngành học</label>
		<select class="form-control" name="ma_khoa_hoc">
			@foreach ($array_khoa_hoc as $khoa_hoc)
				<option value="{{ $nganh_hoc->ma }}"
					@if ( $khoa_hoc->ma ==$lop->ma_khoa_hoc )
						selected
					@endif
				  >
				  {{ $khoa_hoc->ten }}
				  
				  </option>
			@endforeach
		  </select>
	  <br>
	  <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection