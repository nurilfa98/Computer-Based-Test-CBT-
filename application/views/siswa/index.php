<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/dist/img/user1.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= strtoupper(dekrip($user['username'])); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li class="active">
                <a href="">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('c_siswa/list'); ?>">
                    <i class="fa fa-diamond"></i> <span>Daftar Ujian</span>
                </a>
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
            Dashboard
            <small>Data Aplikasi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h2 class="box-title" style="padding-bottom: 15px;"> Informasi Akun</h2>
                        <div class="box-body no-padding">
                            <table class="table table-bordered table-striped">
                                <?php if ($getAkun) : ?>
                                    <?php foreach ($getAkun as $akun) : ?> <?php endforeach; ?>
                                    <tbody>
                                        <tr>
                                            <th width="150px">NIPD</th>
                                            <th width="15px">:</th>
                                            <td><?= $akun['nipd']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Siswa</th>
                                            <th>:</th>
                                            <td><?= $akun['nama_siswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <th>:</th>
                                            <?php if ($akun['jenis_kelamin'] == 'L') : ?>
                                                <td>Laki-laki</td>
                                            <?php else : ?>
                                                <td>Perempuan</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>:</th>
                                            <td>
                                                <?php foreach ($getAkun as $akun) : ?>
                                                    <p class="label label-primary" style="margin-right: 5px;">
                                                        <?= $akun['nama_kelas'] . ' ' .
                                                            $akun['nama_jurusan']; ?>
                                                    </p>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endif; ?>
                            </table>
                        </div>

                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="alert bg-yellow">
                    <h4>Tanggal<i class="pull-right fa fa-calendar-check-o"></i></h4>
                    <div class="icon">
                        <i class="fa "></i>
                    </div>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <?php
                    for ($i = 0; $i < 1; $i++) {
                        $hari  = $arr[0];
                        $bulan = $arr[1];
                    }
                    ?>
                    <h4 class="d-block"> <?= $hari . ', ' . date("d ") . $bulan . date(" Y") ?></h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert bg-red">
                    <h4>Jam<i class="pull-right fa fa-hourglass-half"></i></h4>
                    <div class="icon">
                        <i class="fa "></i>
                    </div>
                    <h4 class="d-block" id="time"></h4>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>