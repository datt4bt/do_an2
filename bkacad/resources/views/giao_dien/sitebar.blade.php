<div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <div class="left-side-logo d-block d-lg-none">
                    <div class="text-center">
                        
                        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/logo-dark.png') }}" height="20" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    
                    <div id="sidebar-menu">
                        <ul>
                          

                            <li>
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="mdi mdi-home"></i>
                                    <span> Trang Chủ <span class="badge badge-success badge-pill float-right"></span></span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Khóa học</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('khoa.insert') }}">Thêm Khóa học</a></li>
                                    <li><a href="{{ route('khoa.get_all') }}">Quản lí Khóa học</a></li>
                                   
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Chuyên Ngành</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('nganh_hoc.insert') }}">Thêm Chuyên ngành</a></li>
                                    <li><a href="{{ route('nganh_hoc.get_all') }}">Quản lí Chuyên ngành</a></li>
                                   
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Hình thức thi</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('kieu_diem.insert') }}">Thêm Hình thức</a></li>
                                    <li><a href="{{ route('kieu_diem.get_all') }}">Quản lí Hình thức</a></li>
                                   
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Môn học</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('mon_hoc.insert') }}">Thêm Môn học</a></li>
                                    <li><a href="{{ route('mon_hoc.get_all') }}">Quản lí Môn học</a></li>
                                   
                                </ul>
                            </li>  
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Ngành học chi tiết</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    @foreach($array_nganh as $nganh_hoc)
                                    <li><a href="{{ route('nganh_hoc_chi_tiet.get_all',['ma'=>$nganh_hoc->ma]) }}">{{ $nganh_hoc->ten }}</a></li>
                                    @endforeach
                                   
                                    
                                   
                                </ul>
                            </li>  
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Lớp</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('lop.insert') }}">Thêm Lớp</a></li>
                                    <li><a href="{{ route('lop.get_all') }}">Quản lí Lớp</a></li>
                                   
                                </ul>
                            </li> 
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Sinh viên</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('sinh_vien.insert') }}">Thêm Sinh viên</a></li>
                                    <li><a href="{{ route('sinh_vien.get_all') }}">Quản lí Sinh viên</a></li>
                                   
                                </ul>
                            </li>                                                                                               
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>