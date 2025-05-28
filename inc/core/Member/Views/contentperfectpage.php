<div class="col-12">
    <h4 class="mb-4">Mr Perfect Detail</h4>
</div>
<div class="row">
    <!-- MmMR_ID -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_id" class="col-sm-4 col-form-label">MmMR ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="mrnmr_id" name="mrnmr_id"
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
    <!-- state -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="state" class="col-sm-4 col-form-label">State</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="state" name="state">
                    <option>Select</option>
                </select>
            </div>
        </div>
    </div>
    <!-- city -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="city" class="col-sm-4 col-form-label">City</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="city" name="city">
                    <option>Select</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Food Preferences -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="food_pref" class="col-sm-4 col-form-label">Food Preference</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="food_pref" name="food_pref">
                    <option>Select Food Preference</option>
                    <option <?= isset($perfectdatas->food_pref) == 'Veg' ? 'selected' : '' ?>>Veg</option>
                    <option <?= isset($perfectdatas->food_pref) == 'Non-Veg' ? 'selected' : '' ?>>Non-Veg</option>
                    <option <?= isset($perfectdatas->food_pref) == 'Vegan' ? 'selected' : '' ?>>Vegan</option>
                    <option <?= isset($perfectdatas->food_pref) == 'Pescatarian' ? 'selected' : '' ?>>Pescatarian</option>
                    <option <?= isset($perfectdatas->food_pref) == 'Jain' ? 'selected' : '' ?>>Jain</option>
                    <option <?= isset($perfectdatas->food_pref) == 'Doesnt Matter' ? 'selected' : '' ?>>Doesn't Matter
                    </option>
                </select>
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
            <label for="degree_of_openness" class="col-sm-4 col-form-label">Degree of Openness</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="degree_of_openness" name="degree_of_openness">
                    <option>Select Degree of Openness</option>
                    <option <?= isset($perfectdatas->degree_of_openness) == 'Out to family' ? 'selected' : '' ?>>Out to
                        family</option>
                    <option <?= isset($perfectdatas->degree_of_openness) == 'Out to close friends' ? 'selected' : '' ?>>Out
                        to close friends</option>
                    <option <?= isset($perfectdatas->degree_of_openness) == 'Out at work' ? 'selected' : '' ?>>Out at work
                    </option>
                    <option <?= isset($perfectdatas->degree_of_openness) == 'Out to the whole world' ? 'selected' : '' ?>>
                        Out to the whole world</option>
                    <option <?= isset($perfectdatas->degree_of_openness) == 'Closeted' ? 'selected' : '' ?>>Closeted
                    </option>
                    <option <?= isset($perfectdatas->degree_of_openness) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't
                        matter</option>
                </select>
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
            <label for="religion" class="col-sm-4 col-form-label">Religion</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="religion" name="religion">
                    <option>Select Religion</option>
                    <option <?= isset($perfectdatas->religion) == 'Agnostic' ? 'selected' : '' ?>>Agnostic</option>
                    <option <?= isset($perfectdatas->religion) == 'Atheist' ? 'selected' : '' ?>>Atheist</option>
                    <option <?= isset($perfectdatas->religion) == 'Buddhist' ? 'selected' : '' ?>>Buddhist</option>
                    <option <?= isset($perfectdatas->religion) == 'Christian' ? 'selected' : '' ?>>Christian</option>
                    <option <?= isset($perfectdatas->religion) == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                    <option <?= isset($perfectdatas->religion) == 'Jain' ? 'selected' : '' ?>>Jain</option>
                    <option <?= isset($perfectdatas->religion) == 'Judaism' ? 'selected' : '' ?>>Judaism</option>
                    <option <?= isset($perfectdatas->religion) == 'Muslim' ? 'selected' : '' ?>>Muslim</option>
                    <option <?= isset($perfectdatas->religion) == 'Sikh' ? 'selected' : '' ?>>Sikh</option>
                    <option <?= isset($perfectdatas->religion) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
                    </option>
                </select>
            </div>
        </div>
    </div>
    <!-- Ideology -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ideology" class="col-sm-4 col-form-label">Ideology</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="ideology" name="ideology">
                    <option>Select Ideology</option>
                    <option <?= isset($perfectdatas->ideology) == 'Right-wing' ? 'selected' : '' ?>>Right-wing</option>
                    <option <?= isset($perfectdatas->ideology) == 'Left-wing' ? 'selected' : '' ?>>Left-wing</option>
                    <option <?= isset($perfectdatas->ideology) == 'Moderate' ? 'selected' : '' ?>>Moderate</option>
                    <option <?= isset($perfectdatas->ideology) == 'Apolitical' ? 'selected' : '' ?>>Apolitical</option>
                    <option <?= isset($perfectdatas->ideology) == 'Liberal' ? 'selected' : '' ?>>Liberal</option>
                    <option <?= isset($perfectdatas->ideology) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
                    </option>
                </select>
            </div>
        </div>
    </div>
    <!-- Qualities -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="qualities" class="col-sm-4 col-form-label">Qualities</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="qualities" name="qualities"
                    placeholder="Enter Qualities" value="<?= $perfectdatas->qualities ?? '' ?>"></textarea>
            </div>
        </div>
    </div>
    <!-- Additional -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="additional" class="col-sm-4 col-form-label">Additional</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="additional" name="additional"
                    placeholder="Enter Additional Information" value="<?= $perfectdatas->additional ?? '' ?>"></textarea>
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
                    value="<?= $perfectdatas->negotiable_requirement ?? '' ?>"></textarea>
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
                    value="<?= $perfectdatas->non_negotiable_requirement ?? '' ?>"></textarea>
            </div>
        </div>
    </div>
    <!-- Partner Sexual Position -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_sexual_position" class="col-sm-4 col-form-label">Partner Sexual Position</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="partner_sexual_position"
                    name="partner_sexual_position">
                    <option>Select Partner Sexual Position</option>
                    <option <?= isset($perfectdatas->partner_sexual_position) == 'Top' ? 'selected' : '' ?>>Top</option>
                    <option <?= isset($perfectdatas->partner_sexual_position) == 'Bottom' ? 'selected' : '' ?>>Bottom
                    </option>
                    <option <?= isset($perfectdatas->partner_sexual_position) == 'Side' ? 'selected' : '' ?>>Side</option>
                    <option <?= isset($perfectdatas->partner_sexual_position) == 'Versatile' ? 'selected' : '' ?>>Versatile
                    </option>
                    <option <?= isset($perfectdatas->partner_sexual_position) == 'Asexual' ? 'selected' : '' ?>>Asexual
                    </option>
                    <option <?= isset($perfectdatas->partner_sexual_position) == 'Doesnt matter' ? 'selected' : '' ?>>
                        Doesn't matter</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Political Ideology -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="political_ideology" class="col-sm-4 col-form-label">Political Ideology</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="political_ideology" name="political_ideology">
                    <option value="political_ideology">Select Political Ideology</option>
                    <option <?= isset($perfectdatas->political_ideology) == 'Right-wing' ? 'selected' : '' ?>>Right-wing
                    </option>
                    <option <?= isset($perfectdatas->political_ideology) == 'Left-wing' ? 'selected' : '' ?>>Left-wing
                    </option>
                    <option <?= isset($perfectdatas->political_ideology) == 'Moderate' ? 'selected' : '' ?>>Moderate
                    </option>
                    <option <?= isset($perfectdatas->political_ideology) == 'Apolitical' ? 'selected' : '' ?>>Apolitical
                    </option>
                    <option <?= isset($perfectdatas->political_ideology) == 'Liberal' ? 'selected' : '' ?>>Liberal</option>
                    <option <?= isset($perfectdatas->political_ideology) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't
                        matter</option>
                </select>
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
                    <option <?= isset($perfectdatas->pet_friendly) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->pet_friendly) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->pet_friendly) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
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
                    <option <?= isset($perfectdatas->want_to_have_children) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->want_to_have_children) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->want_to_have_children) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't
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
                    <option <?= isset($perfectdatas->want_to_get_married) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->want_to_get_married) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->want_to_get_married) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter
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
                    <option <?= isset($perfectdatas->have_children) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->have_children) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->have_children) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
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
                    <option <?= isset($perfectdatas->previous_marriage) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($perfectdatas->previous_marriage) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($perfectdatas->previous_marriage) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
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
                     <option <?= isset($perfectdatas->hiv_status) == 'Positive' ? 'selected' : '' ?>>
                        Positive</option>
                    <option <?= isset($perfectdatas->hiv_status) == 'Negative' ? 'selected' : '' ?>>
                        Negative</option>
                    <option <?= isset($perfectdatas->hiv_status) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
                </select>
            </div>
        </div>
    </div>
</div>