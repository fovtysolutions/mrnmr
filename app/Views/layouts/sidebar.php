<style>
  .nav-icon {
    scroll-behavior: smooth !important;
    overflow-y: scroll !important;
    scrollbar-width: none !important;
  }
</style>
<div class="az-iconbar">
  <a href="<?= base_url() ?>" class="az-iconbar-logo">
    <img src="<?= base_url('assets/img/logo.png') ?>" alt="MR n MR Logo" class="logo-image-icon">
  </a>
  <nav class="nav-icon">
    <a href="#asideDashboard" onclick="location.href='<?= base_url('admin') ?>';" class="nav-link active">
      <!-- <i class="typcn typcn-home"></i> -->
    <img width="24" height="24" src="<?= base_url('assets/img/dashboards.svg') ?>" alt="dashboard"/>
      <span>Dashboard</span>
    </a>
    <a href="#asidemember" onclick="location.href='<?= base_url('admin/member') ?>';" class="nav-link">
    <img width="24" height="24" src="<?= base_url('assets/img/members.svg') ?>" alt="user"/>
      <span>Member</span>
    </a>
    <a href="#asidemrperfect" onclick="location.href='<?= base_url('admin/mrperfect') ?>';" class="nav-link">
    <img width="24" height="24" src="<?= base_url('assets/img/perfectmatch.svg') ?>" alt="perfect match"/>
      <span>Perfect</span>
    </a>
    <a href="#asidepotentialmatches" onclick="location.href='<?= base_url('admin/potentialmatches') ?>';" class="nav-link">
    <img width="24" height="24" src="<?= base_url('assets/img/match.svg') ?>" alt="perfect match"/>

      <span>Matches</span>
    </a>
    <a href="#asideevents" onclick="location.href='<?= base_url('admin/events') ?>';" class="nav-link">
    <img width="24" height="24" src="<?= base_url('assets/img/event.svg') ?>" alt="perfect match"/>
      <span>Events</span>
    </a>
    <a href="#asideAppsPages" onclick="location.href='#';" class="nav-link">
      <i class="typcn typcn-th-large"></i>
      <span>Liked</span>
    </a>
    <a href="#asideAppsPages" onclick="location.href='#';" class="nav-link">
      <i class="typcn typcn-th-large"></i>
      <span>Matched</span>
    </a>
  </nav>
</div><!-- az-iconbar -->
<div class="az-iconbar-aside">
  <div class="az-iconbar-header">
    <a href="index.php" class="az-logo"></a>
    <a href="" class="az-iconbar-toggle-menu">
      <i class="icon ion-md-arrow-back"></i>
      <i class="icon ion-md-close"></i>
    </a>
  </div><!-- az-iconbar-header -->
  <div class="az-iconbar-body">
    <div id="asideDashboard" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">Dashboard</h6>
      <!-- <small class="az-iconbar-text">Choose between layouts to experience different look and feel for your -->
      <!-- projects.</small> -->
      <ul class="nav">
        <li class="nav-item <?= $dashboard == 'Dashboard' ? 'active' : '' ?>"><a href="<?= base_url('admin') ?>"
            class="nav-link loadDashboard">Dashboard</a></li>
      </ul>
    </div>
    <div id="asidemember" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">Member</h6>
      <!-- <small class="az-iconbar-text">Some pre-built web apps and pages for you to use in your project.</small> -->
      <ul class="nav">
        <li class="nav-item <?= $dashboard == 'Member' ? 'active' : '' ?>">
          <a href="<?= base_url('admin/member') ?>"
            class="nav-link">Member
          </a>
        </li>
      </ul>
    </div><!-- az-iconbar-pane -->
    <div id="asidemrperfect" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">My Mr Perfect</h6>
      <!-- <small class="az-iconbar-text">Some pre-built web apps and pages for you to use in your project.</small> -->
      <ul class="nav">
        <li class="nav-item <?= $dashboard == 'My Mr Perfect' ? 'active' : '' ?>">
          <a href="<?= base_url('admin/mrperfect') ?>"
            class="nav-link">My Mr Perfect
          </a>
        </li>
      </ul>
    </div><!-- az-iconbar-pane -->
    <div id="asidepotentialmatches" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">Potential Matches</h6>
      <!-- <small class="az-iconbar-text">Some pre-built web apps and pages for you to use in your project.</small> -->
      <ul class="nav">
        <li class="nav-item <?= $dashboard == 'Potential Matches' ? 'active' : '' ?>">
          <a href="<?= base_url('admin/potentialmatches') ?>"
            class="nav-link">Potential Matches
          </a>
        </li>
      </ul>
    </div><!-- az-iconbar-pane -->
    <div id="asideevents" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">Events</h6>
      <!-- <small class="az-iconbar-text">Some pre-built web apps and pages for you to use in your project.</small> -->
      <ul class="nav">
        <li class="nav-item <?= $dashboard == 'Events' ? 'active' : '' ?>">
          <a href="<?= base_url('admin/events') ?>"
            class="nav-link">Events
          </a>
        </li>
      </ul>
    </div><!-- az-iconbar-pane -->
  </div><!-- az-iconbar-body -->
</div><!-- az-iconbar-aside -->