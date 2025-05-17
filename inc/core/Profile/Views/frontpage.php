<?php echo $this->section('frontcss') ?>
<!--- make css here head setup -->
<style>
  .info-table-content {
    /* background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); */
  }

  .info-table {
    width: 100%;
    border-collapse: collapse;
  }

  .info-table th,
  .info-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
  }

  .info-table th {
    width: 35%;
    /* Set width for table headers */
  }

  .info-table td {
    width: 75%;
    /* Set width for table data */
  }

  .info-table tr:last-child th,
  .info-table tr:last-child td {
    border-bottom: none;
  }

  .info-title {
    font-weight: 600;
    color: #333333;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 14px;
  }

  .info-details {
    color: #666666;
    font-size: 14px;
  }

  .az-content-label {
    font-size: 18px;
    font-weight: 600;
    color: #333333;
    margin-bottom: 20px;
  }

  .az-profile-social-list .media {
    /* border-bottom: 1px solid #e0e0e0; */
  }
</style>
<?php echo $this->endSection() ?>
<div class="az-content az-content-profile">
  <div class="container mn-ht-100p">
    <div class="az-content-left az-content-left-profile">
      <div class="az-profile-overview">
        <div class="az-img-user">
          <img
            src="<?= base_url(isset($profile->profile_image) ? $profile->profile_image : 'uploads/default_image.jpg'); ?>"
            id="imgprofile" alt="Profile Image">
        </div>

        <div class="d-flex justify-content-between mg-b-20">
          <div>
            <h5 class="az-profile-name"><?= $userprofile->username ?? '' ?></h5>
            <p class="az-profile-name-text"><?= $userprofile->email ?? '' ?></p>
          </div>
          <div class="btn-icon-list">
            <button class="btn btn-gray btn-icon" onclick="document.getElementById('imageUpload').click();">
              <i class="typcn typcn-plus-outline"></i>
            </button>
            <input type="file" id="imageUpload" name="imageUpload" style="display:none;" onchange="this.form.submit()">
          </div>
        </div>

        <div class="az-profile-bio">

        </div><!-- az-profile-bio -->

        <hr class="mg-y-30">
      </div><!-- az-profile-overview -->
      <div class="az-profile-overview">
        <div class="az-content-label tx-13 mg-b-25">Contact Information</div>
        <div class="az-profile-contact-list">
          <div class="media">
            <div class="media-icon"><i class="icon ion-md-phone-portrait"></i></div>
            <div class="media-body">
              <span>Mobile</span>
              <div><?= $userprofile->mobile ?? '' ?></div>
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-icon"><i class="icon ion ion-md-mail"></i></div>
            <div class="media-body">
              <span>Email</span>
              <div><?= $userprofile->email ?? '' ?></div>
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-icon"><i class="ion ion-ios-pin"></i></div>
            <div class="media-body">
              <span>Current Address</span>
              <div><?= $profile->complete_address ?? '' ?></div>
            </div><!-- media-body -->
          </div><!-- media -->
        </div><!-- az-profile-contact-list -->
      </div><!-- az-profile-overview -->

    </div><!-- az-content-left -->
    <div class="az-content-body az-content-body-profile card-body-container">
      <nav class="nav az-nav-line" id="tabs" role="tablist">
        <a href="#personal-info" class="nav-link active" data-bs-toggle="tab" role="tab">Personal Information</a>
        <a href="#reference" class="nav-link" data-bs-toggle="tab" role="tab" id="contact-tab">References</a>
        <a href="#followers" class="nav-link" data-bs-toggle="tab" role="tab">Social Media & Digital IDs</a>
        <a href="#documents" class="nav-link" data-bs-toggle="tab" role="tab">Other important information</a>
        <a href="#mr-right" class="nav-link" data-bs-toggle="tab" role="tab">Your Mr. Right</a>
      </nav>

      <div class="az-profile-body tab-content">

        <!-- Personal Info Tab Content -->
        <div class="tab-pane fade show active" id="personal-info" role="tabpanel">
          <div class="az-content-label tx-13">Personal Information</div>
          <!-- Personal Info content here -->
          <div class="info-table-content">
            <table class="info-table">
              <tr>
                <th class="info-title">Name</th>
                <td class="info-details"><?= $userprofile->username ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Age</th>
                <td class="info-details"><?= $userprofile->age ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Date Of Birth</th>
                <td class="info-details"><?= $userprofile->dob ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Height</th>
                <td class="info-details"><?= $profile->height ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Weight</th>
                <td class="info-details"><?= $profile->weight ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Location</th>
                <td class="info-details"><?= $profile->location ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">State</th>
                <td class="info-details"><?= $userprofile->state ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">City</th>
                <td class="info-details"><?= $userprofile->city ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Complete Address</th>
                <td class="info-details"><?= $profile->complete_address ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Education</th>
                <td class="info-details"><?= $profile->education ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Profession</th>
                <td class="info-details"><?= $profile->profession ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Annual Income</th>
                <td class="info-details"><?= $profile->annual_income ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Food Preferences</th>
                <td class="info-details"><?= $profile->food_pref ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Lifestyle Habits</th>
                <td class="info-details"><?= $profile->lifestyle_habits ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Religion</th>
                <td class="info-details"><?= $profile->religion ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Do you drink?</th>
                <td class="info-details"><?= $profile->drinker ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Do you smoke?</th>
                <td class="info-details"><?= $profile->smoker ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Degree of openness</th>
                <td class="info-details"><?= $profile->degree_of_openness ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Ideology</th>
                <td class="info-details"><?= $profile->ideology ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Hobbies</th>
                <td class="info-details"><?= $profile->hobbies ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Family Information</th>
                <td class="info-details"><?= $profile->familybg ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Describe yourself</th>
                <td class="info-details"><?= $profile->describe_d ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Past relationship information</th>
                <td class="info-details"><?= $profile->past_relationship ?? '' ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- Contact Tab Content -->
        <div class="tab-pane fade" id="reference" role="tabpanel">
          <div class="az-content-label tx-13">Reference</div>
          <!-- Reference content here -->
          <div class="info-table-content">
            <table class="info-table">
              <tr>
                <th class="info-title">Reference#1 Name</th>
                <td class="info-details"><?= $profile->ref1_name ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Reference#1 Phone Number</th>
                <td class="info-details"><?= $profile->ref1_phone ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Reference#1 Address</th>
                <td class="info-details"><?= $profile->ref1_address ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Reference#2 Name</th>
                <td class="info-details"><?= $profile->ref2_name ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Reference#2 Phone Number</th>
                <td class="info-details"><?= $profile->ref2_phone ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Reference#2 Address</th>
                <td class="info-details"><?= $profile->ref2_address ?? '' ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- Followers Tab Content -->
        <div class="tab-pane fade" id="followers" role="tabpanel">
          <label class="az-content-label tx-13">Websites &amp; Social Channel</label>
          <div class="az-profile-social-list">
            <div class="media">
              <div class="media-icon"><i class="ion ion-logo-instagram"></i></div>
              <div class="media-body">
                <span>Instagram</span>
                <a href="<?= $profile->instagram_link ?? '' ?>"><?= $profile->instagram_link ?? '' ?></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="ion ion-logo-facebook"></i></div>
              <div class="media-body">
                <span>Facebook</span>
                <a href="<?= $profile->facebook_link ?? '' ?>"><?= $profile->facebook_link ?? '' ?></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="icon ion-logo-twitter"></i></div>
              <div class="media-body">
                <span>Twitter</span>
                <a href="<?= $profile->twitter_link ?? '' ?>"><?= $profile->twitter_link ?? '' ?></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="ion ion-logo-linkedin"></i></div>
              <div class="media-body">
                <span>Linkdin</span>
                <a href="<?= $profile->linkdin_link ?? '' ?>"><?= $profile->linkdin_link ?? '' ?></a>
              </div>
            </div>
          </div><!-- az-profile-social-list -->
        </div><!-- tab-pane -->

        <!-- Documents Tab Content -->
        <div class="tab-pane fade" id="documents" role="tabpanel">
          <div class="az-content-label tx-13 mg-b-25">Other important information/ documents needed</div>
          <div class="info-table-content">
            <table class="info-table">
              <tr>
                <th class="info-title">Photo 1</th>
                <td class="info-details"><img src="<?= base_url($profile->photo1 ?? '') ?>" alt="1"></td>
              </tr>
              <tr>
                <th class="info-title">Photo 2</th>
                <td class="info-details"><img src="<?= base_url($profile->photo2 ?? '') ?>" alt="2"></td>
              </tr>
              <tr>
                <th class="info-title">Address Proof</th>
                <td class="info-details"><img src="<?= base_url($profile->address_proof ?? '') ?>" alt="address proof">
                </td>
              </tr>
              <tr>
                <th class="info-title">PAN Card</th>
                <td class="info-details"><img src="<?= base_url($profile->pan_card ?? '') ?>" alt="pancard"></td>
              </tr>
            </table>
          </div>
        </div><!-- tab-pane -->

        <!-- MR Right Tab Content -->
        <div class="tab-pane fade" id="mr-right" role="tabpanel">
          <div class="az-content-label tx-13 mg-b-25">Your Mr. Right</div>
          <div class="info-table-content">
            <table class="info-table">
              <tr>
                <th class="info-title">Age</th>
                <td class="info-details"><?= $profile->partner_age ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Height</th>
                <td class="info-details"><?= $profile->partner_height ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Weight</th>
                <td class="info-details"><?= $profile->partner_weight ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Location</th>
                <td class="info-details"><?= $profile->partner_location ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Education</th>
                <td class="info-details"><?= $profile->partner_education ?? '' ?></td>
              </tr>

              <tr>
                <th class="info-title">Profession</th>
                <td class="info-details"><?= $profile->partner_profession ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Annual Income</th>
                <td class="info-details"><?= $profile->partner_annual_income ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Food preferences</th>
                <td class="info-details"><?= $profile->partner_food_pref ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Lifestyle habits</th>
                <td class="info-details"><?= $profile->partner_lifestyle_habits ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Degree of openness</th>
                <td class="info-details"><?= $profile->partner_degree_of_openness ?? '' ?></td>
              </tr>
              <th class="info-title">Hobbies</th>
              <td class="info-details"><?= $profile->partner_hobbies ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Religion</th>
                <td class="info-details"><?= $profile->partner_religion ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Ideology</th>
                <td class="info-details"><?= $profile->partner_ideology ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Family Information</th>
                <td class="info-details"><?= $profile->partner_family_info ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Describe your partner</th>
                <td class="info-details"><?= $profile->partner_describe_d ?? '' ?></td>
              </tr>
              <tr>
                <th class="info-title">Anything else you would want us to consider while looking for a suitable partner
                  for you?</th>
                <td class="info-details"><?= $profile->partner_us_to_consider ?? '' ?></td>
              </tr>
            </table>
          </div>
        </div><!-- tab-pane -->
      </div><!-- tab-pane -->
    </div><!-- tab-content -->
  </div><!-- az-content-body -->
</div><!-- container -->
</div><!-- az-content -->
<?php echo $this->section('script') ?>
<?php echo $this->endSection() ?>