<!DOCTYPE html>
<html lang="en" class=" ">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard UII</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/css/font.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/js/datatables/datatables.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{asset('asset/css/app.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/js/select2/select2.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/js/select2/theme.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/js/nestable/nestable.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('asset/css/form.css')}}" type="text/css" />

        <script src="{{asset('asset/js/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('asset/js/bootstrap.js')}}"></script>
        <!-- App -->
        <script src="{{asset('asset/js/app.js')}}"></script> 
        <script src="{{asset('asset/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('asset/js/select2/select2.min.js')}}"></script>
        <script src="{{asset('asset/js/datatables/jquery.dataTables.min.js')}}"></script>
        <!--[if lt IE 9]>
          <script src="js/ie/html5shiv.js"></script>
          <script src="js/ie/respond.min.js"></script>
          <script src="js/ie/excanvas.js"></script>
        <![endif]-->
    </head>
    <body class="container">
        <section class="vbox">
            <header class="bg-primary header navbar navbar-fixed-top-xs">
                <div class="navbar-header aside-md">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a href="" class="navbar-brand"><img src="{{URL::to('asset/images/logo.png')}}" class="m-r-sm"></a>
                    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                    <?php $value = session('auth'); ?>
                    @if (!empty($value))
                    <li class="dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{$value['nama']}} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <span class="arrow top"></span>
                            <?php
                            $value = session('auth');
                            if ($value['group_id'] == 2) {
                                ?>
                                <li>
                                    <a href="{{URL::to('admin/user')}}">Aktivasi User</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('admin/ganti_password')}}" data-toggle="ajaxModal">Ganti Password</a>
                                </li>
                            <?php }
                            ?>
                            <li>
                                <a href="{{URL::to('logout')}}">Logout</a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="{{URL::to('login')}}">Login</a>
                    </li>
                    @endif
                </ul>      
            </header>
            <section>

                <section class="hbox stretch">
                    <section id="content">
                        @yield('content')
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
                    </section>
                    <aside class="bg-light lter b-l aside-md hide" id="notes">
                        <div class="wrapper">Notification</div>
                    </aside>
                </section>
            </section>
        </section>


        <!--
        
      <script src="js/datatables/jquery.csv-0.71.min.js"></script>
      <script src="js/datatables/demo.js"></script>
        <script src="js/app.plugin.js"></script>
        -->
        <script type="text/javascript">
        $('#table-user').dataTable({
    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
});
        </script>
    </body>
</html>