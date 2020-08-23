@extends('giao_dien.index')
@section('content')
<div id="main-content" class=" ">
    
    @if (Session::has('error'))
  
   <script>
       alert("Tên đăng nhập hoặc email đã tồn tại. Vui lòng thử lại");
   </script>
        
    @endif
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-left" style="text-align: center">
                    <h2 class="title">Thông tin cá nhân</h2>                           
                 </div>

                

            </div>
        </div>
        <div class="clearfix"></div>


     
                        <div class="content">
                            <div class="uprofile-image">
                                <img  height="350px" src="{{ asset('storage').'/'. Session::get('anh') }}" class="img-responsive">
                               
                                <hr>
                            </div>
                            <a href="{{ route('account.insert_anh') }}"><button type="button" class="btn btn-primary">Thay đổi ảnh đại diện</button></a>
                            <div class="uprofile-name">
                                <h3>
                                    <a href="">{{ $info_detail->ten_admin }}</a>
                                  
                                    <span class="uprofile-status online"></span>
                                </h3>
                               
                            </div>
                            <div class="uprofile-info">
                               <form action="{{ route('account.process_update_info') }}" method="POST" class="needs-validation">
                                   {{ csrf_field() }}
                                <table class="table">
                                    <tr>
                                        <td>Tên đăng nhập</td>
                                        <td><input type="text" class="form-control" id="validationCustom01" value="{{ $info_detail->ten }}" name="ten"  required></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="email"  value="{{ $info_detail->email }}" name="email"  ></td>
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