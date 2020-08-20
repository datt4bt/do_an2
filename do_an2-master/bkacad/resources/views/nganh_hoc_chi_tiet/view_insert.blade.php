@extends('giao_dien.index')
@section('content')
<h2 style="text-align: center">Thêm môn học</h2>
<form action=" {{ route('nganh_hoc_chi_tiet.process_insert') }} " method="post">
	{{csrf_field()}}
	
	<label for="exampleInputEmail1">Ngành học</label>
	<select class="form-control" name="ma_nganh_hoc">
		@foreach ($array_nganh_hoc_chi_tiet as $nganh_hoc)
			<option value="{{ $nganh_hoc->ma }}">{{ $nganh_hoc->ten }}</option>
		@endforeach
	  </select>
	  @foreach ($array_mon_hoc_chi_tiet as $mon_hoc)
	  <div class="form-check">
		<input class="form-check-input" type="checkbox" name="mon_hoc_chi_tiet[]" value="{{ $mon_hoc->ma }}" id="defaultCheck1">
		<label class="form-check-label" >
			{{ $mon_hoc->ten }}
		</label>
	  </div>	
		@endforeach
	  
	<br>
	<button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection