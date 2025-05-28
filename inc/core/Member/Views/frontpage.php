<?php echo $this->section('frontcss') ?>
<!--- make css here head setup -->
<?php echo $this->endSection() ?>
<div class="az-content-body az-content-body-dashboard-six">
    <!-- Upper Tabs -->
    <div class="card-body-container">
    <div class="card-title d-flex justify-content-between align-items-center">
            <h5><?=$heading?></h5>
            <div class="ml-auto d-flex">
                <?php if($print != '') { ?>
                    <button class="btn btn-secondary" id="print-quotation-statement">
                        <i class="fas fa-print me-2"></i> Print <?=$heading?> Statement
                    </button>
                <?php } ?>
                <?php if($addbtnroute != '') { ?>
                    <a href="<?= base_url($addbtnroute) ?>" class="me-2">
                        <button class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Add <?=$heading?>
                        </button>
                    </a>
                <?php } ?>
            </div>
        </div>

        <?php if($searching != '') { ?>
            <div class="search-container mb-3 p-1">
                <form action="#" class="form-inline w-100 d-flex">
                    <div class="form-group mb-2 me-2 flex-grow-1">
                        <input type="text" class="form-control w-100" placeholder="Search <?=$searchname?>" id="searches">
                    </div>
                    <div class="form-group mb-2">
                        <button type="button" class="btn btn-primary" id="searching">
                            <i class="fas fa-search me-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        <?php } ?>

        <?php if($filterinput != '') { ?>
            <div class="filter-container mb-3 p-1">
                <form action="#" class="form-inline filter-row">
                        <?php foreach ($filterinput as $key => $valueinputs) { 
                            echo filtersection($valueinputs['tag'],$valueinputs['label'],$valueinputs['value'],$valueinputs['id'],$valueinputs['type'],$valueinputs['condition1'],$valueinputs['condition2'],$valueinputs['array']);
                        } ?>
                    <!-- Submit Button -->
                    <div class="form-group mb-2 mr-2">
                        <button type="button" class="btn btn-secondary" id="filtering">
                            <i class="fa fa-filter mr-2"></i> Apply Filter
                        </button>
                    </div>
                    <!-- Reset Button -->
                    <div class="form-group mb-2">
                        <button type="button" class="btn btn-primary-orange" id="reseting">
                            <i class="fa fa-refresh mr-2"></i> Reset Filter
                        </button>
                    </div>
                </form>
            </div>
        <?php } ?>
        <?=showingtablenumberofrow()?>
        <div class="table-page-container table-page-responsive-lg p-0">
            <table class="table-page">
                <thead>
                    <tr>
                        <th class="w-5">Sr No</th>
                        <?php foreach ($th as $valueth) { ?>
                            <th><?=$valueth?></th>
                        <?php } ?>
                        <th class="w-10">Action</th>
                    </tr>
                </thead>
                <tbody id="<?=$mainid?>">
                    <tr>
                        <td colspan="<?=count($th) + 2?>" style="text-align: center;">
                            <?=tableloader()?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pt-3">
            <nav aria-label="..." id="pagimains"></nav>
        </div>
    </div>
</div>
<?php echo $this->section('script') ?>
    <?php _ec( $this->include('Core\Member\Views\frontjavascript'), false )?>
<?php echo $this->endSection() ?>