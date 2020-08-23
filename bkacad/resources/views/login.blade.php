
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Drixo - Responsive Booststrap 4 Admin & Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{ asset('css/morris.css') }}" >
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
       @stack('css')

    </head>


    <body class="fixed-left">

      
        
        <!-- Begin page -->
        <div class="accountbg">
            
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        @if (Session::has('error'))
                                        {{Session::get('error')}}
                                            
                                        @endif
                
                                        <h4 class="text-muted text-center font-18"><b>Đăng nhập</b></h4>
                                        <h5 class="text-muted text-center font-13" ><b>(chỉ giáo vụ và giáo viên)</b></h5>
                
                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" action="{{ route('process_login') }}" method="POST">
                                               {{ csrf_field() }}
                                                  
    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" name="ten_admin" type="text" required="" placeholder="Tên đăng nhập">
                                                    </div>
                                                </div>
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" name="mat_khau" type="password" required="" placeholder="Mật khẩu">
                                                    </div>
                                                </div>
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                                    </div>
                                                </div>
                
                                               
                                            </form>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
      

    </body>
</html>