<div class="az-signup-wrapper">
    <?=view('auth/main_heading')?>
    <div class="az-column-signup">
      <div class="logo">
        <img src="<?=base_url('assets/img/logo.png')?>" alt="MR n MR" class="logo-image">
      </div>
      <div class="az-signup-header">
        <h4>Login to your account</h4>
        <form action="">
          <div class="form-group mb-2">
            <label>Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
          </div><!-- form-group -->
          <div class="form-group mb-2 password-wrapper">
          <label>Password</label>
          <div class="password-container">
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            <span class="toggle-password">
              <i id="eyeIcon1" class="fas fa-eye"></i>
            </span>
          </div>
        </div><!-- form-group -->
        <button type="button" class="btn btn-primary" id="loginbtn">Login</button>
        <input type="hidden" id="csrfpro" name="<?php echo csrf_token(); ?>" value="<?php echo csrf_hash(); ?>">
        </form>
      </div><!-- az-signup-header -->
      <div class="az-signup-footer">
        <p>Forgot Password? <a href="<?=base_url('/forgotpassword')?>">Reset now</a></p>
        <p>Don't have an account? <a href="<?=base_url('/register')?>">Register now</a>.</p> 
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

  <script>
    $(document).ready(function() {
      $("#loginbtn").click(function() {
      let email = $("#email").val();
      let password = $("#password").val();
      var csrfTokenValue = $('#csrfpro').val();
          
      if (!email) {
        toastr.error("Please enter your email!");
        return;
      }

      if (!password) {
        toastr.error("Please enter your password!");
        return;
      }
      // Validate Password
      $("#loginbtn").val("Please wait...");
          $.ajax({
              type:"POST",
              url:"<?= base_URL("login")?>",
              data: {
                  email: email,
                  password: password,
              },
              headers: {
                  'X-CSRF-TOKEN': csrfTokenValue,
              },
          }).done(function(response) {
              if (response.status === 'success') {
                $('#csrfpro').val(response.new_csrf_token);
                toastr.success(response.massage);
                setTimeout(() => {
                  location.href = "<?=base_url()?>";
                }, 2000);
              } else if (response.status === 'error') {
                $('#csrfpro').val(response.new_csrf_token);
                toastr.error(response.massage);
                  setTimeout(() => {
                      $("#loginbtn").val("Register");
                  }, 3000);
              }
          })
      })
  })
  </script>