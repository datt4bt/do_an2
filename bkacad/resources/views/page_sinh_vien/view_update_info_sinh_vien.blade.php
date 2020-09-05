@extends('giao_dien_sinh_vien.index')
@section('content')
<div id="main-content" class=" ">
    <a href="{{ route('sv.info_user_sinh_vien') }}"><button type="button" class="btn btn-info">Trở về</button></a>
    @if (Session::has('loi_ten'))
  
   <script>
       alert("Email hoặc số điện thoại đã tồn tại. Vui lòng thử lại");
   </script>
        
    @endif
       
            

              
                    <h2 style="text-align: center" class="title">Cập nhập Thông tin cá nhân</h2>                           
             

                

            
       
        <div class="clearfix"></div>


     
                        <div class="content">
                            
                            
                               
                            </div>
                            <div class="uprofile-info">
                               <form action="{{ route('sv.process_update_info_sinh_vien') }}" method="POST" class="needs-validation">
                                   {{ csrf_field() }}
                                <table class="table">
                                   
                                    <tr>
                                        <td>Họ và Tên</td>
                                        <td><input type="text" class="form-control" id="validationCustom01" value="{{ $info_detail->ten }}" name="ten"  required></td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính</td>
                                        <td> 
                                            <input type="radio" value="1"  name="gioi_tinh" checked>  Nam
                                         
                                          
                                            <input type="radio" value="0" name="gioi_tinh" @if($info_detail->gioi_tinh==0) 
                                            checked
                                                
                                            @endif>  Nữ
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td><input type="date" class="form-control" id="validationCustom01" value="{{ $info_detail->ngay_sinh }}" name="ngay_sinh"  required></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><input type="text" class="form-control" id="validationCustom01" value="{{ $info_detail->sdt }}" name="sdt"  required></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><input type="text" class="form-control" id="validationCustom01" value="{{ $info_detail->dia_chi }}" name="dia_chi"  required></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="email"  class="form-control" value="{{ $info_detail->email }}" name="email"  ></td>
                                    </tr>
                                   
                                
                                <tr>
                                    <td></td>
                                    <td> <button type="submit" class="btn btn-primary">Cập nhập</button></td>
                                </tr>
                            </table>
                               </form>
                            </div>
                           
                           

                        </div>
                       



                                



                               


                           



</div>
<!-- END CONTENT -->
@endsection