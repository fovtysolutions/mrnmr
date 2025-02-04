<form id="profileform">
    <div class="az-content-body az-content-body-dashboard-six">
        <div class="card-body-container">
            <div class="row">
                <!-- Section A - Personal Information -->
                <div class="col-12">
                    <h4 class="mb-4">Section A - Personal Information</h4>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="name" name="username"
                                placeholder="Enter Your Name" value="<?= $data['username'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input readonly type="email" class="form-control form-control-sm" id="email" name="email"
                                placeholder="Enter Email" value="<?= $data['email'] ?? '' ?>">
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="mobile" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control form-control-sm" id="mobile" name="mobile"
                                placeholder="Enter Phone Number" value="<?= $data['mobile'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="age" class="col-sm-4 col-form-label">Age</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="age" name="age"
                                placeholder="Enter Age" value="<?= $data['age'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="dob" class="col-sm-4 col-form-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control form-control-sm" id="dob" name="dob"
                                value="<?= $data['dob'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="height" class="col-sm-4 col-form-label">Height (Ft'Inches)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="height" name="height"
                                placeholder="Enter Height" value="<?= $data['height'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="weight" class="col-sm-4 col-form-label">Weight (KG)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="weight" name="weight"
                                placeholder="Enter Weight" value="<?= $data['weight'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="location" class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="location" name="location"
                                placeholder="Enter Location" value="<?= $data['location'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="complete_address" class="col-sm-4 col-form-label">Complete Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="complete_address" name="complete_address"
                                placeholder="Enter Complete Address"> <?= $data['complete_address'] ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="education" class="col-sm-4 col-form-label">Education</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="education" name="education"
                                value="<?= $data['education'] ?? '' ?>">
                                <option>Select Education</option>
                                <option>Metrics</option>
                                <option>Graduate</option>
                                <option>Post-Graduate</option>
                                <option>Masters</option>
                                <option>PhD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="profession" class="col-sm-4 col-form-label">Profession / Organisation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="profession" name="profession"
                                placeholder="Enter Profession/Organisation" value="<?= $data['profession'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="annual_income" class="col-sm-4 col-form-label">Annual Income</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="annual_income"
                                name="annual_income" placeholder="Enter Annual Income"
                                value="<?= $data['annual_income'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="food_pref" class="col-sm-4 col-form-label">Food Preference</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="food_pref" name="food_pref"
                                value="<?= $data['food_pref'] ?? '' ?>">
                                <option>Select Food Preference</option>
                                <option>Veg</option>
                                <option>Non-Veg</option>
                                <option>Vegan</option>
                                <option>Pescatarian</option>
                                <option>Jain</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="lifestyle_habits" class="col-sm-4 col-form-label">Lifestyle Habits</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="lifestyle_habits"
                                name="lifestyle_habits" placeholder="Enter Lifestyle Habits"
                                value="<?= $data['lifestyle_habits'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="religion" class="col-sm-4 col-form-label">Religion</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="religion" name="religion"
                                value="<?= $data['religion'] ?? '' ?>">
                                <option>Select Religion</option>
                                <option>Hindu</option>
                                <option>Muslim</option>
                                <option>Christian</option>
                                <option>Agnostic</option>
                                <option>Buddhist</option>
                                <option>Atheist</option>
                                <option>Jewish</option>
                                <option>Jain</option>
                                <option>Sikh</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="drinker" class="col-sm-4 col-form-label">Do you drink?</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="drinker" name="drinker"
                                value="<?= $data['drinker'] ?? '' ?>">
                                <option value="Select">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="Sometimes">Sometimes</option>
                                <option value="Socially">Socially</option>
                                <option value="No">No</option>
                                <option value="Sober">Sober</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="smoker" class="col-sm-4 col-form-label">Do you smoke?</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="smoker" name="smoker"
                                value="<?= $data['smoker'] ?? '' ?>">
                                <option>Select</option>
                                <option>Sometimes</option>
                                <option>No</option>
                                <option>Yes</option>
                                <option>Trying to quit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="degree_of_openness" class="col-sm-4 col-form-label">Degree of Openness</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="degree_of_openness"
                                name="degree_of_openness" value="<?= $data['degree_of_openness'] ?? '' ?>">
                                <option>Select Degree of Openness</option>
                                <option>Out to family</option>
                                <option>Out to close friends</option>
                                <option>Out at work</option>
                                <option>Out to the whole world</option>
                                <option>Closeted</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ideology" class="col-sm-4 col-form-label">Ideology</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="ideology" name="ideology"
                                value="<?= $data['ideology'] ?? '' ?>">
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
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="hobbies" class="col-sm-4 col-form-label">Hobbies</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="hobbies" name="hobbies"
                                placeholder="Enter Hobbies" value="<?= $data['hobbies'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="familybg" class="col-sm-4 col-form-label">Family Information</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="familybg" name="familybg"
                                placeholder="Enter Family Information"><?= $data['familybg'] ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="describe_d" class="col-sm-4 col-form-label">Describe Yourself</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="describe_d" name="describe_d"
                                placeholder="Describe Yourself" <?= $data['describe_d'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="past_relationship" class="col-sm-4 col-form-label">Past Relationship
                            Information</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="past_relationship"
                                name="past_relationship" placeholder="Enter Past Relationship Information"
                                <?= $data['past_relationship'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>
                <hr class="my-4" style="color:#c1c1c1">
                <!-- Section B - References -->
                <div class="col-12">
                    <h4 class="mb-4">Section B - References</h4>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref1_name" class="col-sm-4 col-form-label">Reference#1 Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref1_name" name="ref1_name"
                                placeholder="Enter Reference#1 Name" value="<?= $data['ref1_name'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref1_phone" class="col-sm-4 col-form-label">Reference#1 Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref1_phone" name="ref1_phone"
                                placeholder="Enter Reference#1 Phone" value="<?= $data['ref1_phone'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref1_address" class="col-sm-4 col-form-label">Reference#1 Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="ref1_address" name="ref1_address"
                                placeholder="Enter Reference#1 Address" <?= $data['ref1_address'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref2_name" class="col-sm-4 col-form-label">Reference#2 Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref2_name" name="ref2_name"
                                placeholder="Enter Reference#2 Name" value="<?= $data['ref2_name'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref2_phone" class="col-sm-4 col-form-label">Reference#2 Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref2_phone" name="ref2_phone"
                                placeholder="Enter Reference#2 Phone" value="<?= $data['ref2_phone'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref2_address" class="col-sm-4 col-form-label">Reference#2 Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="ref2_address" name="ref2_address"
                                placeholder="Enter Reference#2 Address" <?= $data['ref2_address'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="color:#c1c1c1">
                <!-- Section C - Social Media & Digital IDs -->
                <div class="col-12">
                    <h4 class="mb-4">Section C - Social Media & Digital IDs</h4>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="instagram_link" class="col-sm-4 col-form-label">Instagram</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="instagram_link"
                                name="instagram_link" placeholder="Enter Instagram URL"
                                value="<?= $data['instagram_link'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="facebook_link" class="col-sm-4 col-form-label">Facebook</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="facebook_link"
                                name="facebook_link" placeholder="Enter Facebook URL"
                                value="<?= $data['facebook_link'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="twitter_link" class="col-sm-4 col-form-label">Twitter</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="twitter_link" name="twitter_link"
                                placeholder="Enter Twitter URL" value="<?= $data['twitter_link'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="linkdin_link" class="col-sm-4 col-form-label">LinkedIn</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="linkdin_link" name="linkdin_link"
                                placeholder="Enter LinkedIn URL" value="<?= $data['linkdin_link'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <hr class="my-4" style="color:#c1c1c1">
                <!-- Section D - Other Important Information/Documents -->
                <div class="col-12">
                    <h4 class="mb-4">Section D - Other Important Information/Documents</h4>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="photo1" class="col-sm-4 col-form-label">Upload Photo 1</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="photo12" name="photo12"
                                value="<?= $data['photo1'] ?? '' ?>">
                            <?php echo view('hooks/imageorfileupload', ['imageids' => 'photo1', 'input' => 'photo12', 'filetype' => 'image']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="photo2" class="col-sm-4 col-form-label">Upload Photo 2</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="photo22" name="photo22"
                                value="<?= $data['photo2'] ?? '' ?>">
                            <?php echo view('hooks/imageorfileupload', ['imageids' => 'photo2', 'input' => 'photo22', 'filetype' => 'image']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="address_proof" class="col-sm-4 col-form-label">Upload Address Proof</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="address_proof1"
                                name="address_proof1" value="<?= $data['address_proof'] ?? '' ?>">
                            <?php echo view('hooks/imageorfileupload', ['imageids' => 'address_proof', 'input' => 'address_proof1', 'filetype' => 'image']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="pan_card" class="col-sm-4 col-form-label">Upload PAN Card</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="pan_card1" name="pan_card1"
                                value="<?= $data['pan_card'] ?? '' ?>">
                            <?php echo view('hooks/imageorfileupload', ['imageids' => 'pan_card', 'input' => 'pan_card1', 'filetype' => 'image']); ?>
                        </div>
                    </div>
                </div>
                <hr class="my-4" style="color:#c1c1c1">
                <!-- Section E - Your Mr. Right -->
                <div class="col-12">
                    <h4 class="mb-4">Section E - Your Mr. Right</h4>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_age" class="col-sm-4 col-form-label">Age</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="partner_age"
                                name="partner_age" placeholder="Enter Partner Age"
                                value="<?= $data['partner_age'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_height" class="col-sm-4 col-form-label">Height (Ft'Inches)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_height"
                                name="partner_height" placeholder="Enter Height"
                                value="<?= $data['partner_height'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_weight" class="col-sm-4 col-form-label">Weight (KG)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="partner_weight"
                                name="partner_weight" placeholder="Enter Weight"
                                value="<?= $data['partner_weight'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_location" class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_location"
                                name="partner_location" placeholder="Enter Location"
                                value="<?= $data['partner_location'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_education" class="col-sm-4 col-form-label">Education</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_education" name="partner_education"
                                placeholder="Enter Education" value="<?= $data['partner_education'] ?? '' ?>">
                                <option>Select Education</option>
                                <option>Metrics</option>
                                <option>Graduate</option>
                                <option>Post-Graduate</option>
                                <option>Masters</option>
                                <option>PhD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_profession" class="col-sm-4 col-form-label">Profession /
                            Organisation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_profession"
                                name="partner_profession" placeholder="Enter Profession/Organisation"
                                value="<?= $data['partner_profession'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_annual_income" class="col-sm-4 col-form-label">Annual Income</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_annual_income"
                                name="partner_annual_income" placeholder="Enter Partner Annual Income"
                                value="<?= $data['partner_annual_income'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_food_pref" class="col-sm-4 col-form-label">Food Preference</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_food_pref" name="partner_food_pref"
                                value="<?= $data['partner_food_pref'] ?? '' ?>">
                                <option>Select Food Preference</option>
                                <option>Veg</option>
                                <option>Non-Veg</option>
                                <option>Vegan</option>
                                <option>Pescatarian</option>
                                <option>Jain</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_lifestyle_habits" class="col-sm-4 col-form-label">Lifestyle Habits</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_lifestyle_habits"
                                name="partner_lifestyle_habits" placeholder="Enter Lifestyle Habits"
                                value="<?= $data['partner_lifestyle_habits'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_degree_of_openness" class="col-sm-4 col-form-label">Degree of
                            Openness</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_degree_of_openness"
                                name="partner_degree_of_openness"
                                value="<?= $data['partner_degree_of_openness'] ?? '' ?>">
                                <option>Select Degree of Openness</option>
                                <option>Out to family</option>
                                <option>Out to close friends</option>
                                <option>Out at work</option>
                                <option>Out to the whole world</option>
                                <option>Closeted</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_hobbies" class="col-sm-4 col-form-label">Hobbies</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_hobbies"
                                name="partner_hobbies" placeholder="Enter Hobbies"
                                value="<?= $data['partner_hobbies'] ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_religion" class="col-sm-4 col-form-label">Religion</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_religion" name="partner_religion"
                                value="<?= $data['partner_religion'] ?? '' ?>">
                                <option>Select Religion</option>
                                <option>Hindu</option>
                                <option>Muslim</option>
                                <option>Christian</option>
                                <option>Agnostic</option>
                                <option>Buddhist</option>
                                <option>Atheist</option>
                                <option>Jewish</option>
                                <option>Jain</option>
                                <option>Sikh</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_ideology" class="col-sm-4 col-form-label">Ideology</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_ideology" name="partner_ideology"
                                value="<?= $data['partner_ideology'] ?? '' ?>">
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
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_family_info" class="col-sm-4 col-form-label">Family Information</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="partner_family_info"
                                name="partner_family_info" placeholder="Enter Family Information"
                                <?= $data['partner_family_info'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_describe_d" class="col-sm-4 col-form-label">Describe Your Partner</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="partner_describe_d"
                                name="partner_describe_d" placeholder="Describe Your Partner"
                                <?= $data['partner_describe_d'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-8">
                    <div class="form-group row d-flex flex-column gap-2">
                        <label for="partner_us_to_consider" class="col-sm-12 col-form-label">Anything else you would
                            want us
                            to
                            consider while looking for a suitable partner for you?</label>
                        <div class="col-sm-6">
                            <textarea class="form-control form-control-sm" id="partner_us_to_consider"
                                name="partner_us_to_consider" placeholder="Share additional thoughts"
                                <?= $data['partner_us_to_consider'] ?? '' ?>></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-buttons my-3 justify-content-end">
                    <!-- Save and Close Button -->
                    <button type="submit" id="savebtn" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="<?php echo csrf_token(); ?>" value="<?php echo csrf_hash(); ?>" id="csrf_token">
</form>
<script>
    $(document).ready(function () {
        $("#profileform").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_URL('admin/updateprofile') ?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_hash(); ?>',
                },
                beforeSend: function () {
                    $("#savebtn").val("Please Wait...");
                },
                success: function (response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#csrf_token').val(response.new_csrf_token);
                    } else if (response.status === 'error') {
                        toastr.error(response.message || "An error occurred!");
                    }
                },
                error: function () {
                    toastr.error("An unexpected error occurred!");
                    $("#savebtn").val("Save & Close");
                }
            });
        });
    });
</script>