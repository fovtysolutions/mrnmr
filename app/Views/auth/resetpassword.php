<div class="az-signup-wrapper">
  <?=view('auth/main_heading')?>
  <div class="az-column-signup">
    <div class="logo">
      <img src="<?=base_url('assets/img/logo.png')?>" alt="Fixcent" class="logo-image">
    </div>
    <div class="az-signup-header">
      <h2>Welcome Back</h2>
      <h4>Reset Your Password</h4>
      <form action="">
        <div class="form-group mb-2">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div><!-- form-group -->
        <div class="form-group mb-2 password-wrapper">
          <label>Password</label>
          <div class="password-container">
            <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
            <span class="toggle-password">
              <i id="eyeIcon1" class="fas fa-eye"></i>
            </span>
          </div>
        </div><!-- form-group -->
        <div class="form-group mb-2 password-wrapper">
          <label>Confirm Password</label>
          <div class="password-container">
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm your password" required>
            <span class="toggle-password">
              <i id="eyeIcon2" class="fas fa-eye"></i>
            </span>
          </div>
        </div><!-- form-group -->
        <button type="button" class="btn btn-primary" id="resetbtn" >Reset</button>
        <input type="hidden" id="csrfpro" name="<?php echo csrf_token(); ?>" value="<?php echo csrf_hash(); ?>">
      </form>
    </div><!-- az-signup-header -->
    <div class="az-signup-footer">
      <p>Remembered your password? <a href="<?=base_url('/login')?>">Login now</a>.</p>
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
      $("#resetbtn").click(function() {
          let email = $("#email").val();
          let password = $("#password").val();
          let confirmPassword = $("#confirmPassword").val();
          var csrfTokenValue = $('#csrfpro').val();

       // Check if email is valid
       const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!email) {
        toastr.error("Please enter your email.");
        return;
      } else if (!emailPattern.test(email)) {
        toastr.error("Invalid email format.");
        return;
      }

      // Check if password is entered
      if (!password) {
        toastr.error("Please create a password.");
        return;
      }

      // Check if confirm password is entered
      if (!confirmPassword) {
        toastr.error("Please confirm your password.");
        return;
      }

      // Check if passwords match
      if (password !== confirmPassword) {
        toastr.error("Passwords do not match. Please try again.");
        return;
      }
      $("#resetbtn").val("Please wait...");
      $.ajax({
        type: "POST",
        url: "<?= base_URL("resetPasswordpost") ?>",
        data: {
          email: email,
          password: password,
        },
        headers: {
                  'X-CSRF-TOKEN': csrfTokenValue,
              },
      }).done(function (response) {
        if (response.status === 'success') {
          $('#csrfpro').val(response.new_csrf_token);
          toastr.success(response.massage);
          setTimeout(() => {
            location.href = "<?= base_url('login') ?>";
          }, 2000);
        } else if (response.status === 'error') {
          $('#csrfpro').val(response.new_csrf_token);
          toastr.error(response.massage);
          setTimeout(() => {
            $("#resetbtn").val("Reset");
          }, 3000);
        }
      })


      // Success Message if validation passes
      // toastr.success("Password reset successful.");
      })
  })
  </script>