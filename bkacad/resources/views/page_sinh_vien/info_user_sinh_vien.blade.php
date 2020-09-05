@extends('giao_dien_sinh_vien.index')
@section('content')
<div id="main-content" class=" ">
    
    <a href="{{ route('sv.view_diem_tung_sinh_vien') }}"><button type="button" class="btn btn-info">Trở về</button></a>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-left" style="text-align: center">
                    <h2 class="title">Thông tin cá nhân</h2>                           
                 </div>

                

            </div>
        </div>
        <div class="clearfix"></div>



                        <div class="content">
                            
                            
                            <div class="uprofile-info">
                                <table class="table">
                                    <tr>
                                        <td>Họ và Tên</td>
                                        <td><b>{{ $info_detail->ten }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính</td>
                                        <td><b>@if($info_detail->gioi_tinh==1)
                                            Nam
                                            @else
                                            Nữ
                                        @endif
                                    </b></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày Sinh</td>
                                        <td><b>{{ $info_detail->ngay_sinh }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><b>{{ $info_detail->sdt }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><b>{{ $info_detail->dia_chi }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><b>{{ $info_detail->email }}</b></td>
                                    </tr>
                                   
                                </table>
                            </div>
                            <div class="">
                               
                               <a href="{{ route('sv.view_update_info_sinh_vien') }}"> <button type="button" class="btn btn-primary">Thay đổi thông tin </button></a>
                               
                            </div>
                           

                        </div>
                       



                                



                               


                           



</div>
<!-- END CONTENT -->
@endsection