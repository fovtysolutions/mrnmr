<style>
  .nav-icon {
    scroll-behavior: smooth !important;
    overflow-y: scroll !important;
    scrollbar-width: none !important;
  }
  .m-sidebar a:hover{
    color: #ffffff !important;
  }
</style>
<div class="az-iconbar m-sidebar">
  <a href="<?= base_url() ?>" class="az-iconbar-logo">
    <img src="<?= base_url('assets/img/logo.png') ?>" alt="MR n MR Logo" class="logo-image-icon">
  </a>
  <nav class="nav-icon">
    <a href="#asideDashboard" class="nav-link active">
      <img width="24" height="24" src="<?= base_url('assets/img/dashboards.svg') ?>" alt="dashboard"/>
      <span>Dashboard</span>
    </a>
    <a href="#asidemember" class="nav-link">
      <img width="24" height="24" src="<?= base_url('assets/img/members.svg') ?>" alt="user"/>
      <span>Member</span>
    </a>
    <a href="#asidemrperfect" class="nav-link">
        <img width="24" height="24" src="<?= base_url('assets/img/perfectmatch.svg') ?>" alt="perfect match"/>
        <span>Perfect</span>
      </a>
      <a href="#asidepotentialmatches" class="nav-link">
        <img width="24" height="24" src="<?= base_url('assets/img/match.svg') ?>" alt="potential match"/>
        <span>Potential</span>
      </a>
      <a href="#asideevents" class="nav-link">
        <img width="24" height="24" src="<?= base_url('assets/img/event.svg') ?>" alt="events"/>
        <span>Events</span>
      </a>
      <a href="#asideliked" class="nav-link">
        <img width="24" height="24" src="<?= base_url('assets/img/heart.svg') ?>" alt="liked"/>
        <span>Liked</span>
      </a>
      <a href="#asidematched" class="nav-link">
        <img width="24" height="24" src="<?= base_url('assets/img/matchedp.svg') ?>" alt="matched"/>
        <span>Matched</span>
      </a>
      <a href="#asidesettings" class="nav-link">
      <img width="24" height="24" src="<?= base_url('assets/img/settings.svg') ?>" alt="setting"/>
      <span>Settings</span>
    </a>
    <!-- Add other nav links here -->
  </nav>
</div>

<div class="az-iconbar-aside">
  <div class="az-iconbar-header">
    <!-- <a href="index.php" class="az-logo">Logo</a> -->
    <a href="#" class="az-iconbar-toggle-menu">
      <i class="icon ion-md-arrow-back"></i>
      <i class="icon ion-md-close"></i>
    </a>
  </div>
  <div class="az-iconbar-body">
    <div id="asideDashboard" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">Dashboard</h6>
      <ul class="nav">
        <li class="nav-item">
          <a href="<?= base_url('admin') ?>" class="nav-link">Dashboard</a>
        </li>
      </ul>
    </div>
    <div id="asidemember" class="az-iconbar-pane">
      <h6 class="az-iconbar-title">Member</h6>
      <ul class="nav">
        <li class="nav-item">
          <a href="<?= base_url('admin/member') ?>" class="nav-link">Member</a>
        </li>
      </ul>
    </div>
    <div id="asidemrperfect" class="az-iconbar-pane">
        <h6 class="az-iconbar-title">My Mr Perfect</h6>
        <ul class="nav">
          <li class="nav-item">
            <a href="<?= base_url('admin/mrperfect') ?>" class="nav-link">My Mr Perfect</a>
          </li>
        </ul>
      </div>
      <div id="asidepotentialmatches" class="az-iconbar-pane">
        <h6 class="az-iconbar-title">Potential Matches</h6>
        <ul class="nav">
          <li class="nav-item">
            <a href="<?= base_url('admin/potentialmatches') ?>" class="nav-link">Potential Matches</a>
          </li>
        </ul>
      </div>
      <div id="asideevents" class="az-iconbar-pane">
        <h6 class="az-iconbar-title">Events</h6>
        <ul class="nav">
          <li class="nav-item">
            <a href="<?= base_url('admin/events') ?>" class="nav-link">Events</a>
          </li>
        </ul>
      </div>
      <div id="asideliked" class="az-iconbar-pane">
        <h6 class="az-iconbar-title">Liked</h6>
        <ul class="nav">
          <li class="nav-item">
            <a href="<?= base_url('admin/') ?>" class="nav-link">Liked</a>
          </li>
        </ul>
      </div>
      <div id="asidematched" class="az-iconbar-pane">
        <h6 class="az-iconbar-title">Matched</h6>
        <ul class="nav">
          <li class="nav-item">
            <a href="<?= base_url('admin/') ?>" class="nav-link">Matched</a>
          </li>
        </ul>
      </div>
      <div id="asidesettings" class="az-iconbar-pane">
        <h6 class="az-iconbar-title">Settings</h6>
        <ul class="nav">
          <li class="nav-item">
            <a href="<?= base_url('admin/') ?>" class="nav-link">Settings</a>
          </li>
        </ul>
      </div>
    <!-- Add other panes here -->
  </div>
</div>
