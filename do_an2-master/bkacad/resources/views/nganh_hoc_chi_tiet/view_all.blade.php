@extends('giao_dien.index')
@section('content')

	

		@foreach ($array_nganh_hoc as $nganh_hoc)
	
				<a  style="margin-left: 5%" href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">{{$nganh_hoc->ten}}</a>
				
				
		
		@endforeach
		<hr>
		@foreach ($nganh_hoc_chi_tiet as $chi_tiet)
	
		<a  style="margin-left: 5%" href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">d{{$chi_tiet->ma_mon_hoc}}</a>
		
		

@endforeach
@endsection