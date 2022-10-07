<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li><a class="treeview-item" href="{{route('admin.participant.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Participants</a>

            </li>

            <li><a class="treeview-item" href="{{route('admin.investor.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Investors</a>

            </li>

            <li><a class="treeview-item" href="{{route('admin.leads.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Leads</a>

            </li>

            <li><a class="treeview-item" href="{{route('admin.winner.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Winners</a>

            </li>

            <li><a class="treeview-item" href="{{route('admin.dar-al-nashr.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Dour Al-Nashr</a>

            </li>
        </ul>
    </aside>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Dashboard </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Participant</li>
                <li class="breadcrumb-item"><a href="#">Index</a></li>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="tile">
                        <h3 class="tile-title">Participants</h3>

                        <h3 class="tile-title">Participants</h3>
                        <a class="btn btn-primary" href="{{route('admin.participant.exportods')}}">Export(.ods)</a>
                        <a class="btn btn-primary" href="{{route('admin.participant.exportcls')}}">Export(.csv)</a>
                        <a class="btn btn-primary" href="{{route('admin.participant.exportxls')}}">Export(.xls)</a>
                        <br>
                        <br>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>participation</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td>{{$participant->id}}</td>
                                        <td>{{$participant->first_name}}</td>
                                        <td>{{$participant->last_name}}</td>
                                        <td>{{$participant->phone}}</td>
                                        <td>{{$participant->email }}</td>
                                        <td>{{$participant->participation }}</td>
                                        <td>{{$participant->country->name}}</td>
                                        <td><a href="{{route('admin.participant.delete',$participant->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Number Of Participants</h3>

                        </div>
                        <div class="tile-body">
                            <h2>{{$participants->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript">$('#sampleTable1').DataTable();</script>
    <script type="text/javascript">$('#sampleTable2').DataTable();</script>
    <script type="text/javascript">$('#sampleTable3').DataTable();</script>
    <script type="text/javascript">$('#sampleTable4').DataTable();</script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
        	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        	    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	    ga('create', 'UA-72504830-1', 'auto');
      	    ga('send', 'pageview');
        }
    </script>
    @include('sweetalert::alert')
</body>
</html>
