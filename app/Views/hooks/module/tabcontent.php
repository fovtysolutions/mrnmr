<div class="tab-pane fade <?= $classes ?>" id="<?= $ids ?>">
    <div class="card-body">
        <?php if(is_array($inputs)) { 
            foreach ($inputs as $key => $valueinputs) { 
            echo inputsection($valueinputs['tag'],$valueinputs['label'],$valueinputs['value'],$valueinputs['id'],$valueinputs['type'],$valueinputs['condition1'],$valueinputs['condition2'],$valueinputs['array']);
            } ?>
        <?php } else { ?>
            <div class="row">
                <?php echo view($inputs); ?>
            </div>
        <?php } ?>
        <?php if ($edititsingle == false) { ?>
            <div class="form-buttons mt-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" id="<?= $usedid ?>_add">
                    <i class="fas fa-plus me-2"></i> Add
                </button>
                <button type="button" class="btn btn-primary" id="<?= $usedid ?>_edit">
                    Edit
                </button>
            </div>
        <?php } else { ?>
            <div class="form-buttons mt-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" id="<?= $usedid ?>_add">
                    <i class="fas fa-plus me-2"></i> Add
                </button>
                <button type="button" class="btn btn-primary" id="<?= $usedid ?>_edit">
                    Edit
                </button>
            </div>
        <?php } ?>
        <div class="row mt-3">
            <div class="col-12 table-page-container">
                <table class="table-page-small">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Action</th>
                            <?php foreach ($th as $valueth) { ?>
                                <th><?= $valueth ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody id="<?= $usedid ?>joins">
                        <!-- Temporary Rows for Contact Details -->

                        <!-- More rows can be added here -->
                    </tbody>
                </table>
            </div>
            <!-- Form Buttons -->
            <div class="form-buttons mt-3 ">
                <!-- Save and Close Button -->
                <button type="button" class="btn btn-primary" id="<?= $usedid ?>savebtn">
                    <i class="fas fa-save me-2"></i> Save & Close
                </button>
                <!-- Cancel Button -->
                <a class="btn btn-danger" id="cancel-btn" href="#cancel" role="button">
                    <i class="fas fa-times me-2"></i> Cancel
                </a>
            </div>
        </div>
    </div>
    <input type="hidden" name="<?= $usedid ?>ids" id="<?= $usedid ?>ids">
    <input type="hidden" name="<?= $usedid ?>" id="<?= $usedid ?>ary" required>
    <input type="hidden" name="laststep" id="nextlaststep<?= $usedid ?>">
</div>

<script>
    "use strict"
    $('#<?= $usedid ?>_edit').hide();

    var jsondatas = <?= $jsonData ?>;
    const parentElement<?= $usedid ?> = $('#<?= $usedid ?>joins');
    let arrayDetails<?= $usedid ?> = jsondatas;
    const fields<?= $usedid ?> = <?= json_encode($inputids) ?>;
    const requirFields<?= $usedid ?> = <?= json_encode($requireids) ?>;
    const tds<?= $usedid ?> = <?= json_encode(value: $inputids) ?>;
    var csrfTokenName<?= $usedid ?> = '<?php echo csrf_token(); ?>';
    var csrfTokenValue<?= $usedid ?> = '<?php echo csrf_hash(); ?>';

    if (parentElement<?= $usedid ?>.length > 0) {
        $('#<?= $usedid ?>_add').show();
    }
    // function
    joinData<?= $usedid ?>(arrayDetails<?= $usedid ?>, parentElement<?= $usedid ?>);
    jointimelineData<?= $usedid ?>(arrayDetails<?= $usedid ?>);
    let increasing<?= $usedid ?> = "<?= $increasing ?>";

    $(document).ready(function () {
        $("#<?= $usedid ?>_add").click(function () {
            let nextKey = arrayDetails<?= $usedid ?>.length;
            const isValid = requirFields<?= $usedid ?>.every(id => $(`#${id}`).val());

            if (!isValid) {
                toastr.error("All field are requiered!!");
                return;
            }

            const arrayData = {
                id: Math.floor(1000 + Math.random() * 9000),
                ...Object.fromEntries(fields<?= $usedid ?>.map(id => {
                    const value = $(`#${id}`).val();
                    return [id, value !== undefined ? value : null];
                })),
            };
            if (!increasing<?= $usedid ?>) {
                if (nextKey == 0) {
                    arrayDetails<?= $usedid ?>.push(arrayData);
                } else {
                    toastr.error("In this criteria only one set is allowed!!");
                }
            } else {
                arrayDetails<?= $usedid ?>.push(arrayData);
            }
            jointimelineData<?= $usedid ?>(arrayDetails<?= $usedid ?>);
            joinData<?= $usedid ?>(arrayDetails<?= $usedid ?>, parentElement<?= $usedid ?>);
            if (increasing<?= $usedid ?>) {
                Object.entries(fields<?= $usedid ?>).forEach(([key, value]) => {
                    $(`#${value}`).val('');
                });
            }
        })

        $(document).on('click', '.deleteit', function () {
            const dataID = $(this).data('qoutation-id');
            arrayDetails<?= $usedid ?> = arrayDetails<?= $usedid ?>.filter((data, index) => data.id != dataID);
            joinData<?= $usedid ?>(arrayDetails<?= $usedid ?>, parentElement<?= $usedid ?>);
            jointimelineData<?= $usedid ?>(arrayDetails<?= $usedid ?>);
        });

        $(document).on('click', '.editit', function () {

            const editID = $(this).data('editq-id');
            const selectedData = arrayDetails<?= $usedid ?>.find(item => item.id == editID);

            if (selectedData) {
                Object.entries(selectedData).forEach(([key, value]) => {
                    $(`#${key}`).val(value);
                });
                $('#<?= $usedid ?>ids').val(editID);
                $('#<?= $usedid ?>_add').hide();
                $('#<?= $usedid ?>_edit').show();
            }
        });

        $(document).on('click', '#<?= $usedid ?>_edit', function () {
            const isValid = requirFields<?= $usedid ?>.every(id => $(`#${id}`).val());

            if (!isValid) {
                toastr.error("All field are requiered!!");
                return;
            }

            let ids = $('#<?= $usedid ?>ids').val();
            arrayDetails<?= $usedid ?> = arrayDetails<?= $usedid ?>.map(item =>
                item.id == ids
                    ? { ...item, ...Object.fromEntries(fields<?= $usedid ?>.map(id => [id, $(`#${id}`).val()])) }
                    : item
            );

            joinData<?= $usedid ?>(arrayDetails<?= $usedid ?>, parentElement<?= $usedid ?>);
            jointimelineData<?= $usedid ?>(arrayDetails<?= $usedid ?>);
            $('#<?= $usedid ?>ids').val('');
            $('#<?= $usedid ?>_add').show();
            $('#<?= $usedid ?>_edit').hide();
            if (increasing<?= $usedid ?>) {
                Object.entries(fields<?= $usedid ?>).forEach(([key, value]) => {
                    $(`#${value}`).val('');
                });
            }
        });
    })

    $("#<?= $usedid ?>savebtn").click(function (e) {
        e.preventDefault();
        if (!arrayDetails<?= $usedid ?>.length > 0) {
            toastr.error("Add atleast one field for submit!");
            return;
        }
        $("#next<?= $laststep ?><?= $usedid ?>").val('laststep');
        const form = document.getElementById("<?= $formid ?>");
        $.ajax({
            type: "POST",
            url: "<?= base_URL($formroute) ?>",
            data: new FormData(form),
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfTokenValue<?= $usedid ?>,
            },
            beforeSend: function () {
                $("#<?= $usedid ?>savebtn").val("Please Wait...");
            },
            success: function (response) {
                csrfTokenValue<?= $usedid ?> = response.new_csrf_token || csrfTokenValue<?= $usedid ?>;
                if (response.status === 'success') {
                    toastr.success(response.message || "next step!");
                    if (response.locationChange) {
                        setTimeout(() => {
                            location.href = '<?= base_url($location) ?>';
                        }, 2000);
                    } else {
                        <?php if ($ids != '' && $changepage != '') { ?>
                            $("#<?= $ids ?>").hide().removeClass('show').removeClass('active');
                            const button = document.getElementById('<?= $changepage ?>-tab');
                            if (button) button.click();
                        <?php } ?>
                    }
                } else if (response.status === 'error') {
                    toastr.error(response.message || "An error occurred!");
                }
            },
            error: function () {
                toastr.error("An unexpected error occurred!");
                $("#<?= $usedid ?>savebtn").val("Save & Close");
            }
        });
    })

    <?php if ($edititsingle == true) { ?>
        setTimeout(() => {
            $('.editit').click();
        }, 1000);
        $('#<?= $usedid ?>_edit').show();
    <?php } ?>
    function joinData<?= $usedid ?>(arrayhere, divID) {
        if (arrayhere.length > 0) {
            let result = arrayhere.map((details, index) => {
                let tdData = tds<?= $usedid ?>.map(id => `<td>${details[id] || ''}</td>`).join('');

                return `
                                                <tr>
                                                    <td>${index + 1}</td>
                                                    <td>
                                                        <button type="button" class="btn-table btn-table-warning editit" data-editq-id="${details.id}" ><i class="fas fa-edit"></i></button>
                                                        <button type="button" data-qoutation-id="${details.id}" class="btn-table btn-table-danger deleteit"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                    ${tdData}
                                                </tr>
                                            `;
            });

            $(divID).html(result.join(''));
            $('#<?= $usedid ?>ary').val(JSON.stringify(arrayhere));
        } else {
            $(divID).html('<tr><td colspan="13">No Items added</td></tr>');
        }
    }

    function jointimelineData<?= $usedid ?>(arrayhere) {
        if (arrayhere.length > 0) {
            let result = arrayhere
                .filter(details => details?.followed_date_time && details?.details_remarks) // Exclude entries missing required fields
                .map((details, index) => `
                                                <div class="timeline-entry timeline-entry-1">
                                                    <div class="timeline-icon">
                                                        <i class="fa fa-check-circle"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h6>Timeline Entry ${index + 1}</h6>
                                                        <p>${details.followed_date_time}.</p>
                                                        <small>${details.details_remarks}</small>
                                                    </div>
                                                </div>
                                            `);

            if (result.length > 0) {
                $('#timelines').html(result.join(''));
            } else {
                $('#timelines').html('Nothing added in timeline....');
            }
        } else {
            $('#timelines').html('Nothing added in timeline....');
        }
    }
</script>

<?php if (is_array($statecity)) { ?>
    <script>
        $(document).ready(function () {
            $.getJSON('<?= base_url('country_state_citys.json') ?>', function (data) {
                const states<?= $usedid ?> = data[0].states;
                states<?= $usedid ?>.forEach(state => {
                    $('#<?= $statecity[0] ?>').append(
                        `<option value="${state.name}">${state.name}</option>`
                    );
                });
                $('#<?= $statecity[0] ?>').on('change', function () {
                    const selectedState<?= $usedid ?> = $(this).val();
                    const stateData<?= $usedid ?> = states<?= $usedid ?>.find(state => state.name === selectedState<?= $usedid ?>);

                    if (stateData<?= $usedid ?> && stateData<?= $usedid ?>.cities.length > 0) {
                        stateData<?= $usedid ?>.cities.forEach(city => {
                            $('#<?= $statecity[1] ?>').append(
                                `<option value="${city.name}">${city.name}</option>`
                            );
                        });
                        $('#<?= $statecity[1] ?>').prop('disabled', false);
                    } else {
                        $('#<?= $statecity[1] ?>').empty().append('<option value="">Select City</option>').prop('disabled', true);
                    }
                });
            });
        });
    </script>
<?php } ?>