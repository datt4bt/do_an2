@extends('giao_dien.index')
@section('content')
<div id="main-content" class=" ">
    

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
                                <table class="table">
                                    <tr>
                                        <td>Tên đăng nhập</td>
                                        <td><b>{{ $info_detail->ten }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><b>{{ $info_detail->email }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Chức vụ</td>
                                        <td>@if ($info_detail->cap_do==0)
                                           <b> Giáo vụ</b>
                                        @else
                                           <b> Giáo viên</b>
                                        @endif</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="">
                               
                               <a href="{{ route('account.view_update_info') }}"> <button type="button" class="btn btn-primary">Thay đổi thông tin </button></a>
                               
                            </div>
                           

                        </div>
                       



                                



                               


                           



</div>
<!-- END CONTENT -->
@endsection