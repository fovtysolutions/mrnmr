<div class="row <?= $increasing == false ? 'd-none' : '' ?>">
    <!-- MmMR_ID -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_id" class="col-sm-4 col-form-label">MmMR ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="mrnmr_id" name="mrnmr_id"
                    placeholder="Enter MRnMR ID">
            </div>
        </div>
    </div>

    <!-- Age -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="age_range" class="col-sm-4 col-form-label">Age Range</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="age_range" name="age_range"
                    placeholder="Enter Age Range">
            </div>
        </div>
    </div>

    <!-- Height -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="height_range" class="col-sm-4 col-form-label">Height Range</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="height_range" name="height_range"
                    placeholder="Enter Height Range">
            </div>
        </div>
    </div>

    <!-- Weight -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight_range" class="col-sm-4 col-form-label">Weight Range</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="weight_range" name="weight_range"
                    placeholder="Enter Weight Range(kg)">
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="location" class="col-sm-4 col-form-label">Location</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="location" name="location">
                    <option>Select</option>
                    <option>City Name 1</option>
                    <option>City Name 2</option>
                    <option>City Name 3</option>
                    <!-- Add city names as required -->
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
                    <option>Veg</option>
                    <option>Non-Veg</option>
                    <option>Vegan</option>
                    <option>Pescatarian</option>
                    <option>Jain</option>
                    <option>Doesn't Matter</option>
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
                    placeholder="Enter Lifestyle">
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
                    <option>Out to family</option>
                    <option>Out to close friends</option>
                    <option>Out at work</option>
                    <option>Out to the whole world</option>
                    <option>Closeted</option>
                    <option>Doesn't matter</option>
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
                    placeholder="Enter Hobbies">
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
                    <option>Right-wing</option>
                    <option>Left-wing</option>
                    <option>Moderate</option>
                    <option>Apolitical</option>
                    <option>Liberal</option>
                    <option>Doesn't matter</option>
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
                    placeholder="Enter Qualities"></textarea>
            </div>
        </div>
    </div>
    <!-- Additional -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="additional" class="col-sm-4 col-form-label">Additional</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="additional" name="additional"
                    placeholder="Enter Additional Information"></textarea>
            </div>
        </div>
    </div>
    <!-- Negotiable Requirement -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="negotiable_requirement" class="col-sm-4 col-form-label">Negotiable Requirement</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="negotiable_requirement" name="negotiable_requirement"
                    placeholder="Enter Negotiable Requirement"></textarea>
            </div>
        </div>
    </div>
    <!-- Non-Negotiable Requirements -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="non_negotiable_requirements" class="col-sm-4 col-form-label">Non-Negotiable Requirements</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="non_negotiable_requirements"
                    name="non_negotiable_requirements" placeholder="Enter Non-Negotiable Requirements"></textarea>
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
                    <option>Top</option>
                    <option>Bottom</option>
                    <option>Side</option>
                    <option>Versatile</option>
                    <option>Asexual</option>
                    <option>Doesn't matter</option>
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
                    <option value="Right-wing">Select Political Ideology</option>
                    <option value="Right-wing">Right-wing</option>
                    <option value="Left-wing">Left-wing</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Apolitical">Apolitical</option>
                    <option value="Liberal">Liberal</option>
                    <option value="Doesn't matter">Doesn't matter</option>
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
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Doesn't matter">Doesn't matter</option>
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
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Doesn't matter">Doesn't matter</option>
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
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Doesn't matter">Doesn't matter</option>
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
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Doesn't matter">Doesn't matter</option>
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
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Doesn't matter">Doesn't matter</option>
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
                    <option value="Positive">Positive</option>
                    <option value="Negative">Negative</option>
                    <option value="Doesn't matter">Doesn't matter</option>
                </select>
            </div>
        </div>
    </div>
</div>