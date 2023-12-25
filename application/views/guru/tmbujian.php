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
                <a href="<?= base_url() ?>c_guru/banksoal">
                    <i class="fa fa-file-text-o"></i> <span>BANK Soal</span>
                </a>
            </li>
            <li class="active">
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
            Ujian Siswa
            <small>Tambah Ujian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Ujian Siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Ujian</h3>
                        <div class="box-tools pull-right">
                            <a href="<?= base_url() ?>c_guru/ujian" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?= base_url() ?>c_ujian/tmbujian" method="post">
                            <div class="col-md-2"></div>
                            <?php foreach ($getAkun as $akun) : ?>
                            <?php endforeach; ?>
                            <input type="hidden" name="id_guru" value="<?= $akun['id_guru']; ?>">
                            <input type="hidden" name="id_mapel" value="<?= $akun['id_mapel']; ?>">
                            <div class="col-md-8">
                                <label for="ujian">Nama Ujian</label>
                                <div class="form-group">
                                    <input type="text" name="nama_ujian" id="ujian" class="form-control" placeholder="Tulis Nama Ujian.." required autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control" style="width: 100%;" required autocomplete="off">
                                        <option selected disabled>-- Pilih Kelas Ujian --</option>
                                        <?php foreach ($getKelas as $k) : ?>
                                            <option value="<?= $k['id_kelas'] ?>|<?= $k['id_jurusan'] ?>"><?= $k['nama_kelas'] . ' ' . $k['nama_jurusan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="number" name="waktu" class="form-control" id="waktu" placeholder="Berapa Menit.." required required autocomplete="off">
                                </div>
                                <div class="form-group pull-right">
                                    <button type="reset" class="btn btn-flat btn-default"><i class="fa fa-rotate-left"></i> Reset</button>
                                    <button type="submit" id="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
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