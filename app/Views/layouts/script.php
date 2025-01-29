        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://kit.fontawesome.com/f1f3b6a832.js" crossorigin="anonymous"></script>
        <script src="<?=base_url('lib/jquery/jquery.min.js')?>"></script>
        <script src="<?=base_url('lib/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?=base_url('lib/ionicons/ionicons.js')?>"></script>
        <script src="<?=base_url('lib/jquery.flot/jquery.flot.js')?>"></script>
        <script src="<?=base_url('lib/jquery.flot/jquery.flot.resize.js')?>"></script>
        <script src="<?=base_url('lib/peity/jquery.peity.min.js')?>"></script>

        <!-- JavaScript Files -->
        <script src="<?=base_url('assets/js/sidebar.js')?>"></script>

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        </script>
        <script>
            $(document).ready(function(){
                <?php if (session()->getFlashdata('error')): ?>
                    toastr.error("<?= session()->getFlashdata('error'); ?>");
                <?php endif; ?>
            })
        </script>
        <script>
            $(document).on("keydown", "form", function (e) {
                if (e.key === "Enter") {
                    e.preventDefault(); 
                    const submitButton = $(this).find("button[type='button'], input[type='submit']");
                    if (submitButton.length) {
                        submitButton.click();
                    }
                }
            });
        </script>
       <script>
       $(document).ready(function () {
  // Handle nav-link click event
  $('.az-iconbar .nav-link').on('click', function (e) {
    e.preventDefault();
    var target = $(this).attr('href');

    // Remove active state from all nav-links
    $('.az-iconbar .nav-link').removeClass('active');
    $(this).addClass('active');

    // Hide all aside panes and show the target pane
    $('.az-iconbar-aside .az-iconbar-pane').removeClass('show');
    $(target).addClass('show');

    // Ensure the sidebar is visible
    $('.az-iconbar-aside').addClass('show');
  });

  // Handle toggle functionality
  $('.az-iconbar-toggle-menu').on('click', function () {
    $('.az-iconbar-aside').toggleClass('show');
  });
});

       </script>