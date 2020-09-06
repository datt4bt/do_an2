<div class="topbar">

                        <div class="topbar-left	d-none d-lg-block">
                            <div class="text-center">
                                
                                <img src="{{ asset('images/bkacad.jpg') }}" class="logo" width="255px"  height="70px" alt="logo">
                            </div>
                        </div>

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item notification-list dropdown d-none d-sm-inline-block">
                                    <form action="{{ route('tim_kiem') }}" role="search" class="app-search" method="GET">
                                        <div class="form-group mb-0"> 
                                        <input type="text" name="tim_kiem" class="form-control"  placeholder="Bạn muốn tìm gì?">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form> 
                                </li>
                               
                               

                               

                                    
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
                                        <a class="dropdown-item" href="{{ route('account.info_user') }}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>Thông tin tài khoản</a>
                                        
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i>Đăng xuất</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>