<div class="az-signup-wrapper">
    <?php _ec($this->include('Backend\Admin\Views\Auth\authheading'), false) ?>
    <div class="az-column-signup">
        <div class="logo">
            <img src="<?= base_url((isset($setting->logo) ? $setting->logo : 'assets/img/logo.png')) ?>" alt="MR n MR" class="logo-image">
        </div>
        <div class="az-signup-header">
            <h2>Welcome Back</h2>
            <h4>Forgot Password</h4>
            <form action="" id="formid">
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-primary" id="submitbtn">Submit</button>
                <input type="hidden" id="csrfpro" name="<?php echo csrf_token(); ?>" value="<?php echo csrf_hash(); ?>">
            </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
            <p>Remembered your password? <a href="<?= base_url('/login') ?>">Login now</a>.</p>
            <p>Don't have an account? <a href="<?= base_url('/register') ?>">Register now</a>.</p>
        </div><!-- az-signin-footer -->
    </div><!-- az-column-signup -->
</div><!-- az-signup-wrapper -->
<?php echo view('common_script/formsubmit', ['formid' => 'formid', 'submitbtn' => 'submitbtn', 'formurl' => 'forgot']); ?>