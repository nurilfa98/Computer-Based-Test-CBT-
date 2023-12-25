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
                <a href="#">
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
            <small>BANK Soal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">BANK Soal</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">BANK Soal</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notif flash -->
                        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <div class="margin">
                            <a href="<?= base_url(); ?>c_soal/buat" class="btn bg-purple btn-flat btn-md"><i class="fa fa-plus"></i> Buat Soal</a>
                            <button type="submit" class="btn btn-flat btn-md bg-maroon" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Reload</button>
                        </div>

                        <!-- Modal Detail -->
                        <?php foreach ($soal as $s) : ?>
                            <div class="modal fade" id="myModal<?= $s['id_soal']; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content flat">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-center bold" id="myModalLabel"><b>D</b>etail <b>S</b>oal <b>U</b>jian</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group" style="margin-left: 20px; margin-right:30px;">
                                                <ul type="square">
                                                    <li>
                                                        <h4><?php echo " " . vigenere_d(affine_d($s['soal'])); ?></h4>
                                                    </li>
                                                </ul>
                                                <ol type="A" style="padding-left: 60px;">
                                                    <h4>
                                                        <li><?= vigenere_d(affine_d($s['opsi_a'])); ?></li>
                                                    </h4>
                                                    <h4>
                                                        <li><?= vigenere_d(affine_d($s['opsi_b'])); ?></li>
                                                    </h4>
                                                    <h4>
                                                        <li><?= vigenere_d(affine_d($s['opsi_c'])); ?></li>
                                                    </h4>
                                                    <h4>
                                                        <li><?= vigenere_d(affine_d($s['opsi_d'])); ?></li>
                                                    </h4>
                                                    <h4>
                                                        <li><?= vigenere_d(affine_d($s['opsi_e'])); ?></li>
                                                    </h4>
                                                </ol>
                                                <?php $jwb = vigenere_d(affine_d($s['jawaban'])); ?>
                                                <?php if ($jwb == 'A') : ?>
                                                    <h4 style="padding-left: 40px;"><?php echo "Jawaban : <b>" . vigenere_d(affine_d($s['jawaban'])) . "</b>"; ?> &nbsp;<i class="fa fa-thumbs-o-up text-success"></i></h4>
                                                <?php elseif ($jwb == 'B') : ?>
                                                    <h4 style="padding-left: 40px;"><?php echo "Jawaban : <b>" . vigenere_d(affine_d($s['jawaban'])) . "</b>"; ?> &nbsp;<i class="fa fa-thumbs-o-up text-success"></i></h4>
                                                <?php elseif ($jwb == 'C') : ?>
                                                    <h4 style="padding-left: 40px;"><?php echo "Jawaban : <b>" . vigenere_d(affine_d($s['jawaban'])) . "</b>"; ?> &nbsp;<i class="fa fa-thumbs-o-up text-success"></i></h4>
                                                <?php elseif ($jwb == 'D') : ?>
                                                    <h4 style="padding-left: 40px;"><?php echo "Jawaban : <b>" . vigenere_d(affine_d($s['jawaban'])) . "</b>"; ?> &nbsp;<i class="fa fa-thumbs-o-up text-success"></i></h4>
                                                <?php elseif ($jwb == 'E') : ?>
                                                    <h4 style="padding-left: 40px;"><?php echo "Jawaban : <b>" . vigenere_d(affine_d($s['jawaban'])) . "</b>"; ?> &nbsp;<i class="fa fa-thumbs-o-up text-success"></i></h4>
                                                <?php endif; ?>
                                                <h5 class="text-right"><b>Dibuat pada : </b><?php echo vigenere_d(affine_d($s['created_on'])); ?></h5>
                                                <?php if ($s['update_on']) : ?>
                                                    <h5 class="text-right"><b>Terakhir diUpdate : </b><?php echo vigenere_d(affine_d($s['update_on'])); ?></h5>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat fa fa-arrow-left" data-dismiss="modal"> Kembali</button>
                                            <a href="<?= base_url() ?>c_soal/ubahsoal/<?= $s['id_soal']; ?>" class="btn btn-warning btn-flat fa fa-edit"> Edit Soal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- tutup modal detail -->

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>SOAL</th>
                                    <th>TANGGAL DIBUAT</th>
                                    <th>TANGGAL UPDATE</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $no = 1; ?>
                                <?php foreach ($soal as $s) : ?>
                                    <tr>
                                        <td width=""><?= $no; ?></td>
                                        <td width=""><?= vigenere_d(affine_d($s['soal'])); ?></td>
                                        <td width=""><?= vigenere_d(affine_d($s['created_on'])); ?></td>
                                        <?php if (empty($s['update_on'])) : ?>
                                            <td width="">Belum di Update</td>
                                        <?php else : ?>
                                            <td width=""><?= vigenere_d(affine_d($s['update_on'])); ?></td>
                                        <?php endif; ?>
                                        <td width="">
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-default fa fa-eye" data-toggle="modal" data-target="#myModal<?= $s['id_soal']; ?>" data-placement="right" title="detail"></button>
                                                <a href="<?= base_url(); ?>c_soal/ubahsoal/<?= $s['id_soal']; ?>" class="btn btn-sm btn-warning fa fa-pencil" data-placement="left" title="Edit data"></a>
                                                <a href="<?= base_url(); ?>c_soal/hapus/<?= $s['id_soal']; ?>" class="btn btn-sm btn-danger tombol-hapus fa fa-trash" data-placement="right" title="Hapus data"></a>
                                            </div>
                                        </td>
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