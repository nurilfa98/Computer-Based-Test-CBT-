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
                    <li><a href="<?= base_url('c_admin/kelas'); ?>"><i class="fa fa-circle-o text-danger"></i> Master Kelas</a></li>
                    <li><a href="<?= base_url('c_admin/mapel'); ?>"><i class="fa fa-circle-o text-warning"></i> Master Mapel</a></li>
                    <li class="active"><a href="<?= base_url('c_admin/guru'); ?>"><i class="fa fa-circle-o text-info"></i> Master Guru</a></li>
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
            Guru
            <small>Data Guru</small>
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
                        <h3 class="box-title">Master Data Guru</h3>
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
                                    <form action="<?= base_url('c_guru/add') ?>" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah data Guru</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>NIP</label>
                                                <input type="number" name="nip" id="nip" class="form-control flat inputTextFocus" placeholder="Masukkan NIP.." autocomplete="off" autofocus maxlength="9" min="0" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Guru</label>
                                                <input type="text" name="guru" id="guru" class="form-control flat" placeholder="Masukkan Nama Guru.." autocomplete="off" autofocus maxlength="35" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Mata Pelajaran</label>
                                                <select name="mapel" class="form-control select2" style="width: 100%!important;" required>
                                                    <option selected disabled>-- Pilih Mata Pelajaran --</option>
                                                    <?php foreach ($mapel as $mp) : ?>
                                                        <option value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel']; ?></option>
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
                        <?php foreach ($guru as $g) : ?>
                            <div class="modal fade focusModal" id="myModalubah<?= $g['id_guru']; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content flat">
                                        <form action="<?= base_url('c_guru/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Ubah data Guru</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" id="id" name="id" value="<?= $g['id_guru']; ?>">
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input type="text" name="nip" id="nip" class="form-control flat" value="<?= $g['nip']; ?>" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus placeholder="Masukkan NIP.." autocomplete="off" maxlength="9" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input type="text" value="<?= $g['nama_guru']; ?>" name="guru" id="guru" class="form-control flat" placeholder="Masukkan Nama Guru.." autocomplete="off" autofocus maxlength="35" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mata Pelajaran</label>
                                                    <select name="mapel" class="form-control select2" style="width: 100%!important;">
                                                        <?php foreach ($mapel as $mp) : ?>
                                                            <?php if ($g['mapel_id'] == $mp['id_mapel']) : ?>
                                                                <option selected value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel']; ?></option>
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
                                    <th>NIP</th>
                                    <th>NAMA GURU</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($guru as $g) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $g['nip']; ?></td>
                                        <td><?= $g['nama_guru']; ?></td>
                                        <td><?= $g['nama_mapel']; ?></td>
                                        <td>
                                            <div class="text-center">
                                                <?php if ($g['tmb_user'] == 0) : ?>
                                                    <a href="<?= base_url(); ?>c_guru/tmbuser/<?= $g['id_guru']; ?>" class="btn btn-sm btn bg-green fa fa-user-plus" data-placement="right" title="Tambah User"></a>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-sm btn-warning fa fa-pencil" data-toggle="modal" data-target="#myModalubah<?= $g['id_guru']; ?>" data-placement="left" title="Edit data"></button>
                                                <a href="<?= base_url(); ?>c_guru/hapus/<?= $g['id_guru']; ?>" class="btn btn-sm btn-danger tombol-hapus fa fa-trash" data-placement="right" title="Hapus data"></a>
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