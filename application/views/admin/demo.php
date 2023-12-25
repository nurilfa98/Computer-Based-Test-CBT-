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
                <p><?= strtoupper($user['username']) ?></p>
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
                    <i class="fa fa-folder"></i> <span>Data Master</span>
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
            <li class="active">
                <a href="<?= base_url('c_admin/demo'); ?>">
                    <i class="fa fa-lock"></i> <span>DEMO KRIPTOGRAFI</span>
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
            Demo
            <small>Demo Kriptografi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Demo Kriptografi</li>
        </ol>

        <!-- /.box-header -->
    </section>

    <!-- Main content -->
    <section class="content margin">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Demo Kriptografi</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url() ?>c_admin/demo_proses" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInput">Enkripsi</label>
                                <input type="text" name="textinput" class="form-control" id="exampleInput" placeholder="Masukkan Plaintext.." autofocus autocomplete="off">
                            </div>
                            <?php foreach ($demo as $d) : ?> <?php endforeach; ?>
                            <input type="hidden" name="id_demo" value="<?= $d['id_demo'] ?>">
                            <div class="form-group">
                                <label for="exampleInput">Ciphertext</label>
                                <input type="text" name="text" class="form-control" id="exampleInput" value="<?= $d['teks'] ?>" placeholder="Ciphertext.." readonly disabled autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Dekripsi</label>
                                <input type="text" name="text" class="form-control" id="exampleInput" value="<?= vigenere_d(affine_d($d['teks'])); ?>" readonly disabled placeholder="Hasil Dekripsi.." autocomplete="off">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn bg-purple">Reset</button>
                                <button type="submit" class="btn btn bg-maroon">Proses</button>
                            </div><br>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>