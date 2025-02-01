<div class="az-content az-content-profile">
  <div class="container mn-ht-100p">
    <div class="az-content-left az-content-left-profile">
      <div class="az-profile-overview">
        <div class="az-img-user">
          <img src="<?= base_url(session()->get('profile_image') ?: 'uploads/default_image.jpg'); ?>" id="imgprofile"
            alt="Profile Image">
          <?php echo view('hooks/imageorfileupload', ['imageids' => 'profile_image', 'input' => 'imageUpload', 'filetype' => 'image']); ?>
        </div>

        <div class="d-flex justify-content-between mg-b-20">
          <div>
            <h5 class="az-profile-name"><?= session()->get('username'); ?></h5>
            <p class="az-profile-name-text"><?= session()->get('role'); ?></p>
          </div>
          <div class="btn-icon-list">
            <button class="btn btn-gray btn-icon" onclick="document.getElementById('imageUpload').click();">
              <i class="typcn typcn-plus-outline"></i>
            </button>
            <input type="file" id="imageUpload" name="imageUpload" style="display:none;" onchange="this.form.submit()">
          </div>
        </div>

        <div class="az-profile-bio">
          <?= session()->get('formtextarea'); ?>
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
              <div>(+91)<?= session()->get('mobile'); ?></div>
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-icon"><i class="icon ion ion-md-mail"></i></div>
            <div class="media-body">
              <span>Email</span>
              <div><?= session()->get('email'); ?></div>
            </div><!-- media-body -->
          </div><!-- media -->
          <div class="media">
            <div class="media-icon"><i class="ion ion-ios-pin"></i></div>
            <div class="media-body">
              <span>Current Address</span>
              <div>San Francisco, CA</div>
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
                <td class="info-details">William Smith</td>
              </tr>
              <tr>
                <th class="info-title">Age</th>
                <td class="info-details">25</td>
              </tr>
              <tr>
                <th class="info-title">Date Of Birth</th>
                <td class="info-details">dd/mm/yyyy</td>
              </tr>
              <tr>
                <th class="info-title">Height</th>
                <td class="info-details">5.5</td>
              </tr>
              <tr>
                <th class="info-title">Weight</th>
                <td class="info-details">65</td>
              </tr>
              <tr>
                <th class="info-title">Location</th>
                <td class="info-details">Location</td>
              </tr>
              <tr>
                <th class="info-title">Complete Address</th>
                <td class="info-details">Complete Address</td>
              </tr>
              <tr>
                <th class="info-title">Education</th>
                <td class="info-details">Education</td>
              </tr>
              <tr>
                <th class="info-title">Profession</th>
                <td class="info-details">Profession</td>
              </tr>
              <tr>
                <th class="info-title">Annual Income</th>
                <td class="info-details">Annual Income</td>
              </tr>
              <tr>
                <th class="info-title">Food Preferences</th>
                <td class="info-details">Food Preferences</td>
              </tr>
              <tr>
                <th class="info-title">Lifestyle Habits</th>
                <td class="info-details">Active, Gym Enthusiast</td>
              </tr>
              <tr>
                <th class="info-title">Religion</th>
                <td class="info-details">Christian</td>
              </tr>
              <tr>
                <th class="info-title">Do you drink?</th>
                <td class="info-details">Occasionally</td>
              </tr>
              <tr>
                <th class="info-title">Do you smoke?</th>
                <td class="info-details">No</td>
              </tr>
              <tr>
                <th class="info-title">Degree of openness</th>
                <td class="info-details">Open to close friends and family</td>
              </tr>
              <tr>
                <th class="info-title">Ideology</th>
                <td class="info-details">Moderate</td>
              </tr>
              <tr>
                <th class="info-title">Hobbies</th>
                <td class="info-details">Reading, Traveling, Photography</td>
              </tr>
              <tr>
                <th class="info-title">Family Information</th>
                <td class="info-details">Living with parents, one sibling</td>
              </tr>
              <tr>
                <th class="info-title">Describe yourself</th>
                <td class="info-details">Adventurous, empathetic, and detail-oriented</td>
              </tr>
              <tr>
                <th class="info-title">Past relationship information</th>
                <td class="info-details">One long-term relationship</td>
              </tr>
            </table>
          </div>
        </div>
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

        <!-- Contact Tab Content -->
        <div class="tab-pane fade" id="reference" role="tabpanel">
          <div class="az-content-label tx-13">Reference</div>
          <!-- Reference content here -->
          <div class="info-table-content">
            <table class="info-table">
              <tr>
                <th class="info-title">Reference#1 Name</th>
                <td class="info-details">John Doe</td>
              </tr>
              <tr>
                <th class="info-title">Reference#1 Phone Number</th>
                <td class="info-details">+1 123 456 7890</td>
              </tr>
              <tr>
                <th class="info-title">Reference#1 Address</th>
                <td class="info-details">123 Main St, City, Country</td>
              </tr>
              <tr>
                <th class="info-title">Reference#2 Name</th>
                <td class="info-details">Jane Smith</td>
              </tr>
              <tr>
                <th class="info-title">Reference#2 Phone Number</th>
                <td class="info-details">+1 987 654 3210</td>
              </tr>
              <tr>
                <th class="info-title">Reference#2 Address</th>
                <td class="info-details">456 Elm St, City, Country</td>
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
                <a href=""></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="ion ion-logo-facebook"></i></div>
              <div class="media-body">
                <span>Facebook</span>
                <a href=""></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="icon ion-logo-twitter"></i></div>
              <div class="media-body">
                <span>Twitter</span>
                <a href=""><?= session()->get('twitter_link'); ?></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="ion ion-logo-linkedin"></i></div>
              <div class="media-body">
                <span>Linkdin</span>
                <a href=""><?= session()->get('linkdin_link'); ?></a>
              </div>
            </div>
          </div><!-- az-profile-social-list -->
        </div><!-- tab-pane -->

        <!-- Documents Tab Content -->
        <div class="tab-pane fade" id="documents" role="tabpanel">
          <div class="az-content-label tx-13 mg-b-25">Other important information/ documents needed</div>
        </div><!-- tab-pane -->

        <!-- MR Right Tab Content -->
        <div class="tab-pane fade" id="mr-right" role="tabpanel">
          <div class="az-content-label tx-13 mg-b-25">Your Mr. Right</div>
          <div class="info-table-content">
            <table class="info-table">
              <tr>
                <th class="info-title">Age</th>
                <td class="info-details">25</td>
              </tr>
              <tr>
                <th class="info-title">Height</th>
                <td class="info-details">5.5</td>
              </tr>
              <tr>
                <th class="info-title">Weight</th>
                <td class="info-details">65</td>
              </tr>
              <tr>
                <th class="info-title">Location</th>
                <td class="info-details">City, Country</td>
              </tr>
              <tr>
                <th class="info-title">Education</th>
                <td class="info-details">Bachelor's Degree in Computer Science</td>
              </tr>

              <tr>
                <th class="info-title">Profession</th>
                <td class="info-details">Software Engineer</td>
              </tr>
              <tr>
                <th class="info-title">Annual Income</th>
                <td class="info-details">$75,000</td>
              </tr>
              <tr>
                <th class="info-title">Food preferences</th>
                <td class="info-details">Vegetarian</td>
              </tr>
              <tr>
                <th class="info-title">Lifestyle habits</th>
                <td class="info-details">Active, Gym Enthusiast</td>
              </tr>
              <tr>
                <th class="info-title">Degree of openness</th>
                <td class="info-details">Open to close friends and family</td>
              </tr>
              <th class="info-title">Hobbies</th>
              <td class="info-details">Reading, Traveling, Photography</td>
              </tr>
              <tr>
                <th class="info-title">Religion</th>
                <td class="info-details">Christian</td>
              </tr>
              <tr>
                <th class="info-title">Ideology</th>
                <td class="info-details">Moderate</td>
              </tr>
              <tr>
                <th class="info-title">Family Information</th>
                <td class="info-details">Living with parents, one sibling</td>
              </tr>
              <tr>
                <th class="info-title">Describe your partner</th>
                <td class="info-details">Kind, ambitious, and family-oriented</td>
              </tr>
              <tr>
                <th class="info-title">Anything else you would want us to consider while looking for a suitable partner
                  for you?</th>
                <td class="info-details">Looking for someone who values honesty and communication.</td>
              </tr>
              <tr>
                <th class="info-title">Share additional thoughts</th>
                <td class="info-details">I enjoy outdoor activities and would love a partner who shares similar
                  interests.</td>
              </tr>
            </table>
          </div>
        </div><!-- tab-pane -->
      </div><!-- tab-pane -->
    </div><!-- tab-content -->
  </div><!-- az-content-body -->
</div><!-- container -->
</div><!-- az-content -->