<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/dist/img/guru_l.png" class="img-circle" alt="User Image">
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
                <a href="<?= base_url('c_guru/banksoal'); ?>">
                    <i class="fa fa-file-text-o"></i> <span>BANK Soal</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('c_guru/ujian'); ?>">
                    <i class="fa fa-diamond"></i> <span>Ujian Siswa</span>
                </a>
            </li>
            <li class="header">REPORT </li>
            <li>
                <a href="<?= base_url('c_guru/h_ujian'); ?>">
                    <i class="fa fa-file"></i> <span>Hasil Ujian</span>
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
        <div class="col-md-6">
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <h2 class="box-title" style="padding-bottom: 15px;"> Informasi Akun</h2>
                    <div class="box-body no-padding">
                        <table class="table table-bordered table-striped">
                            <?php foreach ($getAkun as $akun) : ?> <?php endforeach; ?>
                            <tbody>
                                <tr>
                                    <th width="150px">Nama</th>
                                    <th width="15px">:</th>
                                    <td><?= $akun['nama_guru']; ?></td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <th>:</th>
                                    <td><?= $akun['nip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>:</th>
                                    <td><?= $akun['nama_mapel']; ?></td>
                                </tr>
                                <tr>
                                    <th>Daftar Kelas</th>
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
                        </table>
                    </div>
                </div>

                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>