<div class="col-12">
    <h4 class="mb-4">Mr Perfect Detail</h4>
</div>
<div class="row">
    <!-- MmMR_ID -->
    <div hidden class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_idperfect" class="col-sm-4 col-form-label">MmMR ID</label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control form-control-sm" id="mrnmr_idperfect" name="mrnmr_id"
                    placeholder="Enter MRnMR ID" value="<?= $perfectdatas->mrnmr_id ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Age -->
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
    <!-- Height -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="height_range" class="col-sm-4 col-form-label">Height Range</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="heightRangeMin"
                            name="heightRangeMin" min="18" max="99" placeholder="Min Height"
                            value="<?= $perfectdatas->heightRangeMin ?? '' ?>">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="heightRangeMax"
                            name="heightRangeMax" min="18" max="99" placeholder="Max Height"
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
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight_range" class="col-sm-4 col-form-label">Weight Range</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="weightRangeMin"
                            name="weightRangeMin" min="18" max="99" placeholder="Min Weight"
                            value="<?= $perfectdatas->weightRangeMin ?? '' ?>">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="weightRangeMax"
                            name="weightRangeMax" min="18" max="99" placeholder="Max Weight"
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
    <!-- country -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="perfectcountry" class="col-sm-4 col-form-label">Country</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="perfectcountry" name="country">
                    <option>Select</option>
                </select>
            </div>
        </div>
    </div>
    <!-- state -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="perfectstate" class="col-sm-4 col-form-label">State</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="perfectstate" name="state">
                    <option>Select</option>
                </select>
            </div>
        </div>
    </div>
    <!-- city -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="perfectcity" class="col-sm-4 col-form-label">City</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="perfectcity" name="city">
                    <option>Select</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Food Preferences -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="food_prefR" class="col-sm-4 col-form-label">Food Preference</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2" id="food_prefR">
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
    <!-- Life Style -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="lifestyle" class="col-sm-4 col-form-label">Lifestyle</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="lifestyle" name="lifestyle"
                    placeholder="Enter Lifestyle" value="<?= $perfectdatas->lifestyle ?? '' ?>">
            </div>
        </div>
    </div>
    <!-- Degree of Openness -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="degree_of_opennessR" class="col-sm-4 col-form-label">Degree of Openness</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2" id="degree_of_opennessR">
                    <option>Select Degree of Openness</option>
                    <option>Out to family</option>
                    <option>Out to close friends</option>
                    <option>Out at work</option>
                    <option>Out to the whole world</option>
                    <option>Closeted</option>
                    <option>Doesn't matter</option>
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
    <!-- Hobbies -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hobbies" class="col-sm-4 col-form-label">Hobbies</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="hobbies" name="hobbies"
                    placeholder="Enter Hobbies" value="<?= $perfectdatas->hobbies ?? '' ?>">
            </div>
        </div>
    </div>
    <!-- Religion -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="religionR" class="col-sm-4 col-form-label">Religion</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2" id="religionR">
                    <option>Select Religion</option>
                    <option>Agnostic</option>
                    <option>Atheist</option>
                    <option>Buddhist</option>
                    <option>Christian</option>
                    <option>Hindu</option>
                    <option>Jain</option>
                    <option>Judaism</option>
                    <option>Muslim</option>
                    <option>Sikh</option>
                    <option>Doesn't matter</option>
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
                <select class="form-control form-control-sm mb-2" id="ideologyR">
                    <option>Select Ideology</option>
                    <option>Right-wing</option>
                    <option>Left-wing</option>
                    <option>Moderate</option>
                    <option>Apolitical</option>
                    <option>Liberal</option>
                    <option>Doesn't matter</option>
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
    <!-- Qualities -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="qualities" class="col-sm-4 col-form-label">Qualities</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="qualities" name="qualities"
                    placeholder="Enter Qualities" value=""><?= $perfectdatas->qualities ?? '' ?></textarea>
            </div>
        </div>
    </div>
    <!-- Additional -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="additional" class="col-sm-4 col-form-label">Additional</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="additional" name="additional"
                    placeholder="Enter Additional Information" value=""><?= $perfectdatas->additional ?? '' ?></textarea>
            </div>
        </div>
    </div>
    <!-- Negotiable Requirement -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="negotiable_requirement" class="col-sm-4 col-form-label">Negotiable Requirement</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="negotiable_requirement" name="negotiable_requirement"
                    placeholder="Enter Negotiable Requirement"
                    value=""><?= $perfectdatas->negotiable_requirement ?? '' ?></textarea>
            </div>
        </div>
    </div>
    <!-- Non-Negotiable Requirements -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="non_negotiable_requirements" class="col-sm-4 col-form-label">Non-Negotiable Requirements</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="non_negotiable_requirements"
                    name="non_negotiable_requirements" placeholder="Enter Non-Negotiable Requirements"
                    value=""><?= $perfectdatas->non_negotiable_requirements ?? '' ?></textarea>
            </div>
        </div>
    </div>
    <!-- Partner Sexual Position -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_sexual_positionR" class="col-sm-4 col-form-label">Partner Sexual Position</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2" id="partner_sexual_positionR">
                    <option>Select Partner Sexual Position</option>
                    <option>Top</option>
                    <option>Bottom</option>
                    <option>Side</option>
                    <option>Versatile</option>
                    <option>Asexual</option>
                    <option>Doesn't matter</option>
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
    <!-- Political Ideology -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="political_ideologyR" class="col-sm-4 col-form-label">Political Ideology</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2" id="political_ideologyR">
                    <option value="political_ideologyR">Select Political Ideology</option>
                    <option>Right-wing</option>
                    <option>Left-wing</option>
                    <option>Moderate</option>
                    <option>Apolitical</option>
                    <option>Liberal</option>
                    <option>Doesn'tmatter</option>
                </select>
                <?php 
                    $addDeleteEditData = [
                        'mainArray' => json_encode(isset($perfectdatas->political_ideologyR) ? json_decode($perfectdatas->political_ideologyR) : []),
                        'MainColumn' => 'political_ideologyR'
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
    <!-- Have Children -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="have_children" class="col-sm-4 col-form-label">Have Children ?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="have_children" name="have_children">
                    <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->have_children) && $perfectdatas->have_children == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->have_children) && $perfectdatas->have_children == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->have_children) && $perfectdatas->have_children == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Previous Marriage -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="previous_marriage" class="col-sm-4 col-form-label">Previous Marriage?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="previous_marriage" name="previous_marriage">
                    <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->previous_marriage) && $perfectdatas->previous_marriage == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->previous_marriage) && $perfectdatas->previous_marriage == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->previous_marriage) && $perfectdatas->previous_marriage == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
                </select>
            </div>
        </div>
    </div>
    <!-- HIV Status -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hiv_status" class="col-sm-4 col-form-label">HIV Status</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="hiv_status" name="hiv_status">
                    <option value="Select">Select</option>
                    <option <?= isset($perfectdatas->hiv_status) && $perfectdatas->hiv_status == 'Positive' ? 'selected' : '' ?>>Positive</option>
                    <option <?= isset($perfectdatas->hiv_status) && $perfectdatas->hiv_status == 'Negative' ? 'selected' : '' ?>>Negative</option>
                    <option <?= isset($perfectdatas->hiv_status) && $perfectdatas->hiv_status == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
                </select>
            </div>
        </div>
    </div>
</div>