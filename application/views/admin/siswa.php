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
                    <li><a href="<?= base_url('c_admin/guru'); ?>"><i class="fa fa-circle-o text-info"></i> Master Guru</a></li>
                    <li class="active"><a href="<?= base_url('c_admin/siswa'); ?>"><i class="fa fa-circle-o text-maroon"></i> Master Siswa</a></li>
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
            Siswa
            <small>Data Siswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Data Master</li>
            <li class="">Master Siswa</li>
        </ol>
        <!-- /.box-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Master Data Siswa</h3>
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
                        <div class="modal fade focusModal" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content flat">
                                    <form action="<?= base_url('C_siswa/add') ?>" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah data Siswa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>NIPD</label>
                                                <input type="number" name="nipd" id="nipd" class="form-control flat inputTextFocus" placeholder="Masukkan NIPD.." autocomplete="off" autofocus maxlength="9" min="0" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" name="siswa" id="siswa" class="form-control flat" placeholder="Masukkan Nama Siswa.." autocomplete="off" autofocus maxlength="35" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jk" class="form-control select2" style="width: 100%;" required>
                                                    <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="kelas" class="form-control select2" style="width: 100%;" required>
                                                    <option selected disabled>-- Pilih Kelas --</option>
                                                    <?php foreach ($kelas as $k) : ?>
                                                        <option value="<?= $k['id_kelas'] . '|' . $k['jurusan_id']; ?>"><?= $k['nama_kelas'] . ' ' . $k['nama_jurusan']; ?></option>
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
                        <?php foreach ($siswa as $s) : ?>
                            <div class="modal fade focusModal" id="myModalubah<?= $s['id_siswa']; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content flat">
                                        <form action="<?= base_url('c_siswa/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Ubah Data Siswa</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" id="id" name="id" value="<?= $s['id_siswa']; ?>">
                                                <div class="form-group">
                                                    <label>NIPD</label>
                                                    <input type="text" value="<?= $s['nipd']; ?>" name="nipd" id="nipd" class="form-control flat" onfocus="this.selectionStart = this.selectionEnd = this.value.length;" placeholder="Masukkan NIPD.." autocomplete="off" autofocus maxlength="9" min="0" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Siswa</label>
                                                    <input type="text" value="<?= $s['nama_siswa']; ?>" name="siswa" id="siswa" class="form-control flat" placeholder="Masukkan Nama siswa.." autocomplete="off" autofocus maxlength="35" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select name="jk" class="form-control select2" style="width: 100%;" required>
                                                        <option selected disabled>-- Pilih Jenis Kelamin</option>
                                                        <?php if ($s['jenis_kelamin'] == 'L') : ?>
                                                            <option value="L" selected>Laki-laki</option>
                                                        <?php else : ?>
                                                            <option value="L">Laki-laki</option>
                                                        <?php endif; ?>
                                                        <?php if ($s['jenis_kelamin'] == 'P') : ?>
                                                            <option value="P" selected>Perempuan</option>
                                                        <?php else : ?>
                                                            <option value="P">Perempuan</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select name="kelas" class="form-control select2" style="width: 100%;" required>
                                                        <option selected disabled>-- Pilih Kelas --</option>
                                                        <?php foreach ($kelas as $k) : ?>
                                                            <?php if ($s['kelas_id'] == $k['id_kelas']) : ?>
                                                                <option selected value="<?= $k['id_kelas'] . '|' . $k['jurusan_id']; ?>"><?= $k['nama_kelas'] . ' ' . $k['nama_jurusan']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $k['id_kelas'] . '|' . $k['jurusan_id']; ?>"><?= $k['nama_kelas'] . ' ' . $k['nama_jurusan']; ?></option>
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
                                    <th class="disable">NO.</th>
                                    <th>NIPD</th>
                                    <th>NAMA SISWA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>KELAS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $no = 1; ?>
                                <?php foreach ($siswa as $s) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $s['nipd']; ?></td>
                                        <td><?= $s['nama_siswa']; ?></td>
                                        <?php if ($s['jenis_kelamin'] == 'L') : ?>
                                            <td>Laki-laki</td>
                                        <?php else : ?>
                                            <td>Perempuan</td>
                                        <?php endif; ?>
                                        <td><span class="badge bg-blue"><?= $s['nama_kelas'] . ' ' . $s['nama_jurusan']; ?></span></td>
                                        <td>
                                            <div class="text-center">
                                                <?php if ($s['tmb_user'] == 0) : ?>
                                                    <a href="<?= base_url(); ?>c_siswa/tmbuser/<?= $s['id_siswa']; ?>" class="btn btn-sm btn bg-green fa fa-user-plus" data-placement="right" title="Tambah User"></a>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-sm btn-warning fa fa-pencil" data-toggle="modal" data-target="#myModalubah<?= $s['id_siswa']; ?>" data-placement="left" title="Edit data"></button>

                                                <a href="<?= base_url(); ?>c_siswa/hapus/<?= $s['id_siswa']; ?>" class="btn btn-sm btn-danger tombol-hapus fa fa-trash" data-placement="right" title="Hapus data"></a>
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