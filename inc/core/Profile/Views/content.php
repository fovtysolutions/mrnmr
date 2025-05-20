<form id="<?=$formid?>">
    <input type="hidden" name="edit" value="<?=$editit?>">
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
                            <input type="text" class="form-control form-control-sm" id="name" name="username" placeholder="Enter Your Name" value="<?= $userprofile->username ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input readonly type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Email" value="<?= $userprofile->email ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!-- Phone -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="mobile" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Enter Phone Number" value="<?= $userprofile->mobile ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!-- Date of Birth -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="dob" class="col-sm-4 col-form-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control form-control-sm" id="dob" name="dob"  value="<?= $profile->dob ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!-- Age (Auto-filled) -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="age" class="col-sm-4 col-form-label">Age</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="age" name="age" placeholder="Auto-calculated Age" readonly value="<?= $userprofile->age ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="height" class="col-sm-4 col-form-label">Height (Ft'Inches)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="height" name="height" placeholder="Enter Height" value="<?= $profile->height ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="weight" class="col-sm-4 col-form-label">Weight (KG)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="weight" name="weight" placeholder="Enter Weight" value="<?= $profile->weight ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!-- state -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="state" class="col-sm-4 col-form-label">State</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="state" name="state">
                                <option value="">Select</option>
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
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="complete_address" class="col-sm-4 col-form-label">Complete Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="complete_address" name="complete_address" placeholder="Enter Complete Address"><?= $profile->complete_address ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="education" class="col-sm-4 col-form-label">Education</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="education" name="education">
                                <option>Select Education</option>
                                <option <?= isset($profile->education) == 'Metrics' ? 'selected' : '' ?>>Metrics</option>
                                <option <?= isset($profile->education) == 'Graduate' ? 'selected' : '' ?>>Graduate</option>
                                <option <?= isset($profile->education) == 'Post-Graduate' ? 'selected' : '' ?>>Post-Graduate</option>
                                <option <?= isset($profile->education) == 'Masters' ? 'selected' : '' ?>>Masters</option>
                                <option <?= isset($profile->education) == 'PhD' ? 'selected' : '' ?>>PhD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="profession" class="col-sm-4 col-form-label">Profession / Organisation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="profession" name="profession" placeholder="Enter Profession/Organisation" value="<?= $profile->profession ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="annual_income" class="col-sm-4 col-form-label">Annual Income</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="annual_income" name="annual_income" placeholder="Enter Annual Income" value="<?= $profile->annual_income ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="food_pref" class="col-sm-4 col-form-label">Food Preference</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="food_pref" name="food_pref">
                                <option>Select Food Preference</option>
                                <option <?= isset($profile->food_pref) == 'Veg' ? 'selected' : '' ?>>Veg</option>
                                <option <?= isset($profile->food_pref) == 'Non-Veg' ? 'selected' : '' ?>>Non-Veg</option>
                                <option <?= isset($profile->food_pref) == 'Vegan' ? 'selected' : '' ?>>Vegan</option>
                                <option <?= isset($profile->food_pref) == 'Pescatarian' ? 'selected' : '' ?>>Pescatarian</option>
                                <option <?= isset($profile->food_pref) == 'Jain' ? 'selected' : '' ?>>Jain</option>
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
                                value="<?= $profile->lifestyle_habits ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="religion" class="col-sm-4 col-form-label">Religion</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="religion" name="religion">
                                <option>Select Religion</option>
                                <option <?= isset($profile->religion) == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option <?= isset($profile->religion) == 'Muslim' ? 'selected' : '' ?>>Muslim</option>
                                <option <?= isset($profile->religion) == 'Christian' ? 'selected' : '' ?>>Christian</option>
                                <option <?= isset($profile->religion) == 'Agnostic' ? 'selected' : '' ?>>Agnostic</option>
                                <option <?= isset($profile->religion) == 'Buddhist' ? 'selected' : '' ?>>Buddhist</option>
                                <option <?= isset($profile->religion) == 'Atheist' ? 'selected' : '' ?>>Atheist</option>
                                <option <?= isset($profile->religion) == 'Jewish' ? 'selected' : '' ?>>Jewish</option>
                                <option <?= isset($profile->religion) == 'Jain' ? 'selected' : '' ?>>Jain</option>
                                <option <?= isset($profile->religion) == 'Sikh' ? 'selected' : '' ?>>Sikh</option>
                                <option <?= isset($profile->religion) == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="drinker" class="col-sm-4 col-form-label">Do you drink?</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="drinker" name="drinker">
                                <option value="Select">Select</option>
                                <option <?= isset($profile->drinker) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                                <option <?= isset($profile->drinker) == 'Sometimes' ? 'selected' : '' ?>>Sometimes</option>
                                <option <?= isset($profile->drinker) == 'Socially' ? 'selected' : '' ?>>Socially</option>
                                <option <?= isset($profile->drinker) == 'No' ? 'selected' : '' ?>>No</option>
                                <option <?= isset($profile->drinker) == 'Sober' ? 'selected' : '' ?>>Sober</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="smoker" class="col-sm-4 col-form-label">Do you smoke?</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="smoker" name="smoker">
                                <option>Select</option>
                                <option <?= isset($profile->smoker) == 'Sometimes' ? 'selected' : '' ?>>Sometimes</option>
                                <option <?= isset($profile->smoker) == 'No' ? 'selected' : '' ?>>No</option>
                                <option <?= isset($profile->smoker) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                                <option <?= isset($profile->smoker) == 'Trying to quit' ? 'selected' : '' ?>>Trying to quit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="degree_of_openness" class="col-sm-4 col-form-label">Degree of Openness</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="degree_of_openness"
                                name="degree_of_openness">
                                <option>Select Degree of Openness</option>
                                <option <?= isset($profile->degree_of_openness) == 'Out to family' ? 'selected' : '' ?>>Out to family</option>
                                <option <?= isset($profile->degree_of_openness) == 'Out to close friends' ? 'selected' : '' ?>>Out to close friends</option>
                                <option <?= isset($profile->degree_of_openness) == 'Out at work' ? 'selected' : '' ?>>Out at work</option>
                                <option <?= isset($profile->degree_of_openness) == 'Out to the whole world' ? 'selected' : '' ?>>Out to the whole world</option>
                                <option <?= isset($profile->degree_of_openness) == 'Closeted' ? 'selected' : '' ?>>Closeted</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ideology" class="col-sm-4 col-form-label">Ideology</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="ideology" name="ideology">
                                <option>Select Ideology</option>
                                <option <?= isset($profile->ideology) == 'Right-wing' ? 'selected' : '' ?>>Right-wing</option>
                                <option <?= isset($profile->ideology) == 'Left-wing' ? 'selected' : '' ?>>Left-wing</option>
                                <option <?= isset($profile->ideology) == 'Moderate' ? 'selected' : '' ?>>Moderate</option>
                                <option <?= isset($profile->ideology) == 'Apolitical' ? 'selected' : '' ?>>Apolitical</option>
                                <option <?= isset($profile->ideology) == 'Liberal' ? 'selected' : '' ?>>Liberal</option>
                                <option <?= isset($profile->ideology) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="hobbies" class="col-sm-4 col-form-label">Hobbies</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="hobbies" name="hobbies"
                                placeholder="Enter Hobbies" value="<?= $profile->hobbies ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="familybg" class="col-sm-4 col-form-label">Family Information</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="familybg" name="familybg"
                                placeholder="Enter Family Information"><?= $profile->familybg ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="describe_d" class="col-sm-4 col-form-label">Describe Yourself</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="describe_d" name="describe_d"
                                placeholder="Describe Yourself"><?= $profile->describe_d ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="past_relationship" class="col-sm-4 col-form-label">Past Relationship
                            Information</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="past_relationship"
                                name="past_relationship" placeholder="Enter Past Relationship Information"><?= $profile->past_relationship ?? '' ?></textarea>
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
                                placeholder="Enter Reference#1 Name" value="<?= $profile->ref1_name ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref1_phone" class="col-sm-4 col-form-label">Reference#1 Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref1_phone" name="ref1_phone"
                                placeholder="Enter Reference#1 Phone" value="<?= $profile->ref1_phone ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref1_address" class="col-sm-4 col-form-label">Reference#1 Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="ref1_address" name="ref1_address"
                                placeholder="Enter Reference#1 Address"> <?= $profile->ref1_address ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref2_name" class="col-sm-4 col-form-label">Reference#2 Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref2_name" name="ref2_name"
                                placeholder="Enter Reference#2 Name" value="<?= $profile->ref2_name ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref2_phone" class="col-sm-4 col-form-label">Reference#2 Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="ref2_phone" name="ref2_phone"
                                placeholder="Enter Reference#2 Phone" value="<?= $profile->ref2_phone ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="ref2_address" class="col-sm-4 col-form-label">Reference#2 Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="ref2_address" name="ref2_address"
                                placeholder="Enter Reference#2 Address"><?= $profile->ref2_address ?? '' ?></textarea>
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
                                value="<?= $profile->instagram_link ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="facebook_link" class="col-sm-4 col-form-label">Facebook</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="facebook_link"
                                name="facebook_link" placeholder="Enter Facebook URL"
                                value="<?= $profile->facebook_link ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="twitter_link" class="col-sm-4 col-form-label">Twitter</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="twitter_link" name="twitter_link"
                                placeholder="Enter Twitter URL" value="<?= $profile->twitter_link ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="linkdin_link" class="col-sm-4 col-form-label">LinkedIn</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control form-control-sm" id="linkdin_link" name="linkdin_link"
                                placeholder="Enter LinkedIn URL" value="<?= $profile->linkdin_link ?? '' ?>">
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
                            <input type="file" class="form-control-file form-control-sm" id="photo123">
                            <input type="hidden" class="form-control-file form-control-sm" id="photo12" name="photo1" value="<?= $profile->photo1 ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="photo2" class="col-sm-4 col-form-label">Upload Photo 2</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="photo223">
                            <input type="hidden" class="form-control-file form-control-sm" id="photo22" name="photo2" value="<?= $profile->photo2 ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="address_proof" class="col-sm-4 col-form-label">Upload Address Proof</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="address_proof13">
                            <input type="hidden" class="form-control-file form-control-sm" id="address_proof1" name="address_proof" value="<?= $profile->address_proof ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="pan_card" class="col-sm-4 col-form-label">Upload PAN Card</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file form-control-sm" id="pan_card13">
                            <input type="hidden" class="form-control-file form-control-sm" id="pan_card1" name="pan_card" value="<?= $profile->pan_card ?? '' ?>">
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
                                value="<?= $profile->partner_age ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_height" class="col-sm-4 col-form-label">Height (Ft'Inches)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_height"
                                name="partner_height" placeholder="Enter Height"
                                value="<?= $profile->partner_height ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_weight" class="col-sm-4 col-form-label">Weight (KG)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control form-control-sm" id="partner_weight"
                                name="partner_weight" placeholder="Enter Weight"
                                value="<?= $profile->partner_weight ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_location" class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_location"
                                name="partner_location" placeholder="Enter Location"
                                value="<?= $profile->partner_location ?? '' ?>">
                        </div>
                    </div>
                </div>
                <!--Partners state -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_state" class="col-sm-4 col-form-label">State</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_state" name="partner_state">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--Partners city -->
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_city" class="col-sm-4 col-form-label">City</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_city" name="partner_city">
                                <option>Select</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_education" class="col-sm-4 col-form-label">Education</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_education" name="partner_education" placeholder="Enter Education">
                                <option>Select Education</option>
                                <option <?= isset($profile->partner_education) == 'Metrics' ? 'selected' : '' ?>>Metrics</option>
                                <option <?= isset($profile->partner_education) == 'Graduate' ? 'selected' : '' ?>>Graduate</option>
                                <option <?= isset($profile->partner_education) == 'Post-Graduate' ? 'selected' : '' ?>>Post-Graduate</option>
                                <option <?= isset($profile->partner_education) == 'Masters' ? 'selected' : '' ?>>Masters</option>
                                <option <?= isset($profile->partner_education) == 'PhD' ? 'selected' : '' ?>>PhD</option>
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
                                value="<?= $profile->partner_profession ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_annual_income" class="col-sm-4 col-form-label">Annual Income</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="partner_annual_income"
                                name="partner_annual_income" placeholder="Enter Partner Annual Income"
                                value="<?= $profile->partner_annual_income ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_food_pref" class="col-sm-4 col-form-label">Food Preference</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_food_pref" name="partner_food_pref">
                                <option>Select Food Preference</option>
                                <option <?= isset($profile->partner_food_pref) == 'Veg' ? 'selected' : '' ?>>Veg</option>
                                <option <?= isset($profile->partner_food_pref) == 'Non-Veg' ? 'selected' : '' ?>>Non-Veg</option>
                                <option <?= isset($profile->partner_food_pref) == 'Vegan' ? 'selected' : '' ?>>Vegan</option>
                                <option <?= isset($profile->partner_food_pref) == 'Pescatarian' ? 'selected' : '' ?>>Pescatarian</option>
                                <option <?= isset($profile->partner_food_pref) == 'Jain' ? 'selected' : '' ?>>Jain</option>
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
                                value="<?= $profile->partner_lifestyle_habits ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_degree_of_openness" class="col-sm-4 col-form-label">Degree of
                            Openness</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_degree_of_openness"
                                name="partner_degree_of_openness">
                                <option>Select Degree of Openness</option>
                                <option <?= isset($profile->partner_degree_of_openness) == 'Out to family' ? 'selected' : '' ?>>Out to family</option>
                                <option <?= isset($profile->partner_degree_of_openness) == 'Out to close friends' ? 'selected' : '' ?>>Out to close friends</option>
                                <option <?= isset($profile->partner_degree_of_openness) == 'Out at work' ? 'selected' : '' ?>>Out at work</option>
                                <option <?= isset($profile->partner_degree_of_openness) == 'Out to the whole world' ? 'selected' : '' ?>>Out to the whole world</option>
                                <option <?= isset($profile->partner_degree_of_openness) == 'Closeted' ? 'selected' : '' ?>>Closeted</option>
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
                                value="<?= $profile->partner_hobbies ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_religion" class="col-sm-4 col-form-label">Religion</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_religion" name="partner_religion">
                                <option>Select Religion</option>
                                <option <?= isset($profile->partner_religion) == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option <?= isset($profile->partner_religion) == 'Muslim' ? 'selected' : '' ?>>Muslim</option>
                                <option <?= isset($profile->partner_religion) == 'Christian' ? 'selected' : '' ?>>Christian</option>
                                <option <?= isset($profile->partner_religion) == 'Agnostic' ? 'selected' : '' ?>>Agnostic</option>
                                <option <?= isset($profile->partner_religion) == 'Buddhist' ? 'selected' : '' ?>>Buddhist</option>
                                <option <?= isset($profile->partner_religion) == 'Atheist' ? 'selected' : '' ?>>Atheist</option>
                                <option <?= isset($profile->partner_religion) == 'Jewish' ? 'selected' : '' ?>>Jewish</option>
                                <option <?= isset($profile->partner_religion) == 'Jain' ? 'selected' : '' ?>>Jain</option>
                                <option <?= isset($profile->partner_religion) == 'Sikh' ? 'selected' : '' ?>>Sikh</option>
                                <option <?= isset($profile->partner_religion) == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_ideology" class="col-sm-4 col-form-label">Ideology</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="partner_ideology" name="partner_ideology"
                                value="<?= $profile->partner_ideology ?? '' ?>">
                                <option>Select Ideology</option>
                                <option <?= isset($profile->partner_ideology) == 'Right-wing' ? 'selected' : '' ?>>Right-wing</option>
                                <option <?= isset($profile->partner_ideology) == 'Left-wing' ? 'selected' : '' ?>>Left-wing</option>
                                <option <?= isset($profile->partner_ideology) == 'Moderate' ? 'selected' : '' ?>>Moderate</option>
                                <option <?= isset($profile->partner_ideology) == 'Apolitical' ? 'selected' : '' ?>>Apolitical</option>
                                <option <?= isset($profile->partner_ideology) == 'Liberal' ? 'selected' : '' ?>>Liberal</option>
                                <option <?= isset($profile->partner_ideology) == 'Doesnt matter' ? 'selected' : '' ?>>Doesn't matter</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_family_info" class="col-sm-4 col-form-label">Family Information</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="partner_family_info"
                                name="partner_family_info" placeholder="Enter Family Information"><?= $profile->partner_family_info ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="form-group row">
                        <label for="partner_describe_d" class="col-sm-4 col-form-label">Describe Your Partner</label>
                        <div class="col-sm-8">
                            <textarea class="form-control form-control-sm" id="partner_describe_d"
                                name="partner_describe_d" placeholder="Describe Your Partner"><?= $profile->partner_describe_d ?? '' ?></textarea>
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
                                name="partner_us_to_consider" placeholder="Share additional thoughts"><?= $profile->partner_us_to_consider ?? '' ?></textarea>
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
<?php echo $this->section('script') ?>
    <script>
        $(document).ready(function () {
            $('#dob').on('change', function () {
                var dob = new Date($(this).val());
                var today = new Date();
                var age = today.getFullYear() - dob.getFullYear();
                var monthDiff = today.getMonth() - dob.getMonth();
                var dayDiff = today.getDate() - dob.getDate();
                
                if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                    age--;
                }
                $('#age').val(age > 0 ? age : '');
            });
        });
    </script>
    <?php echo view('common_script/statecityscript', ['state'=>'state','city'=>'city']); ?>
    <?php echo view('common_script/statecityscript', ['state'=>'partner_state','city'=>'partner_city']); ?>
    <?php echo view('common_script/imageorfileupload', ['imageids'=>'photo12','input'=>'photo123','filetype'=>'image']); ?>
    <?php echo view('common_script/imageorfileupload', ['imageids'=>'photo22','input'=>'photo223','filetype'=>'image']); ?>
    <?php echo view('common_script/imageorfileupload', ['imageids'=>'address_proof1','input'=>'address_proof13','filetype'=>'image']); ?>
    <?php echo view('common_script/imageorfileupload', ['imageids'=>'pan_card1','input'=>'pan_card13','filetype'=>'image']); ?>
    <?php echo view('common_script/formsubmit', ['formid' => $formid, 'submitbtn' => 'savebtn', 'formurl' => $formroute]); ?>
<?php echo $this->endSection() ?>