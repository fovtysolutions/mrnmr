<div class="row <?= $increasing == false ? 'd-none' : '' ?>">
    <!-- MmMR_ID -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_id" class="col-sm-4 col-form-label">MmMR ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="mrnmr_id" name="mrnmr_id" placeholder="Enter MRnMR ID">
            </div>
        </div>
    </div>

    <!-- Date of Registration -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="registration_date" class="col-sm-4 col-form-label">Date of Registration</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="registration_date" name="registration_date">
            </div>
        </div>
    </div>

    <!-- Name -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="Enter First Name">
            </div>
        </div>
    </div>

    <!-- Last Name-->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>
        </div>
    </div>

    <!-- Membership Status -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="membership_status" class="col-sm-4 col-form-label">Membership Status</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="membership_status" name="membership_status">
                    <option>Select Membership Status</option>
                    <option>Internal</option>
                    <option>Paid</option>
                    <option>Payment Pending</option>
                    <option>Membership Expired</option>
                    <option>Banned</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Personal Interview Date -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="personal_interview_date" class="col-sm-4 col-form-label">Personal Interview Date</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="personal_interview_date" name="personal_interview_date">
            </div>
        </div>
    </div>

    <!-- Days to Registration End -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="days_to_reg_end" class="col-sm-4 col-form-label">Days to Reg End</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="days_to_reg_end" name="days_to_reg_end" placeholder="Enter Days">
            </div>
        </div>
    </div>

    <!-- Date of Birth -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="dob" class="col-sm-4 col-form-label">Date of Birth</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="dob" name="dob">
            </div>
        </div>
    </div>

    <!-- Age -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="age" class="col-sm-4 col-form-label">Age</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="age" name="age" placeholder="Enter Age">
            </div>
        </div>
    </div>

    <!-- Height -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="height" class="col-sm-4 col-form-label">Height</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="height" name="height" placeholder="Enter Height (cm)">
            </div>
        </div>
    </div>

    <!-- Weight -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight" class="col-sm-4 col-form-label">Weight</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="weight" name="weight" placeholder="Enter Weight (kg)">
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="location" class="col-sm-4 col-form-label">Location</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="location" name="location">
                    <option>City Name 1</option>
                    <option>City Name 2</option>
                    <option>City Name 3</option>
                    <!-- Add city names as required -->
                </select>
            </div>
        </div>
    </div>

    <!-- Education -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="education" class="col-sm-4 col-form-label">Education</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="education" name="education">
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

    <!-- Profession -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="profession" class="col-sm-4 col-form-label">Profession</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="profession" name="profession" placeholder="Enter Profession">
            </div>
        </div>
    </div>

    <!-- Annual Income -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="annual_income" class="col-sm-4 col-form-label">Annual Income (INR)</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="annual_income" name="annual_income" placeholder="Enter Annual Income">
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
                </select>
            </div>
        </div>
    </div>

    <!-- Smoker -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="smoker" class="col-sm-4 col-form-label">Smoker?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="smoker" name="smoker">
                    <option>Select</option>
                    <option>Sometimes</option>
                    <option>No</option>
                    <option>Yes</option>
                    <option>Trying to quit</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Drinker -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="drinker" class="col-sm-4 col-form-label">Drinker?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="drinker" name="drinker">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>Sometimes</option>
                    <option>Socially</option>
                    <option>No</option>
                    <option>Sober</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Hobbies -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hobbies" class="col-sm-4 col-form-label">Hobbies</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="hobbies" name="hobbies" placeholder="Enter Hobbies"></textarea>
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

    <!-- Political Ideology -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="political_ideology" class="col-sm-4 col-form-label">Political Ideology</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="political_ideology" name="political_ideology">
                    <option>Select Political Ideology</option>
                    <option>Right-wing</option>
                    <option>Left-wing</option>
                    <option>Moderate</option>
                    <option>Apolitical</option>
                    <option>Liberal</option>
                    <option>Skip</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Family Info -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="family_info" class="col-sm-4 col-form-label">Family Info</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="family_info" name="family_info" placeholder="Enter Family Info"></textarea>
            </div>
        </div>
    </div>

    <!-- Describe -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="Describe" class="col-sm-4 col-form-label">Describe</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="Describe" name="Describe" placeholder="Enter Description"></textarea>
            </div>
        </div>
    </div>

    <!-- Past Relationship -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="past_relationship" class="col-sm-4 col-form-label">Past Relationship</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="past_relationship" name="past_relationship" placeholder="Enter Past Relationship Details"></textarea>
            </div>
        </div>
    </div>

    <!-- Photo -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="photo" class="col-sm-4 col-form-label">Photo</label>
            <div class="col-sm-8">
                <input type="file" class="form-control form-control-sm" id="photo" name="photo">
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
            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8">
                <input type="tel" class="form-control form-control-sm" id="phone" name="phone" placeholder="Enter Phone Number">
            </div>
        </div>
    </div>

    <!-- My Sexual Position -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="sexual_position" class="col-sm-4 col-form-label">My Sexual Position</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="sexual_position" name="sexual_position">
                    <option>Select Sexual Position</option>
                    <option>Top</option>
                    <option>Bottom</option>
                    <option>Side</option>
                    <option>Versatile</option>
                    <option>Asexual</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Anal Sex Mandatory -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="anal_sex_mandatory" class="col-sm-4 col-form-label">Anal Sex Mandatory</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="anal_sex_mandatory" name="anal_sex_mandatory">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Out to Parents -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="out_to_parents" class="col-sm-4 col-form-label">Out to Parents</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="out_to_parents" name="out_to_parents">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
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
                </select>
            </div>
        </div>
    </div>

    <!-- Type of Relationship -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="relationship_type" class="col-sm-4 col-form-label">Type of Relationship</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="relationship_type" name="relationship_type">
                    <option>Select Type of Relationship</option>
                    <option>Monogamous</option>
                    <option>Open</option>
                    <option>Polygamous</option>
                    <option>Polyamorous</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Want to Get Married -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="want_to_get_married" class="col-sm-4 col-form-label">Want to Get Married</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="want_to_get_married" name="want_to_get_married">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Want to Have Children -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="want_to_have_children" class="col-sm-4 col-form-label">Want to Have Children</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="want_to_have_children" name="want_to_have_children">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Idea of Romance -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="idea_of_romance" class="col-sm-4 col-form-label">The Idea of Romance</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="idea_of_romance" name="idea_of_romance" maxlength="35" placeholder="Enter The Idea of Romance">
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="social_media_handles" class="col-sm-4 col-form-label">Social Media Handles</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="social_media_handles" name="social_media_handles">
                    <option>Select</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="pet_friendly" class="col-sm-4 col-form-label">Pet Friendly</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="pet_friendly" name="pet_friendly">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="have_children" class="col-sm-4 col-form-label">Have Children?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="have_children" name="have_children">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="previous_marriage" class="col-sm-4 col-form-label">Previous Marriage?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="previous_marriage" name="previous_marriage">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>

  <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hiv_status" class="col-sm-4 col-form-label">HIV Status</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="hiv_status" name="hiv_status">
                    <option value="Select">Select</option>
                    <option value="Positive">Positive</option>
                    <option value="Negative">Negative</option>
                </select>
            </div>
        </div>
    </div>
</div>
