<?php // echo view('common_script/imageorfileupload', ['imageids'=>'po_attachment','input'=>'attechment','filetype'=>'image']); ?>
<!-- <input type="hidden" name="<?=$imageids?>" id="<?=$imageids?>"> -->
<script>
    $(document).ready(function () {        
        const getURL = '<?= base_url('singleuploader') ?>';
        $('#<?= $input ?>').change(function () {
            const formData = new FormData();
            formData.append('file', this.files[0]);
            formData.append('filetype', '<?= $filetype ?>');

            $.ajax({
                type: "POST",
                url: getURL,
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
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
        