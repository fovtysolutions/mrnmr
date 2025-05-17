<?php // echo view('common_script/multifileuploader', ['previewid'=>'po_attachment','imageids'=>'po_attachment','input'=>'attechment','filetype'=>'image', 'filecount' => 15, 'selectedimage' => $imagedata]); ?>
<!-- <input type="hidden" name="<?=$imageids?>" id="<?=$imageids?>"> -->
<script>
    $(document).ready(function () {
        const getURL = '<?= base_url('multiuploader') ?>';
        const URL = '<?= base_url('') ?>';
        var imagearray = <?= isset($selectedimage) ? json_encode($selectedimage) : json_encode([]) ?>;
        var divids = "#<?=$previewid?>";
        joinfiles(imagearray, divids);
        $('#<?=$input?>').on('change', function () {
            let files = this.files;
            if (imagearray.length > 15) {
                toastr.error("You can upload a maximum of <?=$filecount?> files.");
                return;
            }
            if (files.length > <?=$filecount?>) {
                toastr.error("You can upload a maximum of <?=$filecount?> files.");
                return;
            }
            let formData = new FormData();
            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }
            formData.append('filetype', '<?=$filetype?>');
            $.ajax({
                url: getURL,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#<?=$imageids?>').val(JSON.stringify(response.file));
                    imagearray.push(...response.files);  // not nested
                    joinfiles(imagearray, divids);
                },
                error: function (xhr) {
                    toastr.error(xhr.responseText);
                }
            });
        });

        function joinfiles(arrayhere, divID) {
            if (arrayhere.length > 0) {
                $('#<?=$imageids?>').val(JSON.stringify(arrayhere));
                let result = arrayhere.map((details, index) => {
                    return `
                            <div class="image-preview-wrapper" data-id="${details.id}" >
                                <button type="button" class="remove-image-btn deleteimg" data-delimg-id="${details.id}" >×</button>
                                <img src="${URL}/${details.file}" alt="Preview">
                            </div>
                        `;
                });

                $(divID).html(result.join(''));
            } else {
                $(divID).html('<p>No image are selected!!</p>');
                $('#<?=$imageids?>').val('');
            }
        }
        $(document).on('click', '.deleteimg', function () {
            let ids = Number($(this).data('delimg-id'));
            let index = imagearray.filter(item => item.id === ids);
            if (index !== -1) {
                imagearray.splice(index, 1);
            } else {
                console.log('Image is not found!!');
            }
            joinfiles(imagearray, divids);
        });
    });
</script>
        