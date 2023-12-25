<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <img src="<?= base_url(); ?>assets/dist/img/sma1mdr.png" class="tengah">
        <h3 class="text-center">
            <b>C</b>omputer <b>B</b>ased <b>T</b>est
        </h3>
        <p class="login-box-msg">Login Page User</p>

        <?php echo $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth'); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" id="username" class="form-control" placeholder="Username" name="username" autocomplete="off" autofocus value="<?= set_value('username'); ?>">
                <span class="fa fa-user form-control-feedback"></span>
                <?= form_error('username', '<span class="text-danger pl-3">', '<span>'); ?>
            </div>

            <div class="form-group has-feedback">
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?= form_error('password', '<span class="text-danger pl-3">', '<span>'); ?>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login!</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <hr>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->