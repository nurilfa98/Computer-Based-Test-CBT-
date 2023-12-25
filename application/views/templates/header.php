<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $tittle; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/pace/pace.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-lite.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="assets/bower_components/timepicker/bootstrap-timepicker.min.css">

  <script type="text/javascript">
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      var curr_second = today.getSeconds();

      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }

      if (curr_hour == 0) {
        curr_hour = 12;
      }
      if (curr_hour == 12) {
        curr_hour = curr_hour - 12;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      curr_second = checkTime(curr_second);

      document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  </script>

  <style>
    @media print {

      .box-title,
      .box-header,
      .with-border,
      .main-footer {
        display: none;
      }


    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CBT</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>C</b>omputer<b> B</b>ased<b> T</b>est</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if ($user['role_id'] == 1) : ?>
                  <img src="<?= base_url() ?>assets/dist/img/icon_admin.png" class="user-image" alt="User Image">
                <?php elseif ($user['role_id'] == 2) : ?>
                  <img src="<?= base_url() ?>assets/dist/img/guru_l.png" class="user-image" alt="User Image">
                <?php else : ?>
                  <img src="<?= base_url() ?>assets/dist/img/user1.png" class="user-image" alt="User Image">
                <?php endif; ?>
                <span class="hidden-xs">Hai, <?= ucwords(dekrip($user['username'])); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php if ($user['role_id'] == 1) : ?>
                    <img src="<?= base_url() ?>assets/dist/img/icon_admin.png" class="img-circle" alt="User Image">
                  <?php elseif ($user['role_id'] == 2) : ?>
                    <img src="<?= base_url() ?>assets/dist/img/guru_l.png" class="img-circle" alt="User Image">
                  <?php else : ?>
                    <img src="<?= base_url() ?>assets/dist/img/user1.png" class="img-circle" alt="User Image">
                  <?php endif; ?>


                  <p>
                    <?= ucwords(dekrip($user['username'])); ?>
                    <small></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Edit Profile</a>
                  </div> -->
                  <div class="text-center">
                    <a href="<?= base_url('auth/logout'); ?>" class=" btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>