<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TICKET SYSTEM</title>
    
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php echo asset('bootstrap/css/bootstrap.min.css')?>" type="text/css">
       
    <!-- FontAwesome 4.3.0 -->
    <link rel="stylesheet" href="<?php echo asset('font-awesome/css/font-awesome.min.css')?>" type="text/css">
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo asset('dist/css/AdminLTE.min.css')?>" type="text/css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="<?php echo asset('dist/css/skins/_all-skins.min.css')?>" type="text/css">
    <style>
        .error{
            color:red;
            font-weight: normal;
        }
    </style>
    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{{ URL::asset('js/jQuery-2.1.4.min.js') }}"></script>   

  </head>
  <body class="skin-blue sidebar-mini">

    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>TICKET SYSTEM</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
        </nav>

        
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="{{ url('/categories')}}">
                <i class="fa fa-home"></i>
                <span>Category</span>
              </a>
            </li>  
            <li class="treeview">
              <a href="{{ url('/home')}}">
                <i class="fa fa-home"></i>
                <span>Ticket</span>
              </a>
            </li>  
          </ul>
        </section>
        <!-- /.sidebar -->

      </aside>

      
           
            @yield('content')
            
            
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>TICKET SYSTEM</b> Ticket System | Version 1.0
        </div>
        <strong>Copyright &copy; 2018<a href="<?php URL::to('/'); ?>">TICKET SYSTEM</a>.</strong> by TRUPTI GAONKAR... All rights reserved.
    </footer>
    

    <script type="text/javascript" src="<?php URL::to('/'); ?>assets/js/common.js" charset="utf-8"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/validation.js') }}"></script>

    
    
  
  </body>
</html>