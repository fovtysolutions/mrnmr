<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://kit.fontawesome.com/f1f3b6a832.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/lib/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/ionicons/ionicons.js') ?>"></script>
<script src="<?= base_url('assets/lib/jquery.flot/jquery.flot.js') ?>"></script>
<script src="<?= base_url('assets/lib/jquery.flot/jquery.flot.resize.js') ?>"></script>
<script src="<?= base_url('assets/lib/peity/jquery.peity.min.js') ?>"></script>
<script src="<?= base_url('assets/js/azia.js') ?>"></script>

<!-- JavaScript Files -->
<script src="<?= base_url('assets/js/sidebar.js') ?>"></script>

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
    $(document).ready(function () {
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
    'use strict';

    var activeLink = localStorage.getItem('activeNavLink');
    if (activeLink) {
        $('.az-iconbar .nav-link').removeClass('active');
        $('.az-iconbar .nav-link[href="' + activeLink + '"]').addClass('active');
        $(activeLink).addClass('show');
    } else {
        $('.az-iconbar .nav-link').first().addClass('active');
        var firstLinkHref = $('.az-iconbar .nav-link').first().attr('href');
        $(firstLinkHref).addClass('show');
    }

    if (window.matchMedia('(max-width: 991px)').matches) {
        $('.az-iconbar-aside').removeClass('show');
        $('body').removeClass('az-iconbar-show');
    } else {
        $('.az-iconbar-aside').removeClass('show'); // Sidebar closed by default on desktop
        $('body').addClass('az-iconbar-show');
    }

    $('.az-iconbar .nav-link').on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');

        if (window.matchMedia('(min-width: 992px)').matches) {
            $('.az-iconbar-aside').addClass('show');
        }

        $('.az-iconbar .nav-link').removeClass('active');
        $(this).addClass('active');
        $(href).addClass('show').siblings().removeClass('show');

        localStorage.setItem('activeNavLink', href);
    });

    $('.az-iconbar-body .with-sub').on('click', function (e) {
        e.preventDefault();
        $(this).parent().addClass('show').siblings().removeClass('show');
    });

    $('.az-iconbar-toggle-menu').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('az-iconbar-show');
        $('.az-iconbar-aside').toggleClass('show');
    });

    $('#azIconbarShow').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('az-iconbar-show');
        $('.az-iconbar-aside').toggleClass('show');
    });

    $('.az-iconbar-aside .nav-link').on('click', function () {
        $('.az-iconbar-aside').removeClass('show');
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
                    colors: [{ opacity: 0 }, { opacity: 0.2 }]
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