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
                    <form id="inputform2">
                        <?php _ec( $this->include('Core\Member\Views\contentperfectpage'), false )?>
                    </form>
                    <div class="row mt-3">
                        <div class="form-buttons mt-3 ">
                            <a type="button" class="btn btn-primary" id="savebtn">
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
                $('#inputform2').submit();
            })
        })
    </script>
    <?php echo view('common_script/formsubmit', ['formid' => 'inputform1', 'submitbtn' => 'savebtn', 'formurl' => 'member/datasetup']); ?>
    <?php echo view('common_script/formsubmit', ['formid' => 'inputform2', 'submitbtn' => 'savebtn', 'formurl' => 'perfect/datasetup']); ?>
<?php echo $this->endSection() ?>