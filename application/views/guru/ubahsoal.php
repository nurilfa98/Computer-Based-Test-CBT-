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
            <small>Ubah Soal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Ubah Soal</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Soal</h3>
                        <div class="box-tools pull-right">
                            <a href="<?= base_url() ?>c_guru/banksoal" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?= base_url() ?>c_soal/ubhsoal" method="post">
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
                                <?php foreach ($soal as $s) : ?>
                                    <input type="hidden" name="id_soal" value="<?= $s['id_soal']; ?>">
                                    <label>Soal</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="soal" rows="3" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus required><?= vigenere_d(affine_d($s['soal'])); ?></textarea>
                                    </div>
                                    <label>Jawaban A</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="opsi_a" required><?= vigenere_d(affine_d($s['opsi_a'])); ?></textarea>
                                    </div>
                                    <label>Jawaban B</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="opsi_b" required><?= vigenere_d(affine_d($s['opsi_b'])); ?></textarea>
                                    </div>
                                    <label>Jawaban C</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="opsi_c" required><?= vigenere_d(affine_d($s['opsi_c'])); ?></textarea>
                                    </div>
                                    <label>Jawaban D</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="opsi_d" required><?= vigenere_d(affine_d($s['opsi_d'])); ?></textarea>
                                    </div>
                                    <label>Jawaban E</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="opsi_e" required><?= vigenere_d(affine_d($s['opsi_e'])); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kunci Jawaban</label>
                                        <select name="k_jawaban" class="form-control select2" style="width: 100%;">
                                            <option selected disabled>-- Pilih Kunci Jawaban --</option>
                                            <?php $jwb = vigenere_d(affine_d($s['jawaban'])); ?>
                                            <?php if ($jwb == 'A') : ?>
                                                <option selected value="A">A</option>
                                            <?php else : ?>
                                                <option value="A">A</option>
                                            <?php endif; ?>
                                            <?php if ($jwb == 'B') : ?>
                                                <option selected value="B">B</option>
                                            <?php else : ?>
                                                <option value="B">B</option>
                                            <?php endif; ?>
                                            <?php if ($jwb == 'C') : ?>
                                                <option selected value="C">C</option>
                                            <?php else : ?>
                                                <option value="C">C</option>
                                            <?php endif; ?>
                                            <?php if ($jwb == 'D') : ?>
                                                <option selected value="D">D</option>
                                            <?php else : ?>
                                                <option value="D">D</option>
                                            <?php endif; ?>
                                            <?php if ($jwb == 'E') : ?>
                                                <option selected value="E">E</option>
                                            <?php else : ?>
                                                <option value="E">E</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                <?php endforeach; ?>
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