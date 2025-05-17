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
                    <div class="row">
                        <div class="col-md-4 col-xl-4">
                            <div class="form-group row align-items-center" id="div">
                                <label for="" class="col-sm-4 col-form-label">Role name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="rolename" name="rolename" placeholder="Enter Role name" value="<?= isset($detailsdata->rolename) ? $detailsdata->rolename : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-4">
                            <div class="form-group row align-items-center" id="div">
                                <label for="" class="col-sm-4 col-form-label">Role Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control form-control-sm" id="discription" name="discription" placeholder="Enter Role name" value=""><?= isset($detailsdata->discription) ? $detailsdata->discription : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
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