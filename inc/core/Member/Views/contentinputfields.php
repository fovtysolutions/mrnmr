<div class="row">
    <div class="col-12">
        <h4 class="mb-4">Member Details</h4>
    </div>

    <!-- MrnMr ID (Auto-generated) -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mrnmr_id" class="col-sm-4 col-form-label">MrnMr ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="mrnmr_id" name="mrnmr_id"
                    placeholder="Generated MrnMr ID" readonly value="<?= $detailsdata->mrnmr_id ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- First Name -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"
                    placeholder="Enter First Name" maxlength="20" value="<?= $detailsdata->first_name ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- Last Name -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name"
                    placeholder="Enter Last Name" maxlength="20" value="<?= $detailsdata->last_name ?? '' ?>">
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
                    $('#mrnmr_idperfect').val(mrnmrID);
                } else {
                    $('#mrnmr_id').val('');
                    $('#mrnmr_idperfect').val('');
                }
            }
            $('#first_name, #last_name').on('input', generateMRnMRID);
        });
    </script>

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

    <!-- Age (Auto-calculated) -->
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
                <div class="input-group input-group-sm">
                    <input type="number" class="form-control" id="height_feet" name="height_feet" placeholder="Feet"
                        min="0" value="<?= $detailsdata->height_feet ?? '' ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">ft</span>
                    </div>
                    <input type="number" class="form-control" id="height_inches" name="height_inches"
                        placeholder="Inches" min="0" max="11" value="<?= $detailsdata->height_inches ?? '' ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">in</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Weight -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="weight" class="col-sm-4 col-form-label">Weight</label>
            <div class="col-sm-8">
                <div class="input-group input-group-sm">
                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Weight (kg)"
                        min="0" value="<?= $detailsdata->weight ?? '' ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Location: Country -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="country" class="col-sm-4 col-form-label">Country</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="country" name="country">
                    <option>Select country</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Location: State -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="state" class="col-sm-4 col-form-label">State</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="state" name="state">
                    <option>Select state</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Location: City/District -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="city" class="col-sm-4 col-form-label">City/district</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="city" name="city">
                    <option>Select City</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Complete Address -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="address" class="col-sm-4 col-form-label">Complete Address</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="address" name="address"
                    placeholder="Enter Address" maxlength="100"><?= $detailsdata->address ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- Email -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control form-control-sm" id="email" name="email"
                    placeholder="Enter Email" maxlength="20" value="<?= $detailsdata->email ?? '' ?>">
            </div>
        </div>
    </div>

    <!-- WhatsApp Number -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="whatsapp_number" class="col-sm-4 col-form-label">WhatsApp Number</label>
            <div class="col-sm-8">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <select class="form-control" name="whatsapp_country_code" id="whatsapp_country_code"
                            style="min-width: 75px;">
                            <option value="+91" <?= ($detailsdata->whatsapp_country_code ?? '') == '+91' ? 'selected' : '' ?>>+91</option>
                            <option value="+1" <?= ($detailsdata->whatsapp_country_code ?? '') == '+1' ? 'selected' : '' ?>>+1</option>
                            <option value="+44" <?= ($detailsdata->whatsapp_country_code ?? '') == '+44' ? 'selected' : '' ?>>+44</option>
                            <!-- Add more codes as needed -->
                        </select>
                    </div>
                    <input type="tel" class="form-control" id="whatsapp_number" name="whatsapp_number"
                        placeholder="Enter Number" pattern="[0-9]{10}" maxlength="10"
                        value="<?= $detailsdata->whatsapp_number ?? '' ?>">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Number -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label">Mobile Number</label>
            <div class="col-sm-8">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <select class="form-control" name="phone_country_code" id="phone_country_code"
                            style="min-width: 75px;">
                            <option value="+91" <?= ($detailsdata->phone_country_code ?? '') == '+91' ? 'selected' : '' ?>>
                                +91</option>
                            <option value="+1" <?= ($detailsdata->phone_country_code ?? '') == '+1' ? 'selected' : '' ?>>+1
                            </option>
                            <option value="+44" <?= ($detailsdata->phone_country_code ?? '') == '+44' ? 'selected' : '' ?>>
                                +44</option>
                            <!-- Add more codes as needed -->
                        </select>
                    </div>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Number"
                        pattern="[0-9]{10}" maxlength="10" value="<?= $detailsdata->phone ?? '' ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- Highest Completed Education -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="education" class="col-sm-4 col-form-label">Highest Education</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="education" name="education">
                    <option value="">Select Education</option>
                    <option <?= isset($detailsdata->education) && $detailsdata->education == 'Metrics/Secondary School' ? 'selected' : '' ?>>Metrics/Secondary School</option>
                    <option <?= isset($detailsdata->education) && $detailsdata->education == 'Graduate' ? 'selected' : '' ?>>Graduate</option>
                    <option <?= isset($detailsdata->education) && $detailsdata->education == 'Master\'s' ? 'selected' : '' ?>>Master's</option>
                    <option <?= isset($detailsdata->education) && $detailsdata->education == 'PhD' ? 'selected' : '' ?>>PhD
                    </option>
                </select>
            </div>
        </div>
    </div>

    <!-- List of Schools and Colleges -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="schools_colleges" class="col-sm-4 col-form-label">Schools/Colleges</label>
            <div class="col-sm-8">
                <div id="">
                    <input type="text" class="form-control form-control-sm mb-2" id="schools_colleges"
                        name="schools_colleges" placeholder="Enter School/College"
                        value="<?= $detailsdata->schools_colleges[0] ?? '' ?>">
                </div>
            </div>
        </div>
        <?php
        $addDeleteEditData = [
            'mainArray' => json_encode(isset($perfectdatas->schools_colleges) ? json_decode($perfectdatas->schools_colleges) : []),
            'MainColumn' => 'schools_colleges'
        ];
        echo view('common_script/singleSelectOption', $addDeleteEditData);
        ?>
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

    <!-- Organisations -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="organisations" class="col-sm-4 col-form-label">Organisations</label>
            <div class="col-sm-8">
                <div id="organisations_container">
                    <input type="text" class="form-control form-control-sm mb-2" id="organisations"
                        name="organisations" placeholder="Enter Organisation"
                        value="<?= $detailsdata->organisations[0] ?? '' ?>">
                </div>
            </div>
        </div>
        <?php
        $addDeleteEditData = [
            'mainArray' => json_encode(isset($perfectdatas->organisations) ? json_decode($perfectdatas->organisations) : []),
            'MainColumn' => 'organisations'
        ];
        echo view('common_script/singleSelectOption', $addDeleteEditData);
        ?>
    </div>


    <!-- Annual Income -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="annual_income" class="col-sm-4 col-form-label">Annual Income (INR)</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="annual_income" name="annual_income">
                    <option value="">Select Income</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == 'below25K' ? 'selected' : '' ?>>below 25K</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == '25K-50K' ? 'selected' : '' ?>>25K - 50K</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == '50K-100K' ? 'selected' : '' ?>>50K - 100K</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == '100K-200K' ? 'selected' : '' ?>>100K - 200K</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == '200K-400K' ? 'selected' : '' ?>>200K - 400K</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == '400K-800K' ? 'selected' : '' ?>>400K - 800K</option>
                    <option <?= isset($detailsdata->annual_income) && $detailsdata->annual_income == 'above800K' ? 'selected' : '' ?>>above 800K</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Languages Spoken -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="languages_spoken" class="col-sm-4 col-form-label">Languages Spoken</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="languages_spoken" name="languages_spoken">
                    <option value="">Select Languages</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Food Preference -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="food_pref" class="col-sm-4 col-form-label">Food Preference</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="food_pref" name="food_pref">
                    <option value="">Select Food Preference</option>
                    <option <?= isset($detailsdata->food_pref) && $detailsdata->food_pref == 'Veg' ? 'selected' : '' ?>>Veg
                    </option>
                    <option <?= isset($detailsdata->food_pref) && $detailsdata->food_pref == 'Non-Veg' ? 'selected' : '' ?>>Non-Veg</option>
                    <option <?= isset($detailsdata->food_pref) && $detailsdata->food_pref == 'Vegan' ? 'selected' : '' ?>>
                        Vegan</option>
                    <option <?= isset($detailsdata->food_pref) && $detailsdata->food_pref == 'Pescatarian' ? 'selected' : '' ?>>Pescatarian</option>
                    <option <?= isset($detailsdata->food_pref) && $detailsdata->food_pref == 'Jain' ? 'selected' : '' ?>>
                        Jain</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Smoker -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="smoker" class="col-sm-4 col-form-label">Smoker?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="smoker" name="smoker">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->smoker) && $detailsdata->smoker == 'Sometimes' ? 'selected' : '' ?>>
                        Sometimes</option>
                    <option <?= isset($detailsdata->smoker) && $detailsdata->smoker == 'No' ? 'selected' : '' ?>>No
                    </option>
                    <option <?= isset($detailsdata->smoker) && $detailsdata->smoker == 'Yes' ? 'selected' : '' ?>>Yes
                    </option>
                    <option <?= isset($detailsdata->smoker) && $detailsdata->smoker == 'Trying to quit' ? 'selected' : '' ?>>Trying to quit</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Drinker -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="drinker" class="col-sm-4 col-form-label">Drinker?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm mb-2 form-select" id="drinker" name="drinker">
                    <option>Select</option>
                    <option <?= isset($detailsdata->drinker) && $detailsdata->drinker == 'Yes' ? 'selected' : '' ?>
                        value="Yes">Yes</option>
                    <option <?= isset($detailsdata->drinker) && $detailsdata->drinker == 'Sometimes' ? 'selected' : '' ?>
                        value="Sometimes">Sometimes</option>
                    <option <?= isset($detailsdata->drinker) && $detailsdata->drinker == 'Socially' ? 'selected' : '' ?>
                        value="Socially">Socially</option>
                    <option <?= isset($detailsdata->drinker) && $detailsdata->drinker == 'No' ? 'selected' : '' ?>
                        value="No">No</option>
                    <option <?= isset($detailsdata->drinker) && $detailsdata->drinker == 'Sober' ? 'selected' : '' ?>
                        value="Sober">Sober</option>
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
                    placeholder="Enter Hobbies"><?= $detailsdata->hobbies ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- Religion -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="religion" class="col-sm-4 col-form-label">Religion</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="religion" name="religion">
                    <option value="">Select Religion</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Hindu' ? 'selected' : '' ?>>
                        Hindu</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Muslim' ? 'selected' : '' ?>>
                        Muslim</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Christian' ? 'selected' : '' ?>>Christian</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Atheist' ? 'selected' : '' ?>>
                        Atheist</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Jain' ? 'selected' : '' ?>>Jain
                    </option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Buddhist' ? 'selected' : '' ?>>
                        Buddhist</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Judaism' ? 'selected' : '' ?>>
                        Judaism</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Agnostic' ? 'selected' : '' ?>>
                        Agnostic</option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Sikh' ? 'selected' : '' ?>>Sikh
                    </option>
                    <option <?= isset($detailsdata->religion) && $detailsdata->religion == 'Other' ? 'selected' : '' ?>>
                        Other</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Political Ideology -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="political_ideology" class="col-sm-4 col-form-label">Political Ideology</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="political_ideology"
                    name="political_ideology">
                    <option value="">Select Political Ideology</option>
                    <option <?= isset($detailsdata->political_ideology) && $detailsdata->political_ideology == 'Right-wing' ? 'selected' : '' ?>>Right-wing</option>
                    <option <?= isset($detailsdata->political_ideology) && $detailsdata->political_ideology == 'Left-wing' ? 'selected' : '' ?>>Left-wing</option>
                    <option <?= isset($detailsdata->political_ideology) && $detailsdata->political_ideology == 'Moderate' ? 'selected' : '' ?>>Moderate</option>
                    <option <?= isset($detailsdata->political_ideology) && $detailsdata->political_ideology == 'Apolitical' ? 'selected' : '' ?>>Apolitical</option>
                    <option <?= isset($detailsdata->political_ideology) && $detailsdata->political_ideology == 'Liberal' ? 'selected' : '' ?>>Liberal</option>
                    <option <?= isset($detailsdata->political_ideology) && $detailsdata->political_ideology == 'Skip' ? 'selected' : '' ?>>Skip</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Out to Parents -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="out_to_parents" class="col-sm-4 col-form-label">Out to Parents</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="out_to_parents" name="out_to_parents">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->out_to_parents) && $detailsdata->out_to_parents == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->out_to_parents) && $detailsdata->out_to_parents == 'No' ? 'selected' : '' ?>>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Degree of Openness -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="degree_of_openness" class="col-sm-4 col-form-label">Degree of Openness</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="degree_of_openness"
                    name="degree_of_openness">
                    <option value="">Select Degree of Openness</option>
                    <option <?= isset($detailsdata->degree_of_openness) && $detailsdata->degree_of_openness == 'Closeted' ? 'selected' : '' ?>>Closeted</option>
                    <option <?= isset($detailsdata->degree_of_openness) && $detailsdata->degree_of_openness == 'Selectively out' ? 'selected' : '' ?>>Selectively out</option>
                    <option <?= isset($detailsdata->degree_of_openness) && $detailsdata->degree_of_openness == 'Out to whole world' ? 'selected' : '' ?>>Out to whole world</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Type of Relationship -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="relationship_type" class="col-sm-4 col-form-label">Type of Relationship</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select mb-2" id="relationship_type"
                    name="relationship_type">
                    <option>Select Type of Relationship</option>
                    <option <?= isset($detailsdata->relationship_type) && $detailsdata->relationship_type == 'Monogamous' ? 'selected' : '' ?>>Monogamous</option>
                    <option <?= isset($detailsdata->relationship_type) && $detailsdata->relationship_type == 'Open' ? 'selected' : '' ?>>Open</option>
                    <option <?= isset($detailsdata->relationship_type) && $detailsdata->relationship_type == 'Polygamous' ? 'selected' : '' ?>>Polygamous</option>
                    <option <?= isset($detailsdata->relationship_type) && $detailsdata->relationship_type == 'Polyamorous' ? 'selected' : '' ?>>Polyamorous</option>
                </select>
            </div>
        </div>
    </div>


    <!-- Want to Get Married -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="want_to_get_married" class="col-sm-4 col-form-label">Want to Get Married</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="want_to_get_married"
                    name="want_to_get_married">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->want_to_get_married) && $detailsdata->want_to_get_married == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->want_to_get_married) && $detailsdata->want_to_get_married == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($detailsdata->want_to_get_married) && $detailsdata->want_to_get_married == 'Open to discuss' ? 'selected' : '' ?>>Open to discuss</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Want to Have Children -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="want_to_have_children" class="col-sm-4 col-form-label">Want to Have Children</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="want_to_have_children"
                    name="want_to_have_children">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->want_to_have_children) && $detailsdata->want_to_have_children == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->want_to_have_children) && $detailsdata->want_to_have_children == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($detailsdata->want_to_have_children) && $detailsdata->want_to_have_children == 'Open to discuss' ? 'selected' : '' ?>>Open to discuss</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Pet Friendly -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="pet_friendly" class="col-sm-4 col-form-label">Pet Friendly</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="pet_friendly" name="pet_friendly">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->pet_friendly) && $detailsdata->pet_friendly == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->pet_friendly) && $detailsdata->pet_friendly == 'No' ? 'selected' : '' ?>>No</option>
                    <option <?= isset($detailsdata->pet_friendly) && $detailsdata->pet_friendly == 'Open to discuss' ? 'selected' : '' ?>>Open to discuss</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Long Distance Relationship -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="long_distance_relationship" class="col-sm-4 col-form-label">Are you ok with long distance
                relationship ?</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="long_distance_relationship"
                    name="long_distance_relationship">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->long_distance_relationship) && $detailsdata->long_distance_relationship == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->long_distance_relationship) && $detailsdata->long_distance_relationship == 'No' ? 'selected' : '' ?>>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Open to Relocation -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="open_to_relocation" class="col-sm-4 col-form-label">Are you open to relocation </label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="open_to_relocation"
                    name="open_to_relocation">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->open_to_relocation) && $detailsdata->open_to_relocation == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option <?= isset($detailsdata->open_to_relocation) && $detailsdata->open_to_relocation == 'No' ? 'selected' : '' ?>>No</option>
                </select>
            </div>
        </div>
    </div>

    <!-- My Sexual Position -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="sexual_position" class="col-sm-4 col-form-label">My Sexual Position</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="sexual_position" name="sexual_position">
                    <option value="">Select Sexual Position</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Top' ? 'selected' : '' ?>>Top</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Vers Top' ? 'selected' : '' ?>>Vers Top</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Versatile' ? 'selected' : '' ?>>Versatile</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Vers Bottom' ? 'selected' : '' ?>>Vers Bottom</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Bottom' ? 'selected' : '' ?>>Bottom</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Side' ? 'selected' : '' ?>>Side</option>
                    <option <?= isset($detailsdata->sexual_position) && $detailsdata->sexual_position == 'Asexual' ? 'selected' : '' ?>>Asexual</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Anal Sex Mandatory -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="anal_sex_mandatory" class="col-sm-4 col-form-label">Anal Sex Mandatory</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="anal_sex_mandatory"
                    name="anal_sex_mandatory">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->anal_sex_mandatory) && $detailsdata->anal_sex_mandatory == 'Mandatory' ? 'selected' : '' ?>>Mandatory</option>
                    <option <?= isset($detailsdata->anal_sex_mandatory) && $detailsdata->anal_sex_mandatory == 'Not Mandatory' ? 'selected' : '' ?>>Not Mandatory</option>
                    <option <?= isset($detailsdata->anal_sex_mandatory) && $detailsdata->anal_sex_mandatory == 'Open to discuss' ? 'selected' : '' ?>>Open to discuss</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Physical Health Issues -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="physical_health_issues" class="col-sm-4 col-form-label">Do you have any physical health issues
                that you are aware of? </label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="physical_health_issues" name="physical_health_issues"
                    placeholder="Enter Physical Health Issues"
                    maxlength="30"><?= $detailsdata->physical_health_issues ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- Mental Health Issues -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="mental_health_issues" class="col-sm-4 col-form-label">Do you have any mental health issues that
                you are aware of? </label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="mental_health_issues" name="mental_health_issues"
                    placeholder="Enter Mental Health Issues"
                    maxlength="30"><?= $detailsdata->mental_health_issues ?? '' ?></textarea>
            </div>
        </div>
    </div>

    <!-- HIV Status -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="hiv_status" class="col-sm-4 col-form-label">HIV Status</label>
            <div class="col-sm-8">
                <select class="form-control form-control-sm form-select" id="hiv_status" name="hiv_status">
                    <option value="">Select</option>
                    <option <?= isset($detailsdata->hiv_status) && $detailsdata->hiv_status == 'Negative' ? 'selected' : '' ?>>Negative</option>
                    <option <?= isset($detailsdata->hiv_status) && $detailsdata->hiv_status == 'Acute/very recent infection' ? 'selected' : '' ?>>Acute/very recent infection</option>
                    <option <?= isset($detailsdata->hiv_status) && $detailsdata->hiv_status == 'Chronic HIV' ? 'selected' : '' ?>>Chronic HIV</option>
                    <option <?= isset($detailsdata->hiv_status) && $detailsdata->hiv_status == 'AIDS' ? 'selected' : '' ?>>
                        AIDS</option>
                    <option <?= isset($detailsdata->hiv_status) && $detailsdata->hiv_status == 'Undetectable' ? 'selected' : '' ?>>Undetectable</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Traditionally Masculine/Feminine Scale -->
    <div class="col-md-6 col-xl-4">
        <div class="form-group row">
            <label for="masculine_feminine" class="col-sm-4 col-form-label">How will your best friend describe you on
                the below scale</label>
            <div class="col-sm-8">
                <input type="range" class="form-control-range form-range" id="masculine_feminine"
                    name="masculine_feminine" min="0" max="10" value="<?= $detailsdata->masculine_feminine ?? 5 ?>">
                <div class="d-flex justify-content-between">
                    <span>Traditionally Masculine (0)</span>
                    <span>Traditionally Feminine (10)</span>
                </div>
            </div>
        </div>
    </div>

</div>