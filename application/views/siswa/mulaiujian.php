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

        <header class="main-header" style="margin-bottom: 50px;">
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <span class="navbar-brand"><span class="fa fa-mortar-board"></span><b> C</b>omputer <b>B</b>ased <b>T</b>est</span>
                    </div>
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
                                <li><a href="#">Sisa waktu : <span id="countdown"></span></a></li>
                            </ul>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?= base_url() ?>assets/dist/img/user1.png" class="user-image" alt="User Image">
                                    <?php foreach ($getAkun as $akun) : ?> <?php endforeach; ?>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?= $akun['nama_siswa']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?= base_url(); ?>assets/dist/img/user1.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?= $akun['nama_siswa']; ?>
                                            <small><?= $akun['nipd']; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="text-center">
                                            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
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
        <div class="content-wrapper" style="padding-top: 5px;">
            <div class="container">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <form action="<?= base_url(); ?>c_ujian/jawab" method="POST" id="form" onchange="form.submit()">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel" style="border-color:rgb(252, 186, 3)">
                                    <div class="panel-heading" style="background-color: rgb(252, 186, 3); color:white">
                                        <h3 class="panel-title"><?= $nama_ujian; ?> <span>(<?= $mapel; ?>)</span></h3>
                                    </div>
                                    <input type="hidden" name="id_siswa" value="<?= $akun['id_siswa']; ?>">
                                    <input type="hidden" name="id_ujian" value="<?= $id_ujian; ?>">
                                    <input type="hidden" name="nipd" value="<?= $akun['nipd']; ?>">
                                    <div class="panel-body">
                                        <?php $jumlah = count($getSoal); ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($getSoal as $soal) : ?>
                                            <div class="form-group" style="margin-left: 20px;">
                                                <h4>
                                                    <?= $no . "."; ?>
                                                    <?= vigenere_d(affine_d($soal['soal'])); ?>
                                                </h4>
                                            </div>
                                            <!-- radio -->
                                            <div class="form-group" style="margin-left: 40px;">
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
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                        <div class="margin">
                                            <button type="submit" name="jawab" class="btn btn-warning pull-right text-bold" onclick="return confirm('Yakin? jawaban sudah terisi semua?');">Hentikan Tes!</button>
                                            <input type="submit" name="submit" id="submit" style="opacity: 0;">
                                        </div>

                                    </div>
                                </div>
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
    <!-- <p id="countdown"></p> -->

    <?php
    foreach ($getTimer as $row) {
        $timer = $row['timer'];
    }
    $waktu = "$timer";
    $waktu = strval($waktu);
    ?>
    <script>
        // Mengatur waktu akhir perhitungan mundur
        var waktu = <?= json_encode($waktu); ?>;
        // var countDownDate = new Date("Oct 19, 2021 07:55:00").getTime();

        var countDownDate = new Date(waktu).getTime();

        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {

            // Untuk mendapatkan tanggal dan waktu hari ini
            var now = new Date().getTime();

            // Temukan jarak antara sekarang dan tanggal hitung mundur
            var distance = countDownDate - now;

            // Perhitungan waktu untuk hari, jam, menit dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Keluarkan hasil dalam elemen dengan id = "demo"
            document.getElementById("countdown").innerHTML = minutes + " Menit " + seconds + "  ";

            // Jika hitungan mundur selesai, tulis beberapa teks 
            // if (distance < 0) {
            //     clearInterval(x);
            //     document.getElementById("countdown").innerHTML = "WAKTU HABIS";
            // }
            if (distance < 0) {
                window.setTimeout(function() {
                    document.getElementById("submit").click();
                }); // 1200000 = seconds*1000
            }
        }, 1000);
    </script>

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