<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $tittle; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <span class="navbar-brand"><span class="fa fa-mortar-board"></span><b> C</b>omputer <b>B</b>ased <b>T</b>est</span>
                    </div>
                    <!-- <div class="navbar-header pull-right">
                        <span class="navbar-brand" id="time"></span>
                    </div> -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <!-- <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        </ul> -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><span id="time"></span></a></li>
                            </ul>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?= base_url() ?>assets/dist/img/siswa.png" class="user-image" alt="User Image">
                                    <?php foreach ($getAkun as $akun) : ?> <?php endforeach; ?>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?= $akun['nama_siswa']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?= base_url(); ?>assets/dist/img/siswa.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?= $akun['nama_siswa']; ?>
                                            <small><?= $akun['nipd']; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Edit Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $nama_ujian; ?> <small><?= $mapel; ?></small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <form action="" method="POST">
                            <div class="col-md-8">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">
                                            <?php if (empty($no)) : ?>
                                                Soal ke - <?php echo $no = 1; ?>
                                            <?php else : ?>
                                                Soal ke - <?php echo $no; ?>
                                            <?php endif; ?>
                                        </h3>
                                        <h3 class="box-title pull-right">
                                            Sisa waktu :&nbsp; <span class="pull-right" id=""></span>
                                        </h3>
                                    </div>
                                    <div class="box-body">
                                        <?php if (isset($soalByID)) : ?>
                                            <?php foreach ($soalByID as $soal) : ?> <?php endforeach; ?>
                                        <?php else : ?>
                                            <?php foreach ($getSoal as $soal) : ?> <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php $jumlah = count($getSoal); ?>
                                        <?= vigenere_d(affine_d($soal['soal'])); ?>
                                        <!-- radio -->
                                        <div class="form-group">
                                            <input type="hidden" name="id[]" value="<?= $soal['id_soal']; ?>">
                                            <input type="hidden" name="jumlah" value="<?= $jumlah; ?>">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="opsi[<?= $soal['id_soal']; ?>]" value="A">
                                                    <?= vigenere_d(affine_d($soal['opsi_a'])); ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="opsi[<?= $soal['id_soal']; ?>]" id="optionsRadios2" value="B">
                                                    <?= vigenere_d(affine_d($soal['opsi_b'])); ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="opsi[<?= $soal['id_soal']; ?>]" id="optionsRadios2" value="C">
                                                    <?= vigenere_d(affine_d($soal['opsi_c'])); ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="opsi[<?= $soal['id_soal']; ?>]" id="optionsRadios2" value="D">
                                                    <?= vigenere_d(affine_d($soal['opsi_d'])); ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="opsi[<?= $soal['id_soal']; ?>]" id="optionsRadios2" value="E">
                                                    <?= vigenere_d(affine_d($soal['opsi_e'])); ?>
                                                </label>
                                            </div>
                                        </div>

                                        <hr>
                                        <div style="margin-bottom: 10px;">
                                            <?php foreach ($getSoal as $soal) : ?> <?php endforeach; ?>
                                            <?php $sebelum = $no - 1; ?>
                                            <?php $selanjut = $no + 1; ?>
                                            <a href="<?= base_url(); ?>c_siswa/m?id=<?= $id; ?>&t=<?= $t; ?>&s=<?= $soal['id_soal'] - 1; ?>&n=<?= $sebelum; ?>" class="btn btn-default">Soal Sebelumnya</a>
                                            <?php if (($selanjut - 1) == 2) : ?>
                                                <button type="button" class="btn block btn-danger disabled">Soal Terakhir</button>
                                            <?php else : ?>
                                                <a href="<?= base_url(); ?>c_siswa/m?id=<?= $id; ?>&t=<?= $t; ?>&s=<?= $soal['id_soal']; ?>&n=<?= $selanjut; ?>" class="btn btn-default">Soal Selanjutnya</a>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Nomor Soal
                                            <span class="pull-right"></span>
                                        </h3>
                                    </div>
                                    <div class="box-body">
                                        <?php $no = 1; ?>
                                        <?php foreach ($getSoal as $soal) : ?>
                                            <a href="<?= base_url(); ?>c_siswa/m?id=<?= $id; ?>&t=<?= $t; ?>&s=<?= $soal['id_soal']; ?>&n=<?= $no; ?>" class="btn btn-default"><?= $no; ?></a>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <button type="submit" name="jawab" class="btn btn-primary form-control text-bold">Hentikan Tes!</button>
                            </div>
                        </form>
                    </div>

                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2021 Skripsi <a href="https://www.youtube.com/rilngegame354" target="_blank">nurilfa98</a>.</strong> All rights
                reserved.
            </div>
            <!-- /.container -->
        </footer>
    </div>
    <!-- ./wrapper -->
    <!--Kode untuk mencegah seleksi teks, block teks dll.-->
    <script type="text/javascript">
        function disableSelection(e) {
            if (typeof e.onselectstart != "undefined") e.onselectstart = function() {
                return false
            };
            else if (typeof e.style.MozUserSelect != "undefined") e.style.MozUserSelect = "none";
            else e.onmousedown = function() {
                return false
            };
            e.style.cursor = "default"
        }
        window.onload = function() {
            disableSelection(document.body)
        }
    </script>

    <!--Kode untuk mematikan fungsi klik kanan di blog-->
    <script type="text/javascript">
        function mousedwn(e) {
            try {
                if (event.button == 2 || event.button == 3) return false
            } catch (e) {
                if (e.which == 3) return false
            }
        }
        document.oncontextmenu = function() {
            return false
        };
        document.ondragstart = function() {
            return false
        };
        document.onmousedown = mousedwn
    </script>
    <!--Kode untuk mencegah shorcut keyboard, view source dll.-->
    <script type="text/javascript">
        window.addEventListener("keydown", function(e) {
            if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {
                e.preventDefault()
            }
        });
        document.keypress = function(e) {
            if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {}
            return false
        }
    </script>
    <script type="text/javascript">
        document.onkeydown = function(e) {
            e = e || window.event;
            if (e.keyCode == 123 || e.keyCode == 18) {
                return false
            }
        }
    </script>
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


    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <!-- iCheck 1.0.1 -->
</body>

</html>