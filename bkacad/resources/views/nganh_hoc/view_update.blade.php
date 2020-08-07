<form action="{{ route('process_update_nganh_hoc',['ma'=>$nganh_hoc->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên Ngành Học
	<input type="text" value="{{ $nganh_hoc->ten }}" name="ten">
	<button>Sửa</button>
</form>