@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Thêm môn học</h2>
<form action="{{ route('nganh_hoc_chi_tiet.nganh') }}" method="POST">
	{{ csrf_field() }}
	<label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_nganh">
		@foreach ($array_nganh_hoc_chi_tiet as $nganh_hoc)
			<option value="{{ $nganh_hoc->ma }}" @if ($ma==$nganh_hoc->ma)
				selected
			@endif>
			{{ $nganh_hoc->ten }}</option>
		@endforeach
	  </select>
	  <button type="submit" class="btn btn-primary">Chọn</button>
</form>
<hr>
<form action=" {{ route('nganh_hoc_chi_tiet.process_insert') }} " method="post">
	{{csrf_field()}}
	
	
	  @foreach ($array_mon_hoc_chi_tiet as $mon_hoc)
	  <div class="form-check">
		
		<input class="form-check-input" type="checkbox" name="mon_hoc_chi_tiet[]" value="{{ $mon_hoc->ma }}"
		@foreach ($mon as $check)
			@if ($check->ma== $mon_hoc->ma)
				checked
			@endif
		@endforeach
		id="defaultCheck1">
		<label class="form-check-label" >
			{{ $mon_hoc->ten }}
		</label>
	  </div>	
		@endforeach
		<input  type="hidden" name="ma_nganh_hoc" value="{{ $ma }}"
	<br>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection