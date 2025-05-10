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
                    $ids = ["mrnmr_id","age_range","height_range","weight_range","state","city","food_pref","lifestyle","degree_of_openness","hobbies","religion","ideology","qualities","additional","negotiable_requirement","non_negotiable_requirements","partner_sexual_position","political_ideology","pet_friendly","want_to_have_children","want_to_get_married","have_children","previous_marriage","hiv_status",'state','city'];
                    $requireids = [];
                    $name = ["MrnMr ID","Age Range","Height Range","Weight Range","State","City","Food Pref","Lifestyle","Degree of Openness","Hobbies","Religion","Ideology","Qualities","Additional","Negotiable Requirement","Non Negotiable Requirements","Partner Sexual Position","Political Ideology","Pet Friendly","Want To Have Children","Want To Get Married","Have Children ?","Previous Marriage ?","HIV Status"];
                    $statecity = ['state','city'];
                    $pagepath = 'admin/mrperfect/mrperfect_fields';
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