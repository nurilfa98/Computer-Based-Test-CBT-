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
            <li>
                <a href="<?= base_url('c_guru'); ?>">
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
            <li class="active">
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
            Ujian
            <small>Hasil Ujian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Hasil Ujian</li>
        </ol>
        <!-- /.box-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hasil Ujian</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notif flash -->
                        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA UJIAN</th>
                                    <th>NAMA KELAS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $no = 1; ?>
                                <?php foreach ($getMapelUjian as $mu) : ?>
                                    <?php if ($mu['status'] == 0) : ?>
                                        <tr>
                                            <td width=""><?= $no; ?></td>
                                            <td width=""><?= $mu['nama_ujian'] ?></td>
                                            <td width="" align="center">
                                                <button class="btn-sm btn-info">
                                                    <?= $mu['nama_kelas'] . ' ' . $mu['nama_jurusan'] ?>
                                                </button>
                                            </td>
                                            <td width="">
                                                <div class="text-center">
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url(); ?>c_guru/detail/<?= $mu['id_ujian']; ?>">
                                                        <i class="fa fa-print"></i> Cetak
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>