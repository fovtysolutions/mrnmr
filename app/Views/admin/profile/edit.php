<div class="row <?= $increasing == false ? 'd-none' : '' ?>">
    <!-- Section A - Personal Information -->
    <div class="col-12">
        <h4>Section A - Personal Information</h4>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="name" name="name"
                    placeholder="Enter Your Name">
            </div>
        </div>
    </div>
   <!-- Email -->
   <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Email">
            </div>
        </div>
    </div>

    <!-- Phone -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mobile" class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8">
                <input type="tel" class="form-control form-control-sm" id="mobile" name="phone" placeholder="Enter Phone Number">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="age" class="col-sm-4 col-form-label">Age</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="age" name="age" placeholder="Enter Age">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="dob" class="col-sm-4 col-form-label">Date of Birth</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="dob" name="dob">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="height" class="col-sm-4 col-form-label">Height (Ft'Inches)</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="height" name="height"
                    placeholder="Enter Height">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight" class="col-sm-4 col-form-label">Weight (KG)</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="weight" name="weight"
                    placeholder="Enter Weight">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="location" class="col-sm-4 col-form-label">Location</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="location" name="location"
                    placeholder="Enter Location">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="address" class="col-sm-4 col-form-label">Complete Address</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="address" name="address"
                    placeholder="Enter Complete Address"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="education" class="col-sm-4 col-form-label">Education</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="education" name="education"
                    placeholder="Enter Education">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="profession" class="col-sm-4 col-form-label">Profession/Organisation</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="profession" name="profession"
                    placeholder="Enter Profession/Organisation">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="income" class="col-sm-4 col-form-label">Annual Income</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="income" name="income"
                    placeholder="Enter Annual Income">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="food_pref" class="col-sm-4 col-form-label">Food Preference</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="food_pref" name="food_preference"
                    placeholder="Enter Food Preference">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="lifestyle_habits" class="col-sm-4 col-form-label">Lifestyle Habits</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="lifestyle_habits" name="lifestyle_habits"
                    placeholder="Enter Lifestyle Habits">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="religion" class="col-sm-4 col-form-label">Religion</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="religion" name="religion"
                    placeholder="Enter Religion">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="drinker" class="col-sm-4 col-form-label">Do you drink?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="drinker" name="drinker">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Occasionally">Occasionally</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="smoker" class="col-sm-4 col-form-label">Do you smoke?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="smoker" name="smoker">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Occasionally">Occasionally</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="degree_of_openness" class="col-sm-4 col-form-label">Degree of Openness</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="degree_of_openness" name="openness"
                    placeholder="Enter Degree of Openness">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ideology" class="col-sm-4 col-form-label">Ideology</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="ideology" name="ideology"
                    placeholder="Enter Ideology">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hobbies" class="col-sm-4 col-form-label">Hobbies</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="hobbies" name="hobbies"
                    placeholder="Enter Hobbies">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="family_info" class="col-sm-4 col-form-label">Family Information</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="family_info" name="family_info"
                    placeholder="Enter Family Information"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="describe_d" class="col-sm-4 col-form-label">Describe Yourself</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="describe_d" name="describe_yourself"
                    placeholder="Describe Yourself"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="past_relationship" class="col-sm-4 col-form-label">Past Relationship Information</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="past_relationship" name="past_relationship"
                    placeholder="Enter Past Relationship Information"></textarea>
            </div>
        </div>
    </div>

    <!-- Section B - References -->
    <div class="col-12">
        <h4>Section B - References</h4>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ref1_name" class="col-sm-4 col-form-label">Reference#1 Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="ref1_name" name="ref1_name"
                    placeholder="Enter Reference#1 Name">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ref1_address" class="col-sm-4 col-form-label">Reference#1 Address</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="ref1_address" name="ref1_address"
                    placeholder="Enter Reference#1 Address"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ref1_phone" class="col-sm-4 col-form-label">Reference#1 Phone</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="ref1_phone" name="ref1_phone"
                    placeholder="Enter Reference#1 Phone">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ref2_name" class="col-sm-4 col-form-label">Reference#2 Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="ref2_name" name="ref2_name"
                    placeholder="Enter Reference#2 Name">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ref2_address" class="col-sm-4 col-form-label">Reference#2 Address</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="ref2_address" name="ref2_address"
                    placeholder="Enter Reference#2 Address"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="ref2_phone" class="col-sm-4 col-form-label">Reference#2 Phone</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="ref2_phone" name="ref2_phone"
                    placeholder="Enter Reference#2 Phone">
            </div>
        </div>
    </div>

    <!-- Section C - Social Media & Digital IDs -->
    <div class="col-12">
        <h4>Section C - Social Media & Digital IDs</h4>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="instagram_link" class="col-sm-4 col-form-label">Instagram</label>
            <div class="col-sm-8">
                <input type="url" class="form-control form-control-sm" id="instagram_link" name="instagram"
                    placeholder="Enter Instagram URL">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="facebook_link" class="col-sm-4 col-form-label">Facebook</label>
            <div class="col-sm-8">
                <input type="url" class="form-control form-control-sm" id="facebook_link" name="facebook"
                    placeholder="Enter Facebook URL">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="twitter_link" class="col-sm-4 col-form-label">Twitter</label>
            <div class="col-sm-8">
                <input type="url" class="form-control form-control-sm" id="twitter_link" name="facebook"
                    placeholder="Enter Twitter URL">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="linkdin_link" class="col-sm-4 col-form-label">LinkedIn</label>
            <div class="col-sm-8">
                <input type="url" class="form-control form-control-sm" id="linkdin_link" name="linkedin"
                    placeholder="Enter LinkedIn URL">
            </div>
        </div>
    </div>
    <!-- Section D - Other Important Information/Documents -->
    <div class="col-12">
        <h4>Section D - Other Important Information/Documents</h4>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="photo1" class="col-sm-4 col-form-label">Upload Photo 1</label>
            <div class="col-sm-8">
                <input type="file" class="form-control-file form-control-sm" id="photo1" name="photo1">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="photo2" class="col-sm-4 col-form-label">Upload Photo 2</label>
            <div class="col-sm-8">
                <input type="file" class="form-control-file form-control-sm" id="photo2" name="photo2">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="address_proof" class="col-sm-4 col-form-label">Upload Address Proof</label>
            <div class="col-sm-8">
                <input type="file" class="form-control-file form-control-sm" id="address_proof" name="address_proof">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="pan_card" class="col-sm-4 col-form-label">Upload PAN Card</label>
            <div class="col-sm-8">
                <input type="file" class="form-control-file form-control-sm" id="pan_card" name="pan_card">
            </div>
        </div>
    </div>

    <!-- Section E - Your Mr. Right -->
    <div class="col-12">
        <h4>Section E - Your Mr. Right</h4>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_age" class="col-sm-4 col-form-label">Age</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="partner_age" name="partner_age"
                    placeholder="Enter Partner Age">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_height" class="col-sm-4 col-form-label">Height (Ft'Inches)</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_height" name="partner_height"
                    placeholder="Enter Height">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_weight" class="col-sm-4 col-form-label">Weight (KG)</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="partner_weight" name="partner_weight"
                    placeholder="Enter Weight">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_location" class="col-sm-4 col-form-label">Location</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_location" name="partner_location"
                    placeholder="Enter Location">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_education" class="col-sm-4 col-form-label">Education</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_education" name="partner_education"
                    placeholder="Enter Education">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_profession" class="col-sm-4 col-form-label">Profession/Organisation</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_profession" name="partner_profession"
                    placeholder="Enter Profession/Organisation">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_annual_income" class="col-sm-4 col-form-label">Annual Income</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_annual_income" name="partner_annual_income"
                    placeholder="Enter Partner Annual Income">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_food_pref" class="col-sm-4 col-form-label">Food Preference</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_food_pref" name="partner_food_pref"
                    placeholder="Enter Food Preference">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_lifestyle_habits" class="col-sm-4 col-form-label">Lifestyle Habits</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_lifestyle_habits" name="partner_lifestyle_habits"
                    placeholder="Enter Lifestyle Habits">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_degree_of_openness" class="col-sm-4 col-form-label">Degree of Openness</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_degree_of_openness" name="partner_degree_of_openness"
                    placeholder="Enter Degree of Openness">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_hobbies" class="col-sm-4 col-form-label">Hobbies</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_hobbies" name="partner_hobbies"
                    placeholder="Enter Hobbies">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_religion" class="col-sm-4 col-form-label">Religion</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_religion" name="partner_religion"
                    placeholder="Enter Religion">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_ideology" class="col-sm-4 col-form-label">Ideology</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="partner_ideology" name="partner_ideology"
                    placeholder="Enter Ideology">
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_family_info" class="col-sm-4 col-form-label">Family Information</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="partner_family_info" name="partner_family_info"
                    placeholder="Enter Family Information"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_describe_d" class="col-sm-4 col-form-label">Describe Your Partner</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="partner_describe_d" name="partner_describe_d"
                    placeholder="Describe Your Partner"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="partner_us_to_consider" class="col-sm-4 col-form-label">Anything else you would want us to consider while looking for a suitable partner for you?</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="partner_us_to_consider" name="partner_us_to_consider"
                    placeholder="Share additional thoughts"></textarea>
            </div>
        </div>
    </div>
</div>