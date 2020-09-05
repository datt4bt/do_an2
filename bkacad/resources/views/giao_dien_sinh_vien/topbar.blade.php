<div class="topbar">

                        <div class="topbar-left	d-none d-lg-block">
                            <div class="text-center">
                                
                             <a href="{{ route('sv.view_diem_tung_sinh_vien') }}"> <img src="{{ asset('images/bkacad.jpg') }}" class="logo" width="255px"  height="70px" alt="logo"></a>
                            </div>
                        </div>

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                
                               
                               

                               

                                    
                                    <li class="list-inline-item dropdown notification-list">
                                   
                               
                                       
                                     
                                     @if (Session::get('anh')=='')
                                     <a class="mdi mdi-bell-outline noti-icon" data-toggle="dropdown" href="#" role="button"
                                     aria-haspopup="false" aria-expanded="false">
                                     
                                      <span class="mdi mdi-account-circle"></span>
                                  </a>
                                     @else
                                     <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                     aria-haspopup="false" aria-expanded="false">
                                      <img src="{{ asset('storage').'/'. Session::get('anh') }}" alt="user" class="rounded-circle">
                                  </a>
                                     @endif
                                    
                                        
                                   
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                        <a class="dropdown-item" href="{{ route('sv.info_user_sinh_vien') }}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>Thông tin tài khoản</a>
                                        
                                        <a class="dropdown-item" href="{{ route('logout_sinh_vien') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i>Đăng xuất</a>
                                    </div>
                                </li>

                            </ul>

                           

                            <div class="clearfix"></div>

                        </nav>

                    </div>