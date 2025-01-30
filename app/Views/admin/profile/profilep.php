<div class="az-content az-content-profile">
  <div class="container mn-ht-100p">
    <div class="az-content-left az-content-left-profile">

      <div class="az-profile-overview">
        <div class="az-img-user">
          <img src="<?= base_url(session()->get('profile_image') ?: 'uploads/default_image.jpg'); ?>" id="imgprofile" alt="Profile Image">
          <?php echo view('hooks/imageorfileupload', ['imageids'=>'profile_image','input'=>'imageUpload','filetype'=>'image']); ?>
        </div>
      
        <div class="d-flex justify-content-between mg-b-20">
          <div>
            <h5 class="az-profile-name"><?= session()->get('username'); ?></h5> 
            <p class="az-profile-name-text"><?= session()->get('role'); ?></p>
          </div>
          <div class="btn-icon-list">
            <button class="btn btn-indigo btn-icon" onclick="document.getElementById('imageUpload').click();">
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

    </div><!-- az-content-left -->
    <div class="az-content-body az-content-body-profile">
      <nav class="nav az-nav-line" id="tabs" role="tablist">
        <a href="#overview" class="nav-link active" data-bs-toggle="tab" role="tab">Overview</a>
        <a href="#contact" class="nav-link" data-bs-toggle="tab" role="tab" id="contact-tab">Contact</a>
        <a href="#followers" class="nav-link" data-bs-toggle="tab" role="tab">Channel</a>
        <a href="#following" class="nav-link" data-bs-toggle="tab" role="tab">Following</a>
        <!-- <a href="#settings" class="nav-link" data-bs-toggle="tab" role="tab">Account Settings</a> -->
      </nav>

      <div class="az-profile-body tab-content">
        
        <!-- Overview Tab Content -->
        <div class="tab-pane fade show active" id="overview" role="tabpanel">
          <!-- Overview content here -->
        </div>

        <!-- Contact Tab Content -->
        <div class="tab-pane fade" id="contact" role="tabpanel">
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
              <div class="media-icon"><i class="icon ion-logo-slack"></i></div>
              <div class="media-body">
                <span>Slack</span>
                <div><?= session()->get('email'); ?></div>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="icon ion-md-locate"></i></div>
              <div class="media-body">
                <span>Current Address</span>
                <div>San Francisco, CA</div>
              </div><!-- media-body -->
            </div><!-- media -->
          </div><!-- az-profile-contact-list -->
        </div><!-- tab-pane -->

        <!-- Followers Tab Content -->
        <div class="tab-pane fade" id="followers" role="tabpanel">
          <label class="az-content-label tx-13 mg-b-20">Websites &amp; Social Channel</label>
          <div class="az-profile-social-list">
            <div class="media">
              <div class="media-icon"><i class="icon ion-logo-github"></i></div>
              <div class="media-body">
                <span>Github</span>
                <a href=""><?= session()->get('github_link'); ?></a>
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
              <div class="media-icon"><i class="icon ion-logo-linkedin"></i></div>
              <div class="media-body">
                <span>Linkedin</span>
                <a href=""><?= session()->get('linkdin_link'); ?></a>
              </div>
            </div><!-- media -->
            <div class="media">
              <div class="media-icon"><i class="icon ion-md-link"></i></div>
              <div class="media-body">
                <span>My Portfolio</span>
                <a href=""><?= session()->get('portfolio_link'); ?></a>
              </div>
            </div><!-- media -->
          </div><!-- az-profile-social-list -->
        </div><!-- tab-pane -->

        <!-- Following Tab Content -->
        <div class="tab-pane fade" id="following" role="tabpanel">
          <!-- Following content here -->
        </div><!-- tab-pane -->

        <!-- Account Settings Tab Content -->
        <div class="tab-pane fade" id="settings" role="tabpanel">
          <!-- Account Settings content here -->
        </div><!-- tab-pane -->

      </div><!-- tab-content -->
    </div><!-- az-content-body -->
  </div><!-- container -->
</div><!-- az-content -->
