<form action="{{ route('process_update_kieu_diem',['ma'=>$kieu_diem->ma]) }}" method="post">
	{{csrf_field()}}
	
	Tên 
	<input type="text" value="{{ $kieu_diem->ten }}" name="ten">
	<button>Sửa</button>
</form>