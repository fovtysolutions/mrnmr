<style>
    .perfect-sec h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 2.2em;
        font-weight: 600;
    }

    .perfectcard-info {
        margin-bottom: 25px;
        padding: 20px;
        background: #f8fafc;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .perfectcard-info:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .perfectcard-info h2 {
        color: #34495e;
        font-size: 1.5em;
        margin-bottom: 15px;
        border-bottom: 2px solid #34495e;
        padding-bottom: 5px;
    }

    .perfectcard-info .field {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eceff1;
    }

    .perfectcard-info .field:last-child {
        border-bottom: none;
    }

    .perfectcard-info .field-label {
        font-weight: 500;
        color: #2c3e50;
        width: 40%;
    }

    .perfectcard-info .field-value {
        color: #34495e;
        width: 60%;
        text-align: right;
    }

    .perfectcard-info .range {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .perfectcard-info .range span {
        flex: 1;
    }

    @media (max-width: 600px) {
        .container {
            padding: 15px;
        }

        .perfectcard-info .field {
            flex-direction: column;
            text-align: left;
        }

        .perfectcard-info .field-label,
        .perfectcard-info .field-value {
            width: 100%;
            text-align: left;
        }

        .perfectcard-info .field-value {
            margin-top: 5px;
        }
    }
</style>
<div class="perfect-sec">
    <div class="container-fluid flex-column">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="perfectcard-info">
                    <h2>Personal Information</h2>
                    <div class="field">
                        <span class="field-label">MmMR ID</span>
                        <span class="field-value"><?= $detailsdata->mrnmr_id ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Age Range</span>
                        <span class="field-value range">
                            <span><?= $detailsdata->ageRangeMin ?? '' ?></span>
                            <span><?= $detailsdata->ageRangeMax ?? '' ?></span>

                        </span>
                    </div>
                    <div class="field">
                        <span class="field-label">Height Range</span>
                        <span class="field-value range">
                            <span><?= $detailsdata->heightRangeMin ?? '' ?></span>
                            <span><?= $detailsdata->heightRangeMax ?? '' ?></span>
                        </span>
                    </div>
                    <div class="field">
                        <span class="field-label">Weight Range</span>
                        <span class="field-value range">
                            <span><?= $detailsdata->weightRangeMin ?? '' ?></span>
                            <span><?= $detailsdata->weightRangeMax ?? '' ?></span>
                        </span>
                    </div>
                </div>
                <div class="perfectcard-info">
                    <h2>Location</h2>
                    <div class="field">
                        <span class="field-label">State</span>
                        <span class="field-value"><?= $detailsdata->state ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">City</span>
                        <span class="field-value"><?= $detailsdata->city ?? '' ?></span>
                    </div>
                </div>
                <div class="perfectcard-info">
                    <h2>Lifestyle Choices</h2>
                    <div class="field">
                        <span class="field-label">Pet Friendly</span>
                        <span class="field-value"><?= $detailsdata->pet_friendly ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Want to have Children</span>
                        <span class="field-value"><?= $detailsdata->want_to_have_children ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Want to get Married</span>
                        <span class="field-value"><?= $detailsdata->want_to_get_married ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Have Children?</span>
                        <span class="field-value"><?= $detailsdata->have_children ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Previous Marriage?</span>
                        <span class="field-value"><?= $detailsdata->previous_marriage ?? '' ?></span>
                    </div>
                </div>
                <div class="perfectcard-info">
                    <h2>Health</h2>
                    <div class="field">
                        <span class="field-label">HIV Status</span>
                        <span class="field-value"><?= $detailsdata->hiv_status ?? '' ?></span>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="perfectcard-info">
                    <h2>Partner Expectations</h2>
                    <div class="field">
                        <span class="field-label">Qualities</span>
                        <span class="field-value"><?= $detailsdata->qualities ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Negotiable Requirements</span>
                        <span class="field-value"><?= $detailsdata->negotiable_requirement ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Non-Negotiable Requirements</span>
                        <span class="field-value"><?= $detailsdata->non_negotiable_requirements ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Partner Sexual Position</span>
                        <span class="field-value">
                            <?php
                                if (isset($detailsdata->partner_sexual_positionR)) {
                                    $religions = json_decode($detailsdata->partner_sexual_positionR);
                                    if (is_array($religions)) {
                                        foreach ($religions as $value) {
                                            echo htmlspecialchars($value).', ';
                                        }
                                    }
                                }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="perfectcard-info">
                    <h2>Beliefs & Values</h2>
                    <div class="field">
                        <span class="field-label">Religion</span>
                        <span class="field-value">
                            <?php
                                if (isset($detailsdata->religionR)) {
                                    $religions = json_decode($detailsdata->religionR);
                                    if (is_array($religions)) {
                                        foreach ($religions as $value) {
                                            echo htmlspecialchars($value).', ';
                                        }
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <div class="field">
                        <span class="field-label">Ideology</span>
                        <span>
                            <?php
                                if (isset($detailsdata->ideologyR)) {
                                    $religions = json_decode($detailsdata->ideologyR);
                                    if (is_array($religions)) {
                                        foreach ($religions as $value) {
                                            echo htmlspecialchars($value).', ';
                                        }
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <div class="field">
                        <span class="field-label">Political Ideology</span>
                        <span class="field-value">
                            <?php
                                if (isset($detailsdata->political_ideologyR)) {
                                    $religions = json_decode($detailsdata->political_ideologyR);
                                    if (is_array($religions)) {
                                        foreach ($religions as $value) {
                                            echo htmlspecialchars($value).', ';
                                        }
                                    }
                                }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="perfectcard-info">
                    <h2>Preferences</h2>
                    <div class="field">
                        <span class="field-label">Food Preference</span>
                        <span class="field-value">
                        <?php
                            if (isset($detailsdata->food_prefR)) {
                                $religions = json_decode($detailsdata->food_prefR);
                                if (is_array($religions)) {
                                    foreach ($religions as $value) {
                                        echo htmlspecialchars($value).', ';
                                    }
                                }
                            }
                        ?>
                        </span>
                    </div>
                    <div class="field">
                        <span class="field-label">Lifestyle</span>
                        <span class="field-value"><?= $detailsdata->lifestyle ?? '' ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Degree of Openness</span>
                        <span class="field-value">
                            <?php
                                if (isset($detailsdata->degree_of_opennessR)) {
                                    $religions = json_decode($detailsdata->degree_of_opennessR);
                                    if (is_array($religions)) {
                                        foreach ($religions as $value) {
                                            echo htmlspecialchars($value).', ';
                                        }
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <div class="field">
                        <span class="field-label">Hobbies</span>
                        <span class="field-value"><?= $detailsdata->hobbies ?? '' ?></span>
                    </div>
                </div>
                <div class="perfectcard-info">
                    <h2>Additional Information</h2>
                    <div class="field">
                        <span class="field-label">Additional Notes</span>
                        <span class="field-value"><?= $detailsdata->additional ?? '' ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>