<div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <div class="left-side-logo d-block d-lg-none">
                    <div class="text-center">
                        
                        <a href="{{ route('sv.home_sinh_vien') }}" class="logo"><img src="{{ asset('images/bkacad.jpg') }}" height="20" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    
                    <div id="sidebar-menu">
                        <ul>
                          

                            <li>
                                <a href="{{ route('sv.home_sinh_vien') }}" class="waves-effect">
                                    <i class="mdi mdi-home"></i>
                                    <span> Trang Chủ <span class="badge badge-success badge-pill float-right"></span></span>
                                </a>
                            </li>
                           

                           
                           
                           
                          
                         
                          
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-minus"></i> <span>Điểm</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <li><a href="{{ route('sv.view_diem_tung_sinh_vien') }}">Xem Điểm</a></li>
                                    
                                    
                                    
                                  
                                </ul>
                          
                                                                                                                         
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>