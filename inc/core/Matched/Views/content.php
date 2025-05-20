<div class="az-content-body az-content-body-dashboard-six">
    <div class="card-body-container">
        <!-- Tab Content -->
        <div class="card-title d-flex justify-content-between align-items-center">
            <h4><?= $heading ?></h4>
        </div>
        <form id="<?= $formid ?>">
            <?php if ($editit) { ?>
                <input type="hidden" name="edit" value="<?= $editit ?>">
            <?php } ?>
            <div class="tab-pane fade active show">
                <div class="card-body">
                    <?php _ec( $this->include($contentfilename), false )?>
                    <div class="row mt-3">
                        <div class="form-buttons mt-3 ">
                            <!-- Save and Close Button -->
                            <button type="submit" class="btn btn-primary" id="savebtn">
                                <i class="fas fa-save me-2"></i> Save & Close
                            </button>
                            <!-- Cancel Button -->
                            <a class="btn btn-danger" id="cancel-btn" href="javascript:void(0)" onclick="history.back()" role="button">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $this->section('script') ?>
    <?php echo view('common_script/formsubmit', ['formid' => $formid, 'submitbtn' => 'savebtn', 'formurl' => $formroute]); ?>
<?php echo $this->endSection() ?>