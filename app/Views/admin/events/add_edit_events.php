<?= $this->extend("layouts/layout")?>
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
                    <input type="hidden" name="masterkey" value="<?=$masterkey?>">
                <?php 
                    $usedid = $masterkey;
                    $ids = ["event_id","event_date","event_name","participants","matches_percentage"];
                    $requireids = [];
                    $name = ["Event Id","Event Date","Event Name","Participants","Matches Percentage"];
                    $statecity = '';
                    $pagepath = 'admin/events/events_fields';
                ?>
                <?php echo view('hooks/module/tabcontent', [
                                                                'ids' => '', 
                                                                'classes' => 'show active',
                                                                'inputs'=> $pagepath, 
                                                                'statecity'=> $statecity,
                                                                'inputids'=>$ids,
                                                                'requireids'=>$requireids,
                                                                'th'=>$name,
                                                                'usedid'=>$usedid,
                                                                'changepage'=>'',
                                                                'formid'=>$formid,
                                                                'formroute'=>$formroute, 
                                                                'location'=>$successroute,
                                                                'jsonData'=>$detailsdata,
                                                                'laststep'=>'laststep',
                                                                'edititsingle' => $editit,
                                                                'increasing' => true,
                                                            ]); 
                ?>
                <?php //echo view('hooks/allmastersetup', ['selectid'=>'uom','optionroute'=>'getothermasters','selectName'=>'UOM','selectOption'=>'masters_name','masterkey'=>'UOM']); ?>
                </form>
            </div>
        </div>
<?= $this->endSection("content")?>