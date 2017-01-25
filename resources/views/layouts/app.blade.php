<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url('css/app.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('css/jquery-ui.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src='{{url("js/jquery.js")}}'></script>
    <script src='{{url("js/select2.full.js")}}'></script>
    <script src='{{url("js/jquery-ui.js")}}'></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{url('/img/dishub.png')}}" class='img-responsive' width="30" height="30"/> 
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class='fa fa-user-o'></i>&nbsp; Kepegawaian <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                        <li><a href="{{ url('/kepegawaian/pangkat_golongan/index') }}"><i class='fa fa-arrows-v'></i>&nbsp; Pangkat & Golongan</a></li>
                                        <li><a href="{{ url('/pensiun') }}"><i class='fa fa-clock-o'></i>&nbsp; Pensiun</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{url('/kepegawaian/perpanjang_tks')}}"><i class='fa fa-line-chart'></i>&nbsp;Perpanjang Masa Kerja TKS</a></li>
                                        <li><a href="{{url('/kepegawaian/perpanjang_tkk')}}"><i class='fa fa-check-square-o'></i>&nbsp;Perpanjang Kontrak TKK</a></li>

                                </ul>
                             </li>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class='fa fa-database'></i>&nbsp; Data Master <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                        <li><a href="{{ url('/pangkat/index') }}"><i class='fa fa-child'></i>&nbsp; Master Golongan</a></li>
                                        <li><a href="{{ url('/pegawai') }}"><i class='fa fa-users'></i>&nbsp; Pegawai</a></li>
                                        <li><a href="{{ url('/riwayat_pendidikan/index') }}"><i class='fa fa-address-card'></i>&nbsp; Riwayat Pendidikan (PNS)</a></li>

                                </ul>
                             </li>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class='fa fa-list-alt'></i>&nbsp; Data Pegawai <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                        <li><a href="{{ url('/laporan/tkk') }}"><i class='fa fa-user-circle'></i>&nbsp; TKK</a></li>
                                        <li><a href="{{ url('/laporan/tks') }}"><i class='fa fa-users'></i>&nbsp; TKS</a></li>
                                        <li><a href="{{ url('/laporan/pns') }}"><i class='fa fa-child'></i>&nbsp; PNS</a></li>

                                </ul>
                             </li>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class='fa fa-print'></i>&nbsp; Cetak Data Pegawai <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                        <li><a href="{{ url('/laporan/tkk') }}"><i class='fa fa-user-circle'></i>&nbsp; Normatif TKK</a></li>
                                        <li><a href="{{ url('/laporan/tks') }}"><i class='fa fa-users'></i>&nbsp; Normatif TKS</a></li>
                                        <li><a href="{{ url('/laporan/pns') }}"><i class='fa fa-child'></i>&nbsp; Normatif PNS</a></li>

                                </ul>
                             </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <div id="footer-logo">
        
    </div>
    <!-- Scripts -->
    <script src="{{url('/js/app.js')}}"></script>
</body>
</html>
