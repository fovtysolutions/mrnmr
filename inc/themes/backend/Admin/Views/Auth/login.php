<div class="az-signup-wrapper">
    <?php _ec($this->include('Backend\Admin\Views\Auth\authheading'), false) ?>
    <div class="az-column-signup">
        <div class="logo">
            <img src="<?= base_url((isset($setting->logo) ? $setting->logo : 'assets/img/logo.png')) ?>" alt="MR n MR" class="logo-image">
        </div>
        <div class="az-signup-header">
            <h4>Login to your account</h4>
            <form action="" id="formid">
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
                </div><!-- form-group -->
                <div class="form-group mb-2 password-wrapper">
                    <label>Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter your password" required>
                        <span class="toggle-password">
                            <i id="eyeIcon1" class="fas fa-eye"></i>
                        </span>
                    </div>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-primary" id="submitbtn">Login</button>
                <input type="hidden" id="csrfpro" name="<?php echo csrf_token(); ?>" value="<?php echo csrf_hash(); ?>">
            </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
            <p>Forgot Password? <a href="<?= base_url('/forgot') ?>">Reset now</a></p>
            <p>Don't have an account? <a href="<?= base_url('/register') ?>">Register now</a>.</p>
        </div><!-- az-signin-footer -->
    </div><!-- az-column-signup -->
</div><!-- az-signup-wrapper -->

<script>
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const inputField = this.previousElementSibling;
            const eyeIcon = this.firstElementChild;

            if (inputField.type === 'password') {
                inputField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                inputField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    });
</script>
<?php echo view('common_script/formsubmit', ['formid'=>'formid', 'submitbtn'=>'submitbtn', 'formurl' => 'login']); ?>

