<div class="row">
    <div class="col-12">
        <h4 class="mb-4">Member Details</h4>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"
                    placeholder="Enter First Name" value="<?= $detailsdata->first_name ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Last Name -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name"
                    placeholder="Enter Last Name" value="<?= $detailsdata->last_name ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- MRnMR ID (Auto-filled) -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_id" class="col-sm-4 col-form-label">MRnMR ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="mrnmr_id" name="mrnmr_id"
                    placeholder="Generated MRnMR ID" readonly value="<?= $detailsdata->mrnmr_id ?? '' ?>">
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function generateMRnMRID() {
                var firstName = $('#first_name').val().trim();
                var lastName = $('#last_name').val().trim();

                if (firstName.length >= 2 && lastName.length >= 2) {
                    var firstPart = firstName.substring(0, 2).toUpperCase();
                    var lastPart = lastName.substring(0, 2).toUpperCase();
                    var randomNum = Math.floor(100 + Math.random() * 900);

                    var mrnmrID = firstPart + lastPart + randomNum;
                    $('#mrnmr_id').val(mrnmrID);
                } else {
                    $('#mrnmr_id').val('');
                }
            }
            $('#first_name, #last_name').on('input', generateMRnMRID);
        });
    </script>
    <!-- Date of Registration -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="registration_date" class="col-sm-4 col-form-label">Date of Registration</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="registration_date" name="registration_date" value="<?= $detailsdata->registration_date ?? '' ?>">
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
                    <option <?= isset($detailsdata->membership_status) == 'Internal' ? 'selected' : '' ?>>Internal</option>
                    <option <?= isset($detailsdata->membership_status) == 'Paid' ? 'selected' : '' ?>>Paid</option>
                    <option <?= isset($detailsdata->membership_status) == 'Payment Pending' ? 'selected' : '' ?>>Payment
                        Pending</option>
                    <option <?= isset($detailsdata->membership_status) == 'Membership Expired' ? 'selected' : '' ?>>
                        Membership Expired</option>
                    <option <?= isset($detailsdata->membership_status) == 'Banned' ? 'selected' : '' ?>>Banned</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Personal Interview Date -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="personal_interview_date" class="col-sm-4 col-form-label">Personal Interview Date</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="personal_interview_date"
                    name="personal_interview_date" value="<?= $detailsdata->personal_interview_date ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Days to Registration End -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="days_to_reg_end" class="col-sm-4 col-form-label">Days to Reg End</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="days_to_reg_end" name="days_to_reg_end"
                    placeholder="Enter Days" value="<?= $detailsdata->days_to_reg_end ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Date of Birth -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="dob" class="col-sm-4 col-form-label">Date of Birth</label>
            <div class="col-sm-8">
                <input type="date" class="form-control form-control-sm" id="dob" name="dob" value="<?= $detailsdata->dob ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Age (Auto-filled) -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="age" class="col-sm-4 col-form-label">Age</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="age" name="age"
                    placeholder="Auto-calculated Age" readonly value="<?= $detailsdata->age ?? '' ?>">
            </div>
        </div>
    </div>

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


    <!-- Height -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="height" class="col-sm-4 col-form-label">Height</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="height" name="height"
                    placeholder="Enter Height (cm)" value="<?= $detailsdata->height ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Weight -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight" class="col-sm-4 col-form-label">Weight</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="weight" name="weight"
                    placeholder="Enter Weight (kg)" value="<?= $detailsdata->weight ?? '' ?>">
            </div>
        </div>
    </div>

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

    <!-- Education -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="education" class="col-sm-4 col-form-label">Education</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="education" name="education">
                    <option >Select Education</option>
                    <option <?= isset($detailsdata->education) == 'Metrics' ? 'selected' : '' ?>>Metrics</option>
                    <option <?= isset($detailsdata->education) == 'Graduate' ? 'selected' : '' ?>>Graduate</option>
                    <option <?= isset($detailsdata->education) == 'Post-Graduate' ? 'selected' : '' ?>>Post-Graduate</option>
                    <option <?= isset($detailsdata->education) == 'Masters' ? 'selected' : '' ?>>Masters</option>
                    <option <?= isset($detailsdata->education) == 'PhD' ? 'selected' : '' ?>>PhD</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Profession -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="profession" class="col-sm-4 col-form-label">Profession</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="profession" name="profession"
                    placeholder="Enter Profession" value="<?= $detailsdata->profession ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Annual Income -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="annual_income" class="col-sm-4 col-form-label">Annual Income (INR)</label>
            <div class="col-sm-8">
                <input type="number" class="form-control form-control-sm" id="annual_income" name="annual_income"
                    placeholder="Enter Annual Income" value="<?= $detailsdata->annual_income ?? '' ?>">
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
                    <option <?= isset($detailsdata->food_pref) == 'Veg' ? 'selected' : '' ?>>Veg</option>
                    <option <?= isset($detailsdata->food_pref) == 'Non-Veg' ? 'selected' : '' ?>>Non-Veg</option>
                    <option <?= isset($detailsdata->food_pref) == 'Vegan' ? 'selected' : '' ?>>Vegan</option>
                    <option <?= isset($detailsdata->food_pref) == 'Pescatarian' ? 'selected' : '' ?>>Pescatarian</option>
                    <option <?= isset($detailsdata->food_pref) == 'Jain' ? 'selected' : '' ?>>Jain</option>
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
                    <option <?= isset($detailsdata->smoker) == 'Sometimes' ? 'selected' : '' ?>>Sometimes</option>
                    <option <?= isset($detailsdata->smoker) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($detailsdata->smoker) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->smoker) == 'Trying to quit' ? 'selected' : '' ?>>Trying to quit</option>
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
                <textarea class="form-control form-control-sm" id="hobbies" name="hobbies"
                    placeholder="Enter Hobbies"></textarea>
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
                <textarea class="form-control form-control-sm" id="family_info" name="family_info"
                    placeholder="Enter Family Info"></textarea>
            </div>
        </div>
    </div>

    <!-- Describe -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="Describe" class="col-sm-4 col-form-label">Describe</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="Describe" name="Describe"
                    placeholder="Enter Description"></textarea>
            </div>
        </div>
    </div>

    <!-- Past Relationship -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="past_relationship" class="col-sm-4 col-form-label">Past Relationship</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="past_relationship" name="past_relationship"
                    placeholder="Enter Past Relationship Details"></textarea>
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
                <input type="email" class="form-control form-control-sm" id="email" name="email"
                    placeholder="Enter Email">
            </div>
        </div>
    </div>

    <!-- Phone -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8">
                <input type="tel" class="form-control form-control-sm" id="phone" name="phone"
                    placeholder="Enter Phone Number">
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
                <input type="text" class="form-control form-control-sm" id="idea_of_romance" name="idea_of_romance"
                    maxlength="35" placeholder="Enter The Idea of Romance">
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
<hr class="hr-m">
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
                    placeholder="Enter MRnMR ID">
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
                            min="18" max="99" placeholder="Min Age">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="ageRangeMax" name="ageRangeMax"
                            min="18" max="99" placeholder="Max Age">
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
                            name="heightRangeMin" min="18" max="99" placeholder="Min Height">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="heightRangeMax"
                            name="heightRangeMax" min="18" max="99" placeholder="Max Height">
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
                            name="weightRangeMin" min="18" max="99" placeholder="Min Weight">
                    </div>
                    <div class="col-6">
                        <input class="form-control form-control-sm" type="number" id="weightRangeMax"
                            name="weightRangeMax" min="18" max="99" placeholder="Max Weight">
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