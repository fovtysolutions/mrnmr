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
                    $ids = ["mrnmr_id","registration_date","first_name","last_name","membership_status","personal_interview_date","days_to_reg_end","dob","age","height","weight","state","city","education","profession","annual_income","food_pref","smoker","drinker","hobbies","religion","political_ideology","family_info","describe_d","past_relationship","photo","email","phone","sexual_position","anal_sex_mandatory","out_to_parents","degree_of_openness","relationship_type","want_to_get_married","want_to_have_children","idea_of_romance","social_media_handles","pet_friendly","have_children","previous_marriage","hiv_status"];
                    $requireids = [];
                    $name = ["MrnMr ID","Date of registration","First Name","Last Name","Membership Status","Personal Interview Date","Days To Reg. End","DOB","Age","Height","Weight","State","City","Education","Profession","Annual Income (INR)","Food Pref","Smoker","Drinker","Hobbies","Religion","Political Ideology","Family Info.","Describe","Past Relationship","Photo","Email","Phone","My Sexual Position","Anal Sex Mandatory","Out To Parents","Degree of Openness","Type of Relationship","Want To Get Married","Want To Have Children","The Idea Of Romance","Social Media Handles","Pet Friendly","Have Children ?","Previous Marriage ?","HIV Status"];
                    $statecity = ['state','city'];
                    $pagepath = 'admin/member/member_fields';
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