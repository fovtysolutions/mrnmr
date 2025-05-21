<div class="az-content-body az-content-body-dashboard-six">
    <div class="card-body-container">
        <!-- Tab Content -->
        <div class="card-title d-flex justify-content-between align-items-center">
            <h4>View Matched</h4>
        </div>
        <form id="<?= $formid ?>">
            <?php if ($editit) { ?>
                <input type="hidden" name="edit" value="<?= $editit ?>">
            <?php } ?>
            <div class="tab-pane fade active show">
                <div class="card-body">
                    <?php _ec( $this->include($contentfilename), false )?>
                    
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $this->section('script') ?>
    <?php echo view('common_script/formsubmit', ['formid' => $formid, 'submitbtn' => 'savebtn', 'formurl' => $formroute]); ?>
<?php echo $this->endSection() ?>