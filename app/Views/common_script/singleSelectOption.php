<?php 
    // Example mock data if not passed dynamically
    // $addDeleteEditData = [
    //     'mainArray' => json_encode(isset($array) ? json_decode($array) : []),
    //     'MainColumn' => 'ColumnName'
    // ];
    // echo view('common_script/singleSelectOption', $addDeleteEditData);
?>
<input type="hidden" name="<?=$MainColumn?>" id="<?=$MainColumn?>_Arr">
<div id="<?=$MainColumn?>_datajoin"></div>

<script>
    $(document).ready(function () {
        let mainArray = <?= $mainArray ?>;
        const parentElement = $('#<?=$MainColumn?>_datajoin');
        joinData(mainArray, parentElement);

        $('#<?=$MainColumn?>').on('change', function () {
            const item = $(this).val().trim(); 
            if (!mainArray.includes(item)) {
                mainArray.push(item);
                joinData(mainArray, parentElement);
            } else {
                toastr.error(`Duplicate value not added: ${item}`);
            }
        });

        $(document).on('click', '.deleteit', function() {
            const itemsid = $(this).data('delete-id');
            mainArray = mainArray.filter(data => data != itemsid);
            joinData(mainArray, parentElement);
        });
    
        function joinData(array, container) {
            if (array.length > 0) {
                const result = array.map((item, index) => {
                    return `
                        <button type="button" class="btn btn-primary position-relative mb-2">
                            ${item}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger deleteit" data-delete-id="${item}">
                                x
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    `;
                });
                container.html(result.join(''));
                $('#<?=$MainColumn?>_Arr').val(JSON.stringify(array));
            } else {
                container.html('');
                $('#<?=$MainColumn?>_Arr').val('[]');
            }
        }
    });
</script>
