        <input type="hidden" name="<?=$imageids?>" id="<?=$imageids?>">
        <input type="hidden" id="csrfname<?=$imageids?>" value="<?php echo csrf_token(); ?>" >
        <input type="hidden" id="csrftoken<?=$imageids?>" value="<?php echo csrf_hash(); ?>" >
        <script>
            $(document).ready(function () {
                var csrfname<?=$imageids?> = $('#csrfname<?=$imageids?>').val();
                var csrftoken<?=$imageids?> = $('#csrftoken<?=$imageids?>').val();
                const getURL = '<?= base_url('fileorimageupload') ?>';
                $('#<?= $input ?>').change(function () {
                    const formData = new FormData();
                    formData.append('file', this.files[0]);
                    formData.append('filetype', '<?= $filetype ?>');
                    formData.append(csrfname<?=$imageids?>, csrftoken<?=$imageids?>);

                    $.ajax({
                        type: "POST",
                        url: getURL,
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': csrftoken<?=$imageids?>,
                        },
                        success: function (response) {
                            $('#csrftoken<?=$imageids?>').val(response.new_csrf_token);
                            if (response.status === 'success') {
                                $('#<?= $imageids ?>').val(response.filename);
                                toastr.success("File is uploaded");
                            } else {
                                console.error('Failed to upload image:', response.message);
                                toastr.error(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX error:', error);
                        },
                    });
                });
            });
        </script>
        