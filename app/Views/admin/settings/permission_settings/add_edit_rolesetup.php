<?= $this->extend("layouts/backend_layout")?>
<?= $this->section("content")?>    
        <div class="az-content-body az-content-body-dashboard-six">
            <div class="card-body-container">
                <!-- Tab Content -->
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h4><?=$heading?></h4>
                </div>
                <form id="<?=$formid?>">
                    <?php if($editit){ ?>
                        <input type="hidden" name="edit" value="<?=$editit?>">
                    <?php } ?>
                <?php 
                    $ids = ["discription"];
                    $requireids = ["discription"];
                    $name = ["Roll Name"];
                    $usedid = 'addrolesid';
                    $inputengine = [
                        ["tag"=>"input","label"=> $name[0],"id"=> $ids[0],"value"=> "","type"=>"text","condition1"=>"","condition2"=>"","array"=>''],
                    ];
                ?>
                <?php echo view('hooks/module/fronttabcontent', [
                                                                'ids' => '', 
                                                                'classes' => 'show active', 
                                                                'inputs'=> $inputengine, 
                                                                'statecity'=> '', 
                                                                'inputids'=>$ids, 
                                                                'requireids'=>$requireids, 
                                                                'th'=>$name,
                                                                'usedid'=>$usedid,
                                                                'changepage'=>'',
                                                                'formid'=>$formid,
                                                                'formroute'=>$formroute,
                                                                'location'=>$successroute,
                                                                'jsonData'=>$detailsdata,
                                                                'laststep'=>'',
                                                                'edititsingle' => $editit,
                                                            ]); 
                ?>
                </form>
            </div>
        </div>
<?= $this->endSection("content")?>