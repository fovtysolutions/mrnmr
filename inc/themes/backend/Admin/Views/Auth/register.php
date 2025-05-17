<?php 
    $db = \Config\Database::connect();
    $roles = $db->table('rolesandpermission')->get()->getResultArray();
?>
<div class="az-signup-wrapper">
    <?php _ec($this->include('Backend\Admin\Views\Auth\authheading'), false) ?>
    <div class="az-column-signup">
        <div class="logo">
            <img src="<?= base_url((isset($setting->logo) ? $setting->logo : 'assets/img/logo.png')) ?>" alt="MR n MR"
                class="logo-image">
        </div>
        <div class="az-signup-header">
            <h4>Create an Account to get started</h4>
            <form action="" id="formid">
                <div class="form-group col-12 ">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your full name" required>
                </div><!-- form-group -->
                <div class="d-flex gap-2">
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="mobile">Contact Number</label>
                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter your contact number" required>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <div class="form-group col-6">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Enter your age" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city" required>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <div class="form-group col-6">
                        <label for="profession">Profession</label>
                        <input type="text" class="form-control" name="profession" id="profession" placeholder="Enter your profession" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="familybg">Family Background</label>
                        <input type="text" class="form-control" name="familybg" id="familybg" placeholder="Enter your family background" required maxlength="25">
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <div class="form-group col-12">
                        <label for="profession">Role</label>
                        <select type="text" class="form-control" name="roleandpermissions" id="roleandpermissions" >
                            <option value="">Select Roles</option>
                            <?php foreach ($roles as $key => $value) { ?>
                                <option value="<?=$value['id']?>"><?=$value['role_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <div class="form-group password-wrapper col-6">
                        <label>Password</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
                            <span class="toggle-password">
                                <i id="eyeIcon1" class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group mb-2 password-wrapper col-6">
                        <label>Confirm Password</label>
                        <div class="password-container">
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm your password" required>
                            <span class="toggle-password">
                                <i id="eyeIcon2" class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div><!-- form-group -->
                </div>
                <button type="submit" class="btn btn-primary" id="submitbtn">Register</button>
                <input type="hidden" id="csrfpro" name="<?php echo csrf_token(); ?>" value="<?php echo csrf_hash(); ?>">
            </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer mt-3">
            <p>Already have an account? <a href="<?= base_url('/login') ?>">Login now</a>.</p>
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
<?php echo view('common_script/formsubmit', ['formid'=>'formid', 'submitbtn'=>'submitbtn', 'formurl' => 'register']); ?>
