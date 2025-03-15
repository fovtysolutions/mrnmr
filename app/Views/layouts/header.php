<div class="az-header az-header-dashboard-six">
  <div class="container-fluid">
    <div class="az-header-left">
      <a href="" id="azIconbarShow" class="az-header-menu-icon">
        <span></span>
      </a>
    </div><!-- az-header-left -->
    <div class="az-header-center">
      <input type="search" class="form-control" placeholder="Search for anything...">
      <button class="btn"><i class="fas fa-search"></i></button>
    </div><!-- az-header-center -->
    <div class="az-header-right">
      <div class="dropdown az-header-notification az-header-i">
        <a href="" class="new"><i class="typcn typcn-bell"></i></a>
        <div class="dropdown-menu">
          <div class="az-dropdown-header mg-b-20 d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <h6 class="az-notification-title">Notifications</h6>
          <p class="az-notification-text">You have 2 unread notifications</p>
          <div class="az-notification-list">
            <div class="media new">
              <div class="az-img-user">
                <img src="<?= base_url('assets/img/faces/face8.jpg') ?>" alt="">
              </div>
              <div class="media-body">
                <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                <span>Mar 15 12:32pm</span>
              </div><!-- media-body -->
            </div><!-- media -->

            <div class="media new">
              <div class="az-img-user online">
                <img src="<?= base_url('assets/img/faces/face8.jpg') ?>" alt="">
              </div>
              <div class="media-body">
                <p><strong>Joyce Chua</strong> just created a new blog post</p>
                <span>Mar 13 04:16am</span>
              </div><!-- media-body -->
            </div><!-- media -->

            <div class="media">
              <div class="az-img-user">
                <img src="<?= base_url('assets/img/faces/face8.jpg') ?>" alt="">
              </div>
              <div class="media-body">
                <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                <span>Mar 13 02:56am</span>
              </div><!-- media-body -->
            </div><!-- media -->

            <div class="media">
              <div class="az-img-user">
                <img src="<?= base_url('assets/img/faces/face8.jpg') ?>" alt="">
              </div>
              <div class="media-body">
                <p><strong>Adrian Monino</strong> added a new comment on your photo</p>
                <span>Mar 12 10:40pm</span>
              </div><!-- media-body -->
            </div><!-- media -->
          </div><!-- az-notification-list -->
          <div class="dropdown-footer"><a href="">View All Notifications</a></div>
        </div><!-- dropdown-menu -->
      </div><!-- az-header-notification -->

      <div class="dropdown az-profile-menu">
        <a href="" class="az-img-user">
          <img src="<?= base_url('assets/img/faces/face8.jpg') ?>" alt="">
        </a>
        <div class="dropdown-menu">
          <div class="az-dropdown-header d-sm-none">
            <a href="#" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <div class="az-header-profile">
            <div class="az-img-user">
              <img src="<?= base_url('assets/img/faces/face8.jpg') ?>" alt="">
            </div><!-- az-img-user -->
            <h6><?= $data['username'] ?? '' ?></h6>
            <span><?= $data['email'] ?? '' ?></span>
          </div><!-- az-header-profile -->

          <a href="<?= base_url('/admin/profile') ?>" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My
            Profile</a>
          <a href="<?= base_url('admin/profile/edit') ?>" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit
            Profile</a>
          <!-- <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a> -->
          <a href="<?= base_url('/logout') ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign
            Out</a>
        </div><!-- dropdown-menu -->
      </div>
      <div class="dropdown az-profile-menu">
      </div>
    </div><!-- az-header-right -->
  </div><!-- container -->
</div>