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
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Chuyên Ngành</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('insert_nganh_hoc') }}">Thêm chuyên ngành</a></li>
                                    <li><a href="{{ route('get_all_nganh_hoc') }}">Quản lí chuyên ngành</a></li>
                                   
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Hình thức thi</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('insert_kieu_diem') }}">Thêm Hình thức</a></li>
                                    <li><a href="{{ route('get_all_kieu_diem') }}">Quản lí Hình thức</a></li>
                                   
                                </ul>
                            </li>                                                                                             
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>