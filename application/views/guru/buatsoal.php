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
            <li class="active">
                <a href="<?= base_url() ?>c_guru/banksoal">
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
            Soal
            <small>Buat Soal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Buat Soal</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Buat Soal</h3>
                        <div class="box-tools pull-right">
                            <a href="<?= base_url() ?>c_guru/banksoal" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?= base_url() ?>c_soal/tmbsoal" method="post">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Guru (Mata Pelajaran)</label>
                                    <select class="form-control select2" disabled="disabled" style="width: 100%;">
                                        <?php foreach ($getAkun as $akun) : ?>
                                            <option><?= $akun['nama_guru'] . ' (' . $akun['nama_mapel'] . ')' ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="guru" value="<?= $akun['id_guru']; ?>:<?= $akun['mapel_id']; ?>">
                                </div>
                                <label>Soal</label>
                                <!-- <div class="form-group">
                                    <textarea class="form-control summernote" name="soal" rows="3" required></textarea>
                                </div> -->
                                <div class="form-group">
                                    <textarea class="form-control" name="soal" rows="3" autofocus required></textarea>
                                </div>
                                <label>Jawaban A</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="opsi_a" rows="2" required></textarea>
                                </div>
                                <label>Jawaban B</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="opsi_b" rows="2" required></textarea>
                                </div>
                                <label>Jawaban C</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="opsi_c" rows="2" required></textarea>
                                </div>
                                <label>Jawaban D</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="opsi_d" rows="2" required></textarea>
                                </div>
                                <label>Jawaban E</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="opsi_e" rows="2" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kunci Jawaban</label>
                                    <select name="k_jawaban" class="form-control" style="width: 100%;">
                                        <option selected disabled>-- Pilih Kunci Jawaban --</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <br>
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