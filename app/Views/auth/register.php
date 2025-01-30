<div class="az-signup-wrapper">
  <?= view('auth/main_heading') ?>
  <div class="az-column-signup">
    <div class="logo">
      <img src="<?= base_url('assets/img/logo.png') ?>" alt="MR n MR" class="logo-image">
    </div>
    <div class="az-signup-header">
      <h4>Create an Account to get started</h4>
      <form action="">
        <div class="form-group col-12 ">
          <label>Full Name</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Enter your full name"
            required>
        </div><!-- form-group -->
        <div class="d-flex gap-2">
          <div class="form-group col-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
          </div>

          <div class="form-group col-6">
            <label for="mobile">Contact Number</label>
            <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter your contact number"
              required>
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
          <input type="text" class="form-control" name="profession" id="profession" placeholder="Enter your profession"
            required>
          </div>

          <div class="form-group col-6">
          <label for="familybg">Family Background</label>
          <input type="text" class="form-control" name="familybg" id="familybg" placeholder="Enter your family background" required maxlength="25">
          </div>
        </div>


        <div class="d-flex gap-2">
          <div class="form-group password-wrapper col-6">
            <label>Password</label>
            <div class="password-container">
              <input type="password" id="password" name="password" class="form-control" placeholder="Create a password"
                required>
                <span class="toggle-password">
                  <i id="eyeIcon1" class="fas fa-eye"></i>
                </span>
              </div>
            </div><!-- form-group -->
            <div class="form-group mb-2 password-wrapper col-6">
              <label>Confirm Password</label>
              <div class="password-container">
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                placeholder="Confirm your password" required>
                <span class="toggle-password">
                  <i id="eyeIcon2" class="fas fa-eye"></i>
                </span>
              </div>
            </div><!-- form-group -->
          </div>
          <button type="button" class="btn btn-primary" id="registerbtn">Register</button>
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

<script>
  $(document).ready(function () {
    $("#registerbtn").click(function () {
      let username = $("#username").val().trim();
      let email = $("#email").val().trim();
      let mobile = $("#mobile").val().trim();
      let age = $("#age").val().trim();
      let city = $("#city").val().trim();
      let profession = $("#profession").val().trim();
      let familybg = $("#familybg").val().trim();
      let password = $("#password").val().trim();
      let confirmPassword = $("#confirmPassword").val().trim();
      let csrfTokenValue = $("#csrfpro").val();

      // Validation
      if (!username) {
        toastr.error("Please enter your full name!");
        return;
      }

      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!email) {
        toastr.error("Please enter your email!");
        return;
      }
      if (!emailPattern.test(email)) {
        toastr.error("Please enter a valid email address!");
        return;
      }

      const mobilePattern = /^[0-9]{10}$/;
      if (!mobile) {
        toastr.error("Please enter your contact number!");
        return;
      }
      if (!mobilePattern.test(mobile)) {
        toastr.error("Please enter a valid 10-digit contact number!");
        return;
      }

      if (!age || isNaN(age) || age < 1 || age > 120) {
        toastr.error("Please enter a valid age!");
        return;
      }

      if (!city) {
        toastr.error("Please enter your city!");
        return;
      }

      if (!profession) {
        toastr.error("Please enter your profession!");
        return;
      }

      if (!familybg) {
        toastr.error("Please enter your family background!");
        return;
      }

      if (!password) {
        toastr.error("Please create a password!");
        return;
      }
      if (password.length < 8) {
        toastr.error("Password must be at least 8 characters long!");
        return;
      }

      if (!confirmPassword) {
        toastr.error("Please confirm your password!");
        return;
      }
      if (password !== confirmPassword) {
        toastr.error("Passwords do not match!");
        return;
      }
      $("#registerbtn").text("Please wait...").attr("disabled", true);

      $.ajax({
        type: "POST",
        url: "<?= base_URL("registerpost") ?>",
        data: {
          username: username,
          email: email,
          mobile: mobile,
          age: age,
          city: city,
          profession: profession,
          familybg: familybg,
          password: password,
        },
        headers: {
          'X-CSRF-TOKEN': csrfTokenValue,
        },
      }).done(function (response) {
        if (response.status === 'success') {
          toastr.success(response.massage);
          $('#csrfpro').val(response.new_csrf_token);
          setTimeout(() => {
            location.href = "<?= base_url('login') ?>";
          }, 2000);
        } else if (response.status === 'error') {
          toastr.error(response.massage);
          $('#csrfpro').val(response.new_csrf_token);
          setTimeout(() => {
            $("#registerbtn").val("Register");
          }, 3000);
        }
      })
    })
  })
</script>