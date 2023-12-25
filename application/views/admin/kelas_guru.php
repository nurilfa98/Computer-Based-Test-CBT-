<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/dist/img/icon_admin.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= strtoupper(dekrip($user['username'])); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li class="">
                <a href="<?= base_url('c_admin') ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i><span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('c_admin/jurusan'); ?>"><i class="fa fa-circle-o text-success"></i> Master Jurusan</a></li>
                    <li><a href="<?= base_url('c_admin/kelas'); ?>"><i class="fa fa-circle-o text-danger"></i> Master Kelas</a></li>
                    <li><a href="<?= base_url('c_admin/mapel'); ?>"><i class="fa fa-circle-o text-warning"></i> Master Mapel</a></li>
                    <li><a href="<?= base_url('c_admin/guru'); ?>"><i class="fa fa-circle-o text-info"></i> Master Guru</a></li>
                    <li><a href="<?= base_url('c_admin/siswa'); ?>"><i class="fa fa-circle-o text-maroon"></i> Master Siswa</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-link active"></i><span>Relasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?= base_url('c_admin/kelas_guru') ?>"><i class="fa fa-circle-o text-warning"></i> Kelas - Guru</a></li>
                </ul>
            </li>

            <li class="header">ADMINISTRATOR </li>
            <li class="">
                <a href="<?= base_url('c_admin/user_management'); ?>" rel="noopener noreferrer">
                    <i class="fa fa-users"></i> <span>User Management</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('c_admin/setting'); ?>">
                    <i class="fa fa-cog"></i> <span>SETTING</span>
                </a>
            </li>
            <!-- <li>
                <a href="<?= base_url('c_admin/demo'); ?>">
                    <i class="fa fa-lock"></i> <span>DEMO KRIPTOGRAFI</span>
                </a>
            </li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelas Guru
            <small>Data Kelas Guru</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Relasi</li>
            <li class="">Kelas - Guru</li>
        </ol>
        <!-- /.box-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Relasi Data Kelas Guru</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notif flash -->
                        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <div class="margin">
                            <button type="button" class="btn bg-purple btn-flat btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button>
                            <button type="submit" class="btn btn-flat btn-md bg-maroon" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Reload</button>
                        </div>

                        <!-- Modal tambah -->
                        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content flat">
                                    <form action="<?= base_url('c_kelas_guru/add') ?>" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Kelas Guru</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="callout callout-info">
                                                    <h4><i class="fa fa-info-circle"></i> Informasi</h4>
                                                    Jika kolom Guru kosong, berikut ini kemungkinan penyebabnya :
                                                    <br>
                                                    <ol class="pl-3 text-justify">
                                                        <li>Anda belum menambahkan master data Guru (Master Guru kosong/belum ada data sama sekali).</li>
                                                        <li>Guru sudah ditambahkan, jadi anda tidak perlu tambah lagi. Anda hanya perlu mengedit data Kelas Guru nya saja.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="guru">Guru</label>
                                                <select name="guru" id="guru" class="form-control select2" style="width: 100%;" required>
                                                    <option selected disabled>-- Pilih Guru --</option>
                                                    <?php foreach ($grkg as $gr) : ?>
                                                        <?php if ($gr['id'] == NULL) : ?>
                                                            <option value="<?= $gr['id_guru']; ?>"><?= $gr['nama_guru']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <select name="kelas[]" id="kelas" multiple class="form-control select2" style="width: 100%!important" required>
                                                    <?php foreach ($kelas_jurusan as $k) : ?>
                                                        <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?> - <?= $k['nama_jurusan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary btn-flat">Simpan </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- tutup modal tambah -->

                        <!-- Modal Ubah -->
                        <?php foreach ($kelas_guru as $kg) : ?>
                            <div class="modal fade" id="myModalubah<?= $kg['guru_id']; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content flat">
                                        <form action="<?= base_url('c_kelas_guru/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Ubah data Kelas Guru</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="guru">Guru</label>
                                                    <input type="hidden" name="id" value="<?= $kg['guru_id']; ?>">
                                                    <?php foreach ($guru as $g) : ?>
                                                        <?php if ($kg['guru_id'] == $g['id_guru']) : ?>
                                                            <input type="hidden" name="guru" value="<?= $g['id_guru']; ?>">
                                                            <input type="text" class="form-control" readonly value="<?= $g['nama_guru']; ?>">
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kelas">Kelas</label>
                                                    <select name="kelas[]" id="kelasUbah<?= $kg['guru_id']; ?>" multiple class="form-control select2" style="width: 100%!important" required>
                                                        <?php foreach ($kelas_jurusan as $k) : ?>
                                                            <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?> - <?= $k['nama_jurusan'] ?></option>
                                                        <?php endforeach; ?>

                                                        <!-- <?php foreach ($relasi_kelas as $rk) : ?>
                                                                <?php if ($rk['guru_id'] == $kg['guru_id']) : ?>
                                                                    <option selected value="<?= $rk['id_kelas']; ?>"><?= $rk['nama_kelas']; ?> - <?= $rk['nama_jurusan'] ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary btn-flat">Simpan </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- tutup modal ubah -->

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="100px">NO.</th>
                                    <th width="200px">NIP</th>
                                    <th width="200px">NAMA GURU</th>
                                    <th width="300px">KELAS</th>
                                    <th width="200px">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kelas_guru as $kg) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $kg['nip']; ?></td>
                                        <td><?= $kg['nama_guru']; ?></td>
                                        <td>
                                            <?php foreach ($relasi_kelas as $rk) : ?>
                                                <?php if ($rk['guru_id'] == $kg['guru_id']) : ?>
                                                    <span class="badge bg-blue" style="margin-right: 5px;">
                                                        <?= $rk['nama_kelas']; ?>
                                                        <?= $rk['nama_jurusan']; ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <a class="btn btn-sm btn-warning fa fa-pencil" data-toggle="modal" data-target="#myModalubah<?= $kg['guru_id']; ?>" onclick="edit_periode(<?= $kg['guru_id']; ?>);" data-placement="left" title="Edit data"></a>

                                                <a href="<?= base_url(); ?>c_kelas_guru/hapus/<?= $kg['guru_id']; ?>" class="btn btn-sm btn-danger tombol-hapus fa fa-trash" data-placement="right" title="Hapus data"></a>
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