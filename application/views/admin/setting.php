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
                    <li class="active"><a href="<?= base_url('c_admin/kelas_guru') ?>"><i class="fa fa-circle-o text-warning"></i> Kelas - Guru</a></li>
                </ul>
            </li>

            <li class="header">ADMINISTRATOR </li>
            <li class="">
                <a href="<?= base_url('c_admin/user_management'); ?>" rel="noopener noreferrer">
                    <i class="fa fa-users"></i> <span>User Management</span>
                </a>
            </li>
            <li class="active">
                <a href="">
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
            Setting
            <small>Hapus Data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('c_admin'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="">Setting</li>
            <li class="">Hapus Data</li>
        </ol>

        <!-- /.box-header -->
    </section>

    <section class="content">
        <!-- notif flash -->
        <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-data-gagal" data-flashgagal="<?= $this->session->flashdata('flashgagal'); ?>"></div>
        <!-- Main content GURU -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger box-solid">
                    <div class="box-header">
                        <h3 class="box-title">
                            Kosongkan Semua Tabel
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <p>
                            Semua data pada tabel akan di Hapus! <i>Terkecuali akun</i> <b>ADMIN</b>
                        </p>
                        <a href="<?= base_url(); ?>c_admin/deltable/1" class="btn btn-danger btn-flat tombol-hapus">
                            <i class="fa fa-trash"></i> Kosongkan Table
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>