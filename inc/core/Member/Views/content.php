<div class="az-content-body az-content-body-dashboard-six">
    <div class="card-body-container">
        <!-- Tab Content -->
        <div class="card-title d-flex justify-content-between align-items-center">
            <h4><?= $heading ?></h4>
        </div>
        <div class="tab-pane fade active show">
            <div class="card-body">
                <form id="inputform1">
                    <?php if ($editit) { ?>
                        <input type="hidden" name="edit" value="<?= $editit ?>">
                    <?php } ?>
                    <?php _ec( $this->include($contentfilename), false )?>
                </form>
                <hr class="hr-m">
                <form id="inputform2">
                    <?php _ec( $this->include('Core\Member\Views\contentperfectpage'), false )?>
                </form>
                <div class="row mt-3">
                    <div class="form-buttons mt-3 ">
                        <a type="submit" class="btn btn-primary" id="savebtn">
                            <i class="fas fa-save me-2"></i> Save & Close
                        </a>
                        <a class="btn btn-danger" id="cancel-btn" href="javascript:void(0)" onclick="history.back()" role="button">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->section('script') ?>
    <script>
        $(document).ready(function(){
            $('#savebtn').click(function(){
                $('#inputform1').submit();
            })
        })
    </script>
    <?php //echo view('common_script/formsubmit', ['formid' => 'inputform1', 'submitbtn' => 'savebtn', 'formurl' => 'member/datasetup']); ?>
    <?php // echo view('common_script/formsubmit', ['formid' => 'inputform2', 'submitbtn' => 'savebtn', 'formurl' => 'perfect/datasetup']); ?>
    <?php echo view('common_script/imageorfileupload', ['imageids'=>'photovalue','input'=>'photo','filetype'=>'image']); ?>
    <?php echo view('common_script/allCountryStateCity', ['countryid'=>'membercountry', 'stateid'=>'memberstate', 'cityid'=>'membercity', 'selectedcountry'=>$detailsdata->country ?? '', 'selectedstate'=>$detailsdata->state ?? '', 'selectedcity' =>$detailsdata->city ?? '']); ?>
    <?php echo view('common_script/allCountryStateCity', ['countryid'=>'perfectcountry', 'stateid'=>'perfectstate', 'cityid'=>'perfectcity', 'selectedcountry'=>$perfectdatas->country ?? '', 'selectedstate'=>$perfectdatas->state ?? '', 'selectedcity' =>$perfectdatas->city ?? '']); ?>

    <script>
        $(document).ready(function () {
            $("#inputform1, #inputform2").submit(function (e) {
                e.preventDefault();

                const csrfTokenName = '<?= csrf_token(); ?>';
                const csrfTokenValue = '<?= csrf_hash(); ?>';

                const form1 = new FormData($('#inputform1')[0]);
                const form2 = new FormData($('#inputform2')[0]);

                const combinedData = new FormData();

                for (let [key, value] of form1.entries()) {
                    combinedData.append(`dataone[${key}]`, value);
                }

                for (let [key, value] of form2.entries()) {
                    combinedData.append(`datatwo[${key}]`, value);
                }

                combinedData.append(csrfTokenName, csrfTokenValue);

                $("#savebtn").html("Please wait...");

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('member/datasetup') ?>",
                    data: combinedData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfTokenValue,
                    },
                }).done(function (response) {
                    $("#savebtn").html("Submit");
                    $('#csrfpro').val(response.new_csrf_token);

                    if (response.status === 'success') {
                        toastr.success(response.message);
                        if (response.locationChange) {
                            setTimeout(() => {
                                window.location.href = response.locationChange;
                            }, 2000);
                        }
                    } else {
                        toastr.error(response.message);
                    }
                });
            });
        });
    </script>
<?php echo $this->endSection() ?>