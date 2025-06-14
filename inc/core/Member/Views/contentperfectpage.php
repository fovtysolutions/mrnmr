<div class="col-12">
    <h4 class="mb-4">Mr Perfect Detail</h4>
</div>
<div class="row">
    <!-- ID -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_idperfect" class="col-sm-4 col-form-label">ID</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control form-control-sm" id="mrnmr_idperfect" name="mrnmr_id"
                    placeholder="Enter MRnMR ID" value="<?= $perfectdatas->mrnmr_id ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Age Range -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="age_range" class="col-sm-4 col-form-label">Age Range</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="ageRangeMin" name="ageRangeMin"
                            min="18" max="99" placeholder="Min Age" value="<?= $perfectdatas->ageRangeMin ?? '' ?>">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="ageRangeMax" name="ageRangeMax"
                            min="18" max="99" placeholder="Max Age" value="<?= $perfectdatas->ageRangeMax ?? '' ?>">
                    </div>
                </div>
                <input type="hidden" name="age_range" id="age_range">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#ageRangeMin, #ageRangeMax').on('input', function () {
                var ageminrange = $('#ageRangeMin').val();
                var agemaxrange = $('#ageRangeMax').val();
                $('#age_range').val(ageminrange + ' - ' + agemaxrange);
            });
        });
    </script>

    <!-- Height Range -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="height_range" class="col-sm-4 col-form-label">Height Range</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="heightRangeMin"
                            name="heightRangeMin" min="100" max="250" placeholder="Min Height (cm)"
                            value="<?= $perfectdatas->heightRangeMin ?? '' ?>">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="heightRangeMax"
                            name="heightRangeMax" min="100" max="250" placeholder="Max Height (cm)"
                            value="<?= $perfectdatas->heightRangeMax ?? '' ?>">
                    </div>
                </div>
                <input type="hidden" name="height_range" id="height_range">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#heightRangeMin, #heightRangeMax').on('input', function () {
                var heightminrange = $('#heightRangeMin').val();
                var heightmaxrange = $('#heightRangeMax').val();
                $('#height_range').val(heightminrange + ' - ' + heightmaxrange);
            });
        });
    </script>

    <!-- Weight Range -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight_range" class="col-sm-4 col-form-label">Weight Range</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="weightRangeMin"
                            name="weightRangeMin" min="30" max="200" placeholder="Min Weight (kg)"
                            value="<?= $perfectdatas->weightRangeMin ?? '' ?>">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="weightRangeMax"
                            name="weightRangeMax" min="30" max="200" placeholder="Max Weight (kg)"
                            value="<?= $perfectdatas->weightRangeMax ?? '' ?>">
                    </div>
                </div>
                <input type="hidden" name="weight_range" id="weight_range">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#weightRangeMin, #weightRangeMax').on('input', function () {
                var weightminrange = $('#weightRangeMin').val();
                var weightmaxrange = $('#weightRangeMax').val();
                $('#weight_range').val(weightminrange + ' - ' + weightmaxrange);
            });
        });
    </script>

    <!-- Traditionally Masculine/Feminine Scale -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="masculine_feminine" class="col-sm-4 col-form-label">My preferred partner should be</label>
            <div class="col-sm-8">
                <input type="range" class="form-control-range form-range" id="masculine_feminine"
                    name="masculine_feminine" min="0" max="10" value="<?= $perfectdatas->masculine_feminine ?? 5 ?>">
                <div class="d-flex justify-content-between">
                    <span>Traditionally Masculine (0)</span>
                    <span>Traditionally Feminine (10)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="location_R" class="col-sm-4 col-form-label">Location Preference</label>
            <div class="col-sm-8">
                <select class="form-control form-select form-control-sm mb-2" id="location_R">
                    <option>Select</option>
                    <option>Anywhere in World</option>
                    <option>Only Outside India</option>
                    <option>Only in My Home Country</option>
                    <option>Anywhere in India</option>
                    <option>Same State as Me within India</option>
                    <option>Same City as Me within India</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->location_R) ? json_decode($perfectdatas->location_R) : []),
                    'MainColumn' => 'location_R'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Education -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="education_R" class="col-sm-4 col-form-label">Education</label>
            <div class="col-sm-8">
                <select class="form-control form-select form-control-sm mb-2" id="education_R">
                    <option>Select</option>
                    <option>Min High School</option>
                    <option>Min Graduate</option>
                    <option>Min Master's</option>
                    <option>Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->education_R) ? json_decode($perfectdatas->education_R) : []),
                    'MainColumn' => 'education_R'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Financial Stability -->

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="financial_stability" class="col-sm-4 col-form-label">Financial Stability (INR)</label>
            <div class="col-sm-8">
                <input class="form-control form-control-sm mb-2" type="number" id="financial_stability"
                    name="financial_stability" min="0" placeholder="Annual Net Income"
                    value="<?= $perfectdatas->financial_stability ?? '' ?>">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="financial_stability"
                        id="financial_doesnt_matter" value="Dos'nt Matter" <?= isset($perfectdatas->financial_stability) && $perfectdatas->financial_stability == 'doesnt_matter' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="financial_doesnt_matter">Doesn't Matter</label>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            if ($('#financial_doesnt_matter').is(':checked')) {
                $('#financial_stability').attr('disabled', true);
                $('#financial_stability').val('');
            } else {
                $('#financial_stability').attr('disabled', false);
            }
            $('#financial_doesnt_matter').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#financial_stability').attr('disabled', true);
                    $('#financial_stability').val('');
                } else {
                    $('#financial_stability').attr('disabled', false);
                }
            });
            $('#financial_stability').on('input', function () {
                if ($('#financial_doesnt_matter').is(':checked')) {
                    $('#financial_stability').val('');
                }
            });
        })
    </script>

    <!-- Food Preferences -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="food_prefR" class="col-sm-4 col-form-label">Food Preference</label>
            <div class="col-sm-8">
                <select class="form-control form-select form-control-sm mb-2" id="food_prefR">
                    <option>Select Food Preference</option>
                    <option>Veg</option>
                    <option>Non-Veg</option>
                    <option>Vegan</option>
                    <option>Pescatarian</option>
                    <option>Jain</option>
                    <option>Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->food_prefR) ? json_decode($perfectdatas->food_prefR) : []),
                    'MainColumn' => 'food_prefR'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Drinking -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="drinking" class="col-sm-4 col-form-label">Drinking</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="drinking" name="drinking">
                    <option>Select</option>
                    <option value="Regular">Regular</option>
                    <option value="Social">Social</option>
                    <option value="Not at All">Not at All</option>
                    <option value="Doesnt Matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->drinking) ? json_decode($perfectdatas->drinking) : []),
                    'MainColumn' => 'drinking'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Smoking -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="smoking" class="col-sm-4 col-form-label">Smoking</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="smoking" name="smoking">
                    <option value="regular">Regular</option>
                    <option value="social">Social</option>
                    <option value="not_at_all">Not at All</option>
                    <option value="doesnt_matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->smoking) ? json_decode($perfectdatas->smoking) : []),
                    'MainColumn' => 'smoking'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>


    <!-- Out to Parents -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="out_to_parents" class="col-sm-4 col-form-label">Out to Parents</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="out_to_parents" name="out_to_parents">
                <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->out_to_parents) && $perfectdatas->out_to_parents == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->out_to_parents) && $perfectdatas->out_to_parents == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->out_to_parents) && $perfectdatas->out_to_parents == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
                    </option>
                </select>
               
            </div>
        </div>
    </div>

    <!-- Degree of Openness -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="degree_of_opennessR" class="col-sm-4 col-form-label">Degree of Openness</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="degree_of_opennessR"
                    name="degree_of_opennessR">
                    <option value="closeted">Closeted</option>
                    <option value="selectively_out">Selectively Out</option>
                    <option value="out_to_whole_world">Out to Whole World</option>
                    <option value="doesnt_matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->degree_of_opennessR) ? json_decode($perfectdatas->degree_of_opennessR) : []),
                    'MainColumn' => 'degree_of_opennessR'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Religion -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="religionR" class="col-sm-4 col-form-label">Religion</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="religionR" name="religionR">
                    <option value="Agnostic">Agnostic</option>
                    <option value="Atheist">Atheist</option>
                    <option value="Buddhist">Buddhist</option>
                    <option value="Christian">Christian</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Jain">Jain</option>
                    <option value="Judaism">Judaism</option>
                    <option value="Muslim">Muslim</option>
                    <option value="Sikh">Sikh</option>
                    <option value="Doesnt_matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->religionR) ? json_decode($perfectdatas->religionR) : []),
                    'MainColumn' => 'religionR'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Ideology -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ideologyR" class="col-sm-4 col-form-label">Ideology</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="ideologyR" name="ideologyR">
                    <option value="Right-wing">Right-wing</option>
                    <option value="Left-wing">Left-wing</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Apolitical">Apolitical</option>
                    <option value="Liberal">Liberal</option>
                    <option value="Doesnt_matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->ideologyR) ? json_decode($perfectdatas->ideologyR) : []),
                    'MainColumn' => 'ideologyR'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>

    <!-- Partner Sexual Position -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_sexual_positionR" class="col-sm-4 col-form-label">Partner Sexual Position</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="partner_sexual_positionR"
                    name="partner_sexual_positionR">
                    <option value="Top">Top</option>
                    <option value="Vers_Top">Vers Top</option>
                    <option value="Versatile">Versatile</option>
                    <option value="Vers_Bottom">Vers Bottom</option>
                    <option value="Bottom">Bottom</option>
                    <option value="Side">Side</option>
                    <option value="Asexual">Asexual</option>
                    <option value="Doesnt_matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->partner_sexual_positionR) ? json_decode($perfectdatas->partner_sexual_positionR) : []),
                    'MainColumn' => 'partner_sexual_positionR'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>
    <!-- HIV Status -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hiv_status" class="col-sm-4 col-form-label">HIV Status</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="hiv_status" name="hiv_status">
                    <option value="Acute_very_recent_infection">Acute/Very Recent Infection</option>
                    <option value="Chronic_HIV">Chronic HIV</option>
                    <option value="AIDS">AIDS</option>
                    <option value="Undetectable">Undetectable</option>
                    <option value="Doesnt_matter">Doesn't Matter</option>
                </select>
                <?php
                $addDeleteEditData = [
                    'mainArray' => json_encode(isset($perfectdatas->hiv_status) ? json_decode($perfectdatas->hiv_status) : []),
                    'MainColumn' => 'hiv_status'
                ];
                echo view('common_script/singleSelectOption', $addDeleteEditData);
                ?>
            </div>
        </div>
    </div>
    <!-- Pet Friendly -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="pet_friendly" class="col-sm-4 col-form-label">Pet Friendly</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="pet_friendly" name="pet_friendly">
                    <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->pet_friendly) && $perfectdatas->pet_friendly == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->pet_friendly) && $perfectdatas->pet_friendly == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->pet_friendly) && $perfectdatas->pet_friendly == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
                    </option>
                </select>
            </div>
        </div>
    </div>
    <!-- Want to have Children -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="want_to_have_children" class="col-sm-4 col-form-label">Want to have Children</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="want_to_have_children" name="want_to_have_children">
                    <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->want_to_have_children) && $perfectdatas->want_to_have_children == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->want_to_have_children) && $perfectdatas->want_to_have_children == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->want_to_have_children) && $perfectdatas->want_to_have_children == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't
                        matter</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Want to get Marriage -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="want_to_get_married" class="col-sm-4 col-form-label">Want to get Marriage</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="want_to_get_married" name="want_to_get_married">
                    <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->want_to_get_married) && $perfectdatas->want_to_get_married == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->want_to_get_married) && $perfectdatas->want_to_get_married == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->want_to_get_married) && $perfectdatas->want_to_get_married == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
                    </option>
                </select>
            </div>
        </div>
    </div>

</div>