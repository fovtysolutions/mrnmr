<?php // echo view('common_script/formsubmit', ['formid'=>'formid','submitbtn'=>'submitidbtn', 'formurl' => 'login']); ?>
<script>
    $(document).ready(function () {
        $("#<?=$formid?>").submit(function (e) {
            e.preventDefault();
            var csrfTokenValue = '<?php echo csrf_hash(); ?>';
            let formData = new FormData(this);
            formData.append('<?php echo csrf_token(); ?>','<?php echo csrf_hash(); ?>')
            // Validate Password
            $("#<?=$submitbtn?>").html("Please wait...");
            $.ajax({
                type: "POST",
                url: "<?= base_URL($formurl) ?>",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfTokenValue,
                },
            }).done(function (response) {
                if (response.status === 'success') {
                    $('#csrfpro').val(response.new_csrf_token);
                    toastr.success(response.message);
                    $("#<?=$submitbtn?>").html("Submit");
                    if (response.locationChange) {
                        setTimeout(() => {
                            location.href = response.locationChange;
                        }, 2000);
                    }
                } else if (response.status === 'error') {
                    $("#<?=$submitbtn?>").html("Submit");
                    $('#csrfpro').val(response.new_csrf_token);
                    toastr.error(response.message);
                }
            })
        })
    })
</script>