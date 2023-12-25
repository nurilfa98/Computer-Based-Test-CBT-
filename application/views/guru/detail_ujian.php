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
            <small>Detail Ujian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Detail Ujian</li>
        </ol>
        <!-- /.box-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <h3>DINAS PENDIDIKAN <br>SMA NEGERI 1 MANDIRANCAN</h3>
                    <h5>Jl. Siliwangi No. I A, Mandirancan, Kuningan, Kabupaten Kuningan, Jawa Barat 45558</h5>
                </div>

                <div class="box box-default" style="border-color:rgb(0, 0, 0)">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notif flash -->
                        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php foreach ($hasilUjian as $hu) : ?>
                        <?php endforeach; ?>
                        <h3 class="text-center"><?= ucwords($hu['nama_ujian']); ?></h3>
                        <table border="0">
                            <tr>
                                <td width="100px">Nama Guru</td>
                                <td width="10px">:</td>
                                <td><?= $hu['nama_guru']; ?></td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran </td>
                                <td>:</td>
                                <td><?= $hu['nama_mapel']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas </td>
                                <td>:</td>
                                <td><?= $hu['nama_kelas'] . " " . $hu['nama_jurusan']; ?></td>
                            </tr>
                        </table>
                        <br>
                        <table id="" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIPD</th>
                                    <th>NAMA</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $no = 1; ?>
                                <?php foreach ($hasilUjian as $hu) : ?>
                                    <tr>
                                        <td width=""><?= $no; ?></td>
                                        <td width=""><?= $hu['nipd']; ?></td>
                                        <td width=""><?= strtoupper($hu['nama_siswa']); ?></td>
                                        <td width=""><?= $hu['nilai'] ?></td>
                                    </tr>
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

<script>
    window.print();
</script>