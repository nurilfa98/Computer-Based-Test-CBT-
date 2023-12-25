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
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-folder active"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('c_admin/jurusan'); ?>"><i class="fa fa-circle-o text-success"></i> Master Jurusan</a></li>
                    <li class="active"><a href="<?= base_url('c_admin/kelas'); ?>"><i class="fa fa-circle-o text-danger"></i> Master Kelas</a></li>
                    <li><a href="<?= base_url('c_admin/mapel'); ?>"><i class="fa fa-circle-o text-warning"></i> Master Mapel</a></li>
                    <li><a href="<?= base_url('c_admin/guru'); ?>"><i class="fa fa-circle-o text-info"></i> Master Guru</a></li>
                    <li><a href="<?= base_url('c_admin/siswa'); ?>"><i class="fa fa-circle-o text-maroon"></i> Master Siswa</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>Relasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('c_admin/kelas_guru') ?>"><i class="fa fa-circle-o text-warning"></i> Kelas - Guru</a></li>
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
            Kelas
            <small>Data Kelas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Data Master</li>
            <li class="">Master Kelas</li>
        </ol>

        <!-- /.box-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Master Data Kelas</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notif flash -->
                        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <div class="flash-data-gagal" data-flashgagal="<?= $this->session->flashdata('flashgagal'); ?>"></div>
                        <div class="margin">
                            <button type="button" class="btn bg-purple btn-flat btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button>
                            <button type="submit" class="btn btn-flat btn-md bg-maroon" onClick="document.location.reload(true)"><i class="fa fa-refresh"></i> Reload</button>
                        </div>

                        <!-- Modal tambah -->
                        <div class="modal fade focusModal" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content flat">
                                    <form action="<?= base_url('c_kelas/add') ?>" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah data Kelas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Kelas</label>
                                                <input type="text" name="kelas" id="kelas" class="form-control flat inputTextFocus" placeholder="Masukkan nama kelas" autocomplete="off" autofocus maxlength="30" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <select name="jurusan" class="form-control select2" style="width: 100%;">
                                                    <option selected disabled>-- Pilih Jurusan --</option>
                                                    <?php foreach ($jurusan as $jn) : ?>
                                                        <option value="<?= $jn['id_jurusan']; ?>"><?= $jn['nama_jurusan']; ?></option>
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
                        <?php foreach ($kelas as $kls) : ?>
                            <div class="modal fade focusModal" id="myModalubah<?= $kls['id_kelas']; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content flat">
                                        <form action="<?= base_url('c_kelas/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Ubah data Kelas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Kelas</label>
                                                    <input type="hidden" id="id" name="id" value="<?= $kls['id_kelas']; ?>">
                                                    <input type="text" id="kelas" name="kelas" value="<?= $kls['nama_kelas']; ?>" class="form-control flat" placeholder="Masukkan nama kelas" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus autocomplete="off" maxlength="30" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jurusan</label>
                                                    <select name="jurusan" class="form-control select2" style="width: 100%;">
                                                        <option selected disabled>-- Pilih Jurusan --</option>
                                                        <?php foreach ($jurusan as $jn) : ?>
                                                            <?php if ($kls['jurusan_id'] == $jn['id_jurusan']) : ?>
                                                                <option selected value="<?= $jn['id_jurusan']; ?>"><?= $jn['nama_jurusan']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $jn['id_jurusan']; ?>"><?= $jn['nama_jurusan']; ?></option>
                                                            <?php endif; ?>
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
                        <?php endforeach; ?>
                        <!-- tutup modal ubah -->

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA KELAS</th>
                                    <th>JURUSAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kelas as $kls) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $kls['nama_kelas']; ?></td>
                                        <td><?= $kls['nama_jurusan']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-sm btn-warning fa fa-pencil" data-toggle="modal" data-target="#myModalubah<?= $kls['id_kelas']; ?>" data-placement="left" title="Edit data"></button>

                                                <a href="<?= base_url(); ?>c_kelas/hapus/<?= $kls['id_kelas']; ?>" class="btn btn-sm btn-danger tombol-hapus fa fa-trash" data-placement="right" title="Hapus data"></a>
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