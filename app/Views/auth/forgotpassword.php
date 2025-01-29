<div class="az-signup-wrapper">
  <?=view('auth/main_heading')?>
  <div class="az-column-signup">
    <div class="logo">
      <img src="<?=base_url('assets/img/logo.png')?>" alt="Fixcent" class="logo-image">
    </div>
    <div class="az-signup-header">
      <h2 style="color: seagreen;">Welcome Back</h2>
      <h4>Forgot Password</h4>
      <form action="password-reset-success.html">
      <div class="form-group mb-2">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
      </div><!-- form-group -->
      <button type="button" class="btn btn-primary" id="forgotbtn">Submit</button>
    </form>
    </div><!-- az-signup-header -->
    <div class="az-signup-footer">
    <p>Remembered your password? <a href="<?=base_url('/login')?>">Login now</a>.</p>
    <p>Don't have an account? <a href="<?=base_url('/register')?>">Register now</a>.</p>
    </div><!-- az-signin-footer -->
  </div><!-- az-column-signup -->
</div><!-- az-signup-wrapper -->

<script>
    $(document).ready(function() {
      $("#forgotbtn").click(function() {
          let email = $("#email").val();

       if (!email) {
        toastr.error("Please enter your email address.");
        return;
      }

      // Email Format Validation
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!emailPattern.test(email)) {
        toastr.error("Invalid email format. Please enter a valid email.");
        return;
      }

      $("#forgotbtn").val("Please wait...");
      $.ajax({
        type: "POST",
        url: "<?= base_URL("forgotpasswordpost") ?>",
        data: {
          email: email,
        },
      }).done(function (response) {
        if (response.status === 'success') {
          toastr.success(response.massage);
          setTimeout(() => {
            location.href = "<?= base_url('resetpassword') ?>";
          }, 2000);
        } else if (response.status === 'error') {
          toastr.error(response.massage);
          setTimeout(() => {
            $("#registerbtn").val("Register");
          }, 3000);
        }
      })

      // toastr.success("If this email is registered, a password reset link has been sent.");

      })
  })
  </script>