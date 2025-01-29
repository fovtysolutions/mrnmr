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
       <!-- <script>
       $(document).ready(function () {
  $('.az-iconbar .nav-link').on('click', function (e) {
    e.preventDefault();
    var target = $(this).attr('href');
    $('.az-iconbar .nav-link').removeClass('active');
    $(this).addClass('active');
    $('.az-iconbar-aside .az-iconbar-pane').removeClass('show');
    $(target).addClass('show');
    $('.az-iconbar-aside').addClass('show');
  });
  $('.az-iconbar-toggle-menu').on('click', function () {
    $('.az-iconbar-aside').toggleClass('show');
  });
});

       </script> -->
       <script>
        $(function() {
            'use strict';
            var activeLink = localStorage.getItem('activeNavLink');

            // Set initial active link
            if (activeLink) {
                $('.az-iconbar .nav-link').removeClass('active');
                $('.az-iconbar .nav-link[href="' + activeLink + '"]').addClass('active');
                $(activeLink).addClass('show');
            } else {
                $('.az-iconbar .nav-link').first().addClass('active');
                var firstLinkHref = $('.az-iconbar .nav-link').first().attr('href');
                $(firstLinkHref).addClass('show');
            }

            $('.az-iconbar-aside').addClass('show');
            $('body').addClass('az-iconbar-show');

            // Click event for nav links
            $('.az-iconbar .nav-link').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr('href');

                // Check if sidebar is hidden and show it
                if (!$('body').hasClass('az-iconbar-show')) {
                    $('body').addClass('az-iconbar-show');
                    $('.az-iconbar-aside').addClass('show');
                }

                // Set active state
                $('.az-iconbar .nav-link').removeClass('active'); // Remove active class from all
                $(this).addClass('active'); // Add active class to the clicked link
                $(href).addClass('show');
                $(href).siblings().removeClass('show');
                
                localStorage.setItem('activeNavLink', href);
            });

            $('.az-iconbar-body .with-sub').on('click', function(e) {
                e.preventDefault();
                $(this).parent().addClass('show');
                $(this).parent().siblings().removeClass('show');
            });

            $('.az-iconbar-toggle-menu').on('click', function(e) {
                e.preventDefault();
                if (window.matchMedia('(min-width: 992px)').matches) {
                    $('.az-iconbar .nav-link.active').removeClass('active');
                    $('.az-iconbar-aside').removeClass('show');
                    $('body').removeClass('az-iconbar-show');
                } else {
                    $('body').removeClass('az-iconbar-show');
                }
            });

            $('#azIconbarShow').on('click', function(e) {
                e.preventDefault();
                $('body').toggleClass('az-iconbar-show');
            });

            $.plot('#flotChart2', [{
                data: flotSampleData1,
                color: '#969dab'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0
                            }, {
                                opacity: 0.2
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false
                },
                xaxis: {
                    show: false
                }
            });

            $('.peity-bar').peity('bar');
        });
       </script>
