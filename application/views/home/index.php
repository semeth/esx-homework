<?php $this->load->view('common/header'); ?>

<div class="page-container">
    <div class="form-container">
        <div class="d-flex p-2 border rounded">
            <button class="btn btn-dark btn-block m-0 mr-1 form-action" data-action="login">Login</button>
            <button class="btn btn-dark btn-block m-0 mr-1 form-action" data-action="register">Register</button>
        </div>
        <div class="form-contract login-form">
            <?php echo form_open('account/login', array('id'=> 'form-login', 'data-redirect' => base_url('account/index'))); ?>
                <div class="form-group">
                    <label for="firstname">Email Address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-success btn-block">
                </div>
            <?php echo form_close(); ?>
        </div>
        <div class="form-contract register-form active">
            <?php echo form_open('account/register', array('id'=> 'form-register')); ?>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="repeat_password">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <div class="login-errors position-absolute sticky-top"><?php echo (isset($error_message)) ? $errot_message : ''; ?></div>
</div>
<?php $this->load->view('common/footer'); ?>