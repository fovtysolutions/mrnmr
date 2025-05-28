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
                <input type="date" class="form-control form-control-sm" id="registration_date" name="registration_date"
                    value="<?= $detailsdata->registration_date ?? '' ?>">
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
                <input type="date" class="form-control form-control-sm" id="dob" name="dob"
                    value="<?= $detailsdata->dob ?? '' ?>">
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
                    <option>Select Education</option>
                    <option <?= isset($detailsdata->education) == 'Metrics' ? 'selected' : '' ?>>Metrics</option>
                    <option <?= isset($detailsdata->education) == 'Graduate' ? 'selected' : '' ?>>Graduate</option>
                    <option <?= isset($detailsdata->education) == 'Post-Graduate' ? 'selected' : '' ?>>Post-Graduate
                    </option>
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
                    <option <?= isset($detailsdata->smoker) == 'Trying to quit' ? 'selected' : '' ?>>Trying to quit
                    </option>
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
                    <option <?= isset($detailsdata->drinker) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->drinker) == 'Sometimes' ? 'selected' : '' ?>>Sometimes</option>
                    <option <?= isset($detailsdata->drinker) == 'Socially' ? 'selected' : '' ?>>Socially</option>
                    <option <?= isset($detailsdata->drinker) == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($detailsdata->drinker) == 'Sober' ? 'selected' : '' ?>>Sober</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Hobbies -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hobbies" class="col-sm-4 col-form-label">Hobbies</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="hobbies" name="hobbies" placeholder="Enter Hobbies"><?= $detailsdata->hobbies ?? '' ?></textarea>
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
                    <option <?= isset($detailsdata->religion) == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                    <option <?= isset($detailsdata->religion) == 'Muslim' ? 'selected' : '' ?>>Muslim</option>
                    <option <?= isset($detailsdata->religion) == 'Christian' ? 'selected' : '' ?>>Christian</option>
                    <option <?= isset($detailsdata->religion) == 'Agnostic' ? 'selected' : '' ?>>Agnostic</option>
                    <option <?= isset($detailsdata->religion) == 'Buddhist' ? 'selected' : '' ?>>Buddhist</option>
                    <option <?= isset($detailsdata->religion) == 'Atheist' ? 'selected' : '' ?>>Atheist</option>
                    <option <?= isset($detailsdata->religion) == 'Jewish' ? 'selected' : '' ?>>Jewish</option>
                    <option <?= isset($detailsdata->religion) == 'Jain' ? 'selected' : '' ?>>Jain</option>
                    <option <?= isset($detailsdata->religion) == 'Sikh' ? 'selected' : '' ?>>Sikh</option>
                    <option <?= isset($detailsdata->religion) == 'Other' ? 'selected' : '' ?>>Other</option>
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
                    <option <?= isset($detailsdata->political_ideology) == 'Right-wing' ? 'selected' : '' ?>>Right-wing
                    </option>
                    <option <?= isset($detailsdata->political_ideology) == 'Left-wing' ? 'selected' : '' ?>>Left-wing
                    </option>
                    <option <?= isset($detailsdata->political_ideology) == 'Moderate' ? 'selected' : '' ?>>Moderate
                    </option>
                    <option <?= isset($detailsdata->political_ideology) == 'Apolitical' ? 'selected' : '' ?>>Apolitical
                    </option>
                    <option <?= isset($detailsdata->political_ideology) == 'Liberal' ? 'selected' : '' ?>>Liberal</option>
                    <option <?= isset($detailsdata->political_ideology) == 'Skip' ? 'selected' : '' ?>>Skip</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Family Info -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="family_info" class="col-sm-4 col-form-label">Family Info</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="family_info" name="family_info" placeholder="Enter Family Info" ><?= $detailsdata->family_info ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- Describe -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="Describe" class="col-sm-4 col-form-label">Describe</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="describe_d" name="describe_d" placeholder="Enter Description" ><?= $detailsdata->describe_d ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- Past Relationship -->

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="past_relationship" class="col-sm-4 col-form-label">Past Relationship</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="past_relationship" name="past_relationship"
                    placeholder="Enter Past Relationship Details"><?= $detailsdata->past_relationship ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- Photo -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="photo" class="col-sm-4 col-form-label">Photo</label>
            <div class="col-sm-8">
                <input type="file" class="form-control form-control-sm" id="photo" name="photo"
                    value="<?= $detailsdata->photo ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Email -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control form-control-sm" id="email" name="email"
                    placeholder="Enter Email" value="<?= $detailsdata->email ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Phone -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8">
                <input type="tel" class="form-control form-control-sm" id="phone" name="phone"
                    placeholder="Enter Phone Number" value="<?= $detailsdata->phone ?? '' ?>">
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
                    <option <?= isset($detailsdata->sexual_position) == 'Top' ? 'selected' : '' ?>>Top</option>
                    <option <?= isset($detailsdata->sexual_position) == 'Bottom' ? 'selected' : '' ?>>Bottom</option>
                    <option <?= isset($detailsdata->sexual_position) == 'Side' ? 'selected' : '' ?>>Side</option>
                    <option <?= isset($detailsdata->sexual_position) == 'Versatile' ? 'selected' : '' ?>>Versatile</option>
                    <option <?= isset($detailsdata->sexual_position) == 'Asexual' ? 'selected' : '' ?>>Asexual</option>
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
                    <option <?= isset($detailsdata->anal_sex_mandatory) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->anal_sex_mandatory) == 'No' ? 'selected' : '' ?>>No</option>
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
                    <option <?= isset($detailsdata->out_to_parents) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->out_to_parents) == 'No' ? 'selected' : '' ?>>No</option>
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
                    <option <?= isset($detailsdata->degree_of_openness) == 'Out to family' ? 'selected' : '' ?>>Out to
                        family</option>
                    <option <?= isset($detailsdata->degree_of_openness) == 'Out to close friends' ? 'selected' : '' ?>>Out
                        to close friends</option>
                    <option <?= isset($detailsdata->degree_of_openness) == 'Out at work' ? 'selected' : '' ?>>Out at work
                    </option>
                    <option <?= isset($detailsdata->degree_of_openness) == 'Out to the whole world' ? 'selected' : '' ?>>
                        Out to the whole world</option>
                    <option <?= isset($detailsdata->degree_of_openness) == 'Closeted' ? 'selected' : '' ?>>Closeted
                    </option>
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
                    <option <?= isset($detailsdata->relationship_type) == 'Monogamous' ? 'selected' : '' ?>>Monogamous
                    </option>
                    <option <?= isset($detailsdata->relationship_type) == 'Open' ? 'selected' : '' ?>>Open</option>
                    <option <?= isset($detailsdata->relationship_type) == 'Polygamous' ? 'selected' : '' ?>>Polygamous
                    </option>
                    <option <?= isset($detailsdata->relationship_type) == 'Polyamorous' ? 'selected' : '' ?>>Polyamorous
                    </option>
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
                    <option <?= isset($detailsdata->want_to_get_married) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->want_to_get_married) == 'No' ? 'selected' : '' ?>>No</option>
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
                    <option <?= isset($detailsdata->want_to_have_children) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->want_to_have_children) == 'No' ? 'selected' : '' ?>>No</option>
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
                    maxlength="35" placeholder="Enter The Idea of Romance"
                    value="<?= $detailsdata->idea_of_romance ?? '' ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="social_media_handles" class="col-sm-4 col-form-label">Social Media Handles</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm" id="social_media_handles" name="social_media_handles">
                    <option>Select</option>
                    <option <?= isset($detailsdata->social_media_handles) == '1' ? 'selected' : '' ?>>1</option>
                    <option <?= isset($detailsdata->social_media_handles) == '2' ? 'selected' : '' ?>>2</option>
                    <option <?= isset($detailsdata->social_media_handles) == '3' ? 'selected' : '' ?>>3</option>
                    <option <?= isset($detailsdata->social_media_handles) == '4' ? 'selected' : '' ?>>4</option>
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
                    <option <?= isset($detailsdata->pet_friendly) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->pet_friendly) == 'No' ? 'selected' : '' ?>>No</option>
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
                    <option <?= isset($detailsdata->have_children) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->have_children) == 'No' ? 'selected' : '' ?>>No</option>
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
                    <option <?= isset($detailsdata->previous_marriage) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->previous_marriage) == 'No' ? 'selected' : '' ?>>No</option>
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
                    <option <?= isset($detailsdata->hiv_status) == 'Positive' ? 'selected' : '' ?>>
                        Positive</option>
                    <option <?= isset($detailsdata->hiv_status) == 'Negative' ? 'selected' : '' ?>>
                        Negative</option>
                </select>
            </div>
        </div>
    </div>
</div>
