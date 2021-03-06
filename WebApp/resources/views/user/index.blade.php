<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Korisnik | Upravljačka ploča</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/selectric.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="css/select2.min.css">

    <link rel="stylesheet" href="css/user.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="user" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Korisnik</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/avtar.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="images/avtar.png" class="img-circle" alt="User Image">

                                    <p>
                                        {{Auth::user()->name}}
                                        <small>Member since {{Auth::user()->created_at}}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/profile" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Odjava</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="images/avtar.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Pretraživanje...">
                        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Upravljačka ploča</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="/user"><i class="fa fa-circle-o"></i> Profil</a></li>
                            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Projekti</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Statistika</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Projekti</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Korisnici</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Administracija
                    <small>Upravljačka ploča</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$project_num}}</h3>

                                <p>Projekti</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-list"></i>
                            </div>
                            <a href="#" class="small-box-footer">Pregled <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$project_stat}}<sup style="font-size: 20px">%</sup></h3>

                                <p>Zauzeti projekti</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Pregled <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$user_num}}</h3>

                                <p>Registrirani korisnici</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Pregled <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ count($online_users) }}</h3>

                                <p>Broj aktivnih korisnika</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-eye"></i>
                            </div>
                            <a href="#" class="small-box-footer">Pregled <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <p class="col-lg-11 col-md-11 col-sm-11 error text-center alert alert-danger hidden"></p>
                <div id="postSuccess" class="col-lg-11 col-md-11 col-sm-11 alert alert-success alert-dismissible hidden" role="alert">
                  Uspješna prijava na projekt:
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="row">

                    <!-- Left col -->
                    <section class="col-lg-12 col-sm-12 col-md-12 nofloat text-center">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <div class="table-responsive">
                              <table class=" table table-borderless text-center" id="table">
                                <tr>
                                  <th class="col-lg-2 col-md-2 col-sm-1">Naslov</th>
                                  <th class="col-lg-1 col-md-1 col-sm-1">Mentor</th>
                                  <th class="col-lg-1 col-md-1 col-sm-1">Broj studenata</th>
                                  <th class="col-lg-6 col-md-6 col-sm-3">Opis</th>
                                  <th >Akcije</th>
                                </tr>
                                {{ csrf_field() }}

                                @foreach($projects as $project)
                                  <tr class="item{{$project->id}}" class="col-lg-1 col-md-1 col-sm-1">
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->mentor}}</td>
                                    <td>{{$project->size}}</td>
                                    <td>{{$project->description}}</td>
                                    @if ($project->taken == 1)
                                      <td>
                                      <button disabled class="edit-modal btn btn-warning" data-id="{{$project->id}}" data-title="{{$project->title}}" data-description="{{$project->description}}" data-mentor="{{$project->mentor}}" data-size="{{$project->size}}" data-team="{{$project->team}}" data-taken="{{$project->taken}}">
                                        <span class="glyphicon glyphicon-edit"></span> Zauzet
                                      </button>
                                    </td>
                                    @else
                                      <td>
                                      <button class="edit-modal btn btn-success" data-id="{{$project->id}}" data-title="{{$project->title}}" data-description="{{$project->description}}" data-mentor="{{$project->mentor}}" data-size="{{$project->size}}" data-team="{{$project->team}}" data-taken="{{$project->taken}}">
                                        <span class="glyphicon glyphicon-edit"></span> Prijavi
                                      </button>
                                    </td>
                                    @endif
                                  </tr>
                                @endforeach
                              </table>
                              <div class="text-center">
                                {{ $projects->links() }}
                              </div>
                            </div>
                          <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" id="appendNum">
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="id">ID :</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fid" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="title">Naslov:</label>
                                      <div class="col-sm-10">
                                        <input type="name" class="form-control" id="t" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-sm-2" for="mentor">Mentor:</label>
                                    <div class="col-sm-10">
                                      <input type="name" class="form-control" id="mnt" disabled>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="description">Opis:</label>
                                    <div class="col-sm-10">
                                      <input type="name" class="form-control" id="d" disabled>
                                  </div>

                              </div>
                              <div class="form-group">
                              <label class="control-label col-sm-2" for="size">Broj studenata:</label>
                              <div class="col-sm-10">
                                <input type="name" class="form-control" id="stnum" disabled>
                              </div>
                            </div>
                                  </form>

                                  <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                                      <span id="footer_action_button" class='glyphicon'> </span>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                      <span class='glyphicon glyphicon-remove'></span> Odustani
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.nav-tabs-custom -->

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-12 connectedSortable">
                      <div class="col-lg-6">
                        <!-- Map box -->
                        <div class="box box-solid bg-light-blue-gradient col-lg-6">
                            <div class="box-header">
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                      <i class="fa fa-minus"></i></button>
                                </div>

                                <i class="fa fa-users"></i>

                                <h3 class="box-title">
                                    Registrirani korisnici
                                </h3>
                            </div>
                            <div class="box-body">
                              <div class="table-responsive">
                                <table class="table table-borderless">
                                  <tr>
                                    <th>Ime</th>
                                    <th>E-mail</th>
                                  </tr>

                                  @foreach($users as $user)
                                    <tr class="user{{$user->id}}">
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                    </tr>
                                  @endforeach
                                </table>
                                <div class="text-center">
                                  {{ $users->links() }}
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body-->

                        </div>
                        <!-- /.box -->
                      </div>


                        <!-- Calendar -->
                        <div class="col-lg-6">
                          <div class="box box-solid bg-green-gradient col-lg-6">
                              <div class="box-header">
                                  <i class="fa fa-calendar"></i>

                                  <h3 class="box-title">Kalendar</h3>
                                  <!-- tools box -->
                                  <div class="pull-right box-tools">
                                      <!-- button with a dropdown -->

                                      <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                                      <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                                  </div>
                                  <!-- /. tools -->
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body no-padding">
                                  <!--The calendar -->
                                  <div id="calendar" style="width: 100%"></div>
                              </div>
                              <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>


                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2017 <a href="http://www.fer.unizg.hr/">FER</a>.</strong> All rights reserved.
        </footer>


    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
      <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
      <script src="js/jquery.selectric.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.hr.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="js/admin.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>
    <script src="js/select2.full.min.js"></script>

    <script type="text/javascript">

    // Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text("Prijavi");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Prijava');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#mnt').val($(this).data('mentor'));
    $('#std').val($(this).data('team'));
    $('#stnum').val($(this).data('size'));
    $('#t').val($(this).data('title'));
    $('#d').val($(this).data('description'));
    $('#myModal').modal('show');
    $('#postSuccess').addClass('hidden');
    $('.error').addClass('hidden');
    // KOD za prikazivanje studenata
    var teamSize = parseInt($('#stnum').val());



    /*for (var i = 1; i <= teamSize; i++) {
      $('#appendNum').append("<div class='form-group appendStudent'><label class='control-label col-sm-2' for='team'>Student</label><div class='col-sm-10'><select class='dynamic' multiple='multiple' name='multiple'></select></div>");
    }*/
    $('#appendNum').append("<div class='form-group appendStudent'><label class='control-label col-sm-2'  for='team'>Studenti: </label><div class='col-lg-10'><select class='col-lg-12 col-sm-12 col-md-12' id='dynamic' multiple='multiple' name='multiple'></select></div>");

    var userNum;
    var users = [];
    $.get("/allUsers").done(function(data){
    userNum = data.length;

    for (var i = 0; i < userNum; i++) {
      $('#dynamic').append('<option>' + data[i] + '</option>');
    }
    /*$('#dynamic').selectric();
    $('#dynamic').selectric('refresh');*/
    $('#dynamic').select2();
    $("#dynamic").select2({
      maximumSelectionLength: teamSize,
      tokenSeparators: [',', ' ']
    });
    });

});

$('#myModal').on('hide.bs.modal', function () {
    $( ".appendStudent" ).remove();
});
// kraj koda

  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/applyItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#fid').val(),
          'team': $('#dynamic').val(),

      },
      success: function(data) {
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors);
        } else {
          $('#postSuccess').removeClass('hidden');
          $('#postSuccess').append("<strong>" + data.success + "</strong>");
          setTimeout(
            function()
            {
              location.reload()
              //do something special
            }, 3000);
        }
      }
  });
});


</script>
</body>

</html>
