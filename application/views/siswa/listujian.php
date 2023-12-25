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
            <li>
                <a href="<?= base_url('c_siswa'); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
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
            Ujian
            <small>Hasil Ujian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">List Ujian</li>
        </ol>
        <!-- /.box-header -->
    </section>

    <!-- Modal Ubah -->
    <?php foreach ($listUjian as $list) : ?>
        <div class="modal fade focusModal" id="myModalubah<?= $list['id_ujian']; ?>" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content flat">
                    <form action="<?= base_url('c_siswa/mulai') ?>" method="get" enctype="multipart/form-data" role="form">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?= $list['nama_ujian']; ?></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $list['id_ujian']; ?>">
                            <div class="form-group">
                                <label for="guru">NAMA GURU</label>
                                <input type="text" disabled value="<?= $list['nama_guru']; ?>" name="namaguru" id="guru" class="form-control flat" required>
                            </div>
                            <div class="form-group">
                                <label for="mapel">MATA PELAJARAN</label>
                                <input type="text" disabled value="<?= $list['nama_mapel']; ?>" name="mapel" id="mapel" class="form-control flat" required>
                            </div>
                            <div class="form-group">
                                <label for="token">TOKEN</label>
                                <input type="text" name="t" id="token" class="form-control flat" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" placeholder="Masukkan Token.." autocomplete="off" autofocus maxlength="5" min="0" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-flat">Mulai Ujian </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- tutup modal ubah -->

    <!-- Main content -->
    <section class="content">
        <!-- notif flash -->
        <div class="flash-data-token" data-flashtoken="<?= $this->session->flashdata('flashtoken'); ?>"></div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Ujian</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notif flash -->
                        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <button type="submit" class="btn btn-flat btn-md bg-maroon margin" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Reload</button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA UJIAN</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>NAMA GURU</th>
                                    <th>WAKTU</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $no = 1; ?>
                                <?php foreach ($listUjian as $list) : ?>
                                    <?php if ($list['status'] == 1) : ?>
                                        <tr>
                                            <td width=""><?= $no; ?></td>
                                            <td width=""><?= $list['nama_ujian']; ?></td>
                                            <td width=""><?= $list['nama_mapel']; ?></td>
                                            <td width=""><?= $list['nama_guru']; ?></td>
                                            <td width="" class="text-center"><?= $list['waktu'] ?> Menit</td>
                                            <td width="">
                                                <div class="text-center">
                                                    <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#myModalubah<?= $list['id_ujian']; ?>" data-placement="left" title="Mulai Ujian"><i class=" fa fa-edit"></i> Mulai Ujian</button>
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