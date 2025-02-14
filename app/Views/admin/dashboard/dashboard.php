<?= $this->extend("layouts/layout") ?>
<?= $this->section("content") ?>

<style>
  .main {
    text-align: center;
  }

  img:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
  }

  .card-dash .card-title span {
    color: #6c757d;
    float: right;
    font-weight: 500;
    font-size: 16px;
  }


  .dash-card-sm .dash-card-icon i {
    color: #ffffff;
    background-color: #313131;
    padding: 12px;
    border-radius: 2px;
    font-size: 20px;
  }

  .dash-card-sm .dash-card-icon img {
    background-color: #313131;
  }

  .dash-card-sm .dash-card-icon .icon-l {
    color: #ffffff;
    padding: 15px 18px;
    border-radius: 2px;
    font-size: 22px;
  }

  /* .dash-card-sm .dash-card-icon .ig {
    background-color: #408E42;
  }

  .dash-card-sm .dash-card-icon .ib {
    background-color: #086baf;
  }

  .dash-card-sm .dash-card-icon .iy {
    background-color: #fec009;
  }

  .dash-card-sm .dash-card-icon .ip {
    background-color: #e9067d;
  } */

  .dash-card-sm h6 {
    font-size: 18px;
  }

  .dash-card-sm h3 {
    font-size: 30px;
    margin-bottom: 0;
  }

  .dash-card-sm .card-body {
    padding: 25px 20px;
    display: flex;
    align-items: start;
    flex-direction: column;

  }

  .table thead th,
  .table thead td {
    font-size: 14px;
    padding: 9px 15px;
  }

  .card-dash h6 {
    padding: 25px 20px;
    margin-bottom: 0;
    font-size: 18px;
    border-bottom: 1px solid #cdd4e0;
    /* border-left: 4px solid #086baf; */
  }

  .card-dash h6:before {
    content: "";
    height: 30px;
    width: 3px;
    background: #171717;
    position: absolute;
    left: 0;
    top: 20px;
    border-radius: 0 3px 3px 0;
  }

  .card-dash th {
    background-color: #f2f2f2;
  }

  .card-dash ul {
    padding: 25px 20px;
    margin-bottom: 0;
    font-size: 18px;
    border-bottom: 1px solid #cdd4e0;
  }

  .dash-t-search {
    border-bottom: 1px solid #cdd4e0;
  }

  .dash-t-search h6 {
    border-bottom: none;
  }

  .card-dash .nav-pills .nav-link.active {
    border-radius: 2px;
    background-color: #171717;
    color: #ffffff;
  }

  .card-dash .nav-pills .nav-link {
    padding: 0.5rem 1rem;
    font-size: 16px;
  }

  .card-dash .tab-content {
    margin-left: 0px;
    margin-right: 0px;
    padding-left: 0px;
    border-radius: 5px;
    padding-right: 0px;
    margin-bottom: 1rem;
  }

  .table-responsive {
    overflow-x: scroll;
    scroll-behavior: smooth !important;
    scrollbar-width: none !important;
  }

  .bg-purple {
    background-color: #313131;
  }

  .bg-primary {
    background-color: #5c5a5a !important;
  }
</style>

<div class="az-content-body az-content-body-dashboard-six">
  <h2 class="az-content-title mg-b-5" style="font-size: 28px; color: #4c5258;">
    Hi, welcome to Mr & Mr
  </h2>
  <!-- <div>
      <img 
        style="width:250px"
          src="<?= base_url('assets/img/logo.png') ?>" 
          alt="Logo Image"
      >
    </div> -->
  <div class="row row-sm mt-4">
    <div class="col-sm-6 col-lg-3">
      <div class="card card-dashboard-donut dash-card-sm">
        <div class="card-body">
          <div class="dash-card-icon">
            <img class="p-2 rounded" width="45" height="45" src="<?= base_url('assets/img/member-w.png') ?>"
              alt="dashboard" />
          </div>
          <div>
            <p class="mt-4">Total</p>
            <h6><a href="<?= base_url('/admin/member') ?>">Members</a></h6>
            <h3></h3>
          </div>
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-0">
      <div class="card card-dashboard-donut dash-card-sm">
        <!-- <div class="card-header">
        </div> -->
        <div class="card-body">
          <div class="dash-card-icon">
            <img class="p-2 rounded" width="45" height="45" src="<?= base_url('assets/img/potential-w.png') ?>"
              alt="dashboard" />
          </div>
          <div>
            <p class="mt-4">Total</p>
            <h6><a href="<?= base_url('/admin/') ?>">Potential Matches</a></h6>
            <h3></h3>
          </div>
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-0">
      <div class="card card-dashboard-donut dash-card-sm">
        <!-- <div class="card-header">
        </div> -->
        <div class="card-body">
          <div class="dash-card-icon">
            <img class="p-2 rounded" width="45" height="45" src="<?= base_url('assets/img/matched-w.png') ?>"
              alt="match" />
          </div>
          <div>
            <p class="mt-4">Total</p>
            <h6><a href="<?= base_url('/admin/matched') ?>">Matched</a></h6>
            <h3></h3>
          </div>
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-20 mg-sm-t-0">
      <div class="card card-dashboard-donut dash-card-sm">
        <!-- <div class="card-header">
        </div> -->
        <div class="card-body">
          <div class="dash-card-icon">
            <img class="p-2 rounded" width="45" height="45" src="<?= base_url('assets/img/liked-w.png') ?>"
              alt="liked" />
          </div>
          <div>
            <p class="mt-4">Total</p>
            <h6><a href="<?= base_url('/admin/liked') ?>">Liked</a></h6>
            <h3></h3>
          </div>
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
    <div class="row row-sm mt-4">
      <div class="col-lg-9">
        <div class="row row-sm">
          <div class="col-md-6">
            <div class="card card-dashboard-nine">
              <div class="card-header">
                <h6 class="az-content-label ms-2">Estimated Unique Impressions</h6>
                <h1 class="card-title ms-2">321,212</h1>
                <small class="az-content-text ms-2">The estimated number of unique people that see the ad over the past
                  30 days.</small>
              </div><!-- card-header -->
              <div class="bar-chart"><canvas id="chartBar1"></canvas></div>
            </div><!-- card -->
          </div>
          <div class="col-md-6 mg-t-20 mg-md-t-0">
            <div class="card card-dashboard-nine">
              <div class="card-header">
                <h6 class="az-content-label ms-2">Estimated Unique Clicks</h6>
                <h1 class="card-title ms-2">305,294</h1>
                <small class="az-content-text ms-2">The estimated number of clicks for the ad over the past 30 days. A
                  click is... <a href="">Learn more</a></small>
              </div><!-- card-header -->
              <div class="bar-chart"><canvas id="chartBar2"></canvas></div>
            </div><!-- card -->
          </div>
        </div><!-- row -->
      </div><!-- col -->
      <div class="col-lg-3 mg-t-20 mg-lg-t-0">
        <div class="card card-dashboard-ten bg-purple">
          <h6 class="az-content-label">Popularity</h6>
          <div class="card-body my-3">
            <div>
              <h6 class="py-1">1,137</h6>
              <label>Global Rank</label>
            </div>
            <div>
              <h6 class="py-1">953</h6>
              <label>US Rank</label>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->
        <div class="card card-dashboard-ten bg-primary">
          <h6 class="az-content-label">Search Traffic</h6>
          <div class="card-body my-3">
            <div>
              <h6 class="py-1">26.5<span class="percent">%</span></h6>
              <label>Search Visits</label>
            </div>
            <div>
              <h6 class="py-1">10.6<span class="percent">%</span></h6>
              <label>Unique Visits</label>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>
    </div><!-- row -->

    <div class="col-12 mg-t-20">
      <div class="card card-dash">
        <h6 class="card-title">Today’s Highlights</h6>
        <div class="d-flex flex-wrap p-4">
          <div class="col-6">
            <div class="dash-card-sm d-flex gap-2 py-1">
              <div class="dash-card-icon">
              <img class="p-2 rounded" width="50" height="50" src="<?= base_url('assets/img/member-w.png') ?>"
              alt="dashboard" />
              </div>
              <div class="pt-1">
                <p class="mb-0">New Members Joined Today</p>
                <h4 class="mb-0">5</h4>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="dash-card-sm d-flex gap-2 py-1">
              <div class="dash-card-icon">
              <img class="p-2 rounded" width="50" height="50" src="<?= base_url('assets/img/matched-w.png') ?>"
              alt="dashboard" />
              </div>
              <div class="pt-1">
                <p class="mb-0">Matches Made Today</p>
                <h4 class="mb-0">5</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 mg-t-20">
      <div class="card card-dash">
        <h6 class="card-title">New Members</h6>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="w-5">Sr No</th>
                <th>MmMR ID</th>
                <th>Date of Registration</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Membership Status</th>
              </tr>
            </thead>
            <tbody id="recentinvoices">
              <tr>
                <td>001</td>
                <td>001</td>
                <td>2025-02-05</td>
                <td>Test</td>
                <td>Test</td>
                <td>Internal</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-12 mg-t-20">
      <div class="card card-dash">
        <h6 class="card-title">Potential Matches <span>Year - 2025</span></h6>
        <div class="d-flex flex-wrap p-4">
        </div>
      </div>
    </div>
    <div class="col-12 mg-t-20">
      <div class="card card-dash">
        <h6 class="card-title">New Matched Profiles<span>Year - 2025</span></h6>
        <div class="d-flex flex-wrap p-4">
        </div>
      </div>
    </div>
    <!-- <div class="col-12 mg-t-20">
      <div class="card card-dash">
        <div class="">
          <ul class="nav nav-pills mb-3" id="pills-invoice-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-i-weekly-tab" data-bs-toggle="pill"
                data-bs-target="#pills-i-weekly" type="button" role="tab" aria-controls="pills-i-weekly"
                aria-selected="true">Invoice Weekly
                Statistics</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-i-weekly-tab" data-bs-toggle="pill" data-bs-target="#pills-i-monthly"
                type="button" role="tab" aria-controls="pills-i-monthly" aria-selected="false">Invoice Monthly
                Statistics</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-b-weekly-tab" data-bs-toggle="pill" data-bs-target="#pills-b-weekly"
                type="button" role="tab" aria-controls="#pills-b-weekly" aria-selected="false">Performa Weekly
                Statistics</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-b-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-b-monthly"
                type="button" role="tab" aria-controls="pills-b-monthly" aria-selected="false">Performa Monthly
                Statistics</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-i-weekly" role="tabpanel"
              aria-labelledby="pills-i-weekly-tab" tabindex="0">
              <div class="table-responsive">
                <table class="table align-items-center mb-0 ">
                  <tbody class="list">
                    <tr>
                      <td>
                        <h5 class="mb-0">Total</h5>
                        <p class="text-muted text-sm mb-0">Invoice Generated</p>
                      </td>
                      <td>
                        <h4 class="text-muted">₹</h4>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5 class="mb-0">Total</h5>
                        <p class="text-muted text-sm mb-0">Paid</p>
                      </td>
                      <td>
                        <h4 class="text-muted">₹ 0,00 </h4>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5 class="mb-0">Total</h5>
                        <p class="text-muted text-sm mb-0">Due</p>
                      </td>
                      <td>
                        <h4 class="text-muted">₹ 0,00 </h4>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-i-monthly" role="tabpanel" aria-labelledby="pills-i-monthly-tab"
              tabindex="0">
              <div class="table-responsive">
                <table class="table align-items-center mb-0 ">
                  <tbody class="list">
                    <tr>
                      <td>
                        <h5 class="mb-0">Total</h5>
                        <p class="text-muted text-sm mb-0">Invoice Generated</p>
                      </td>
                      <td>
                        <h4 class="text-muted">₹</h4>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-b-weekly" role="tabpanel" aria-labelledby="pills-b-weekly-tab"
              tabindex="0">
              <div class="table-responsive">
                <table class="table align-items-center mb-0 ">
                  <tbody class="list">
                    <tr>
                      <td>
                        <h5 class="mb-0">Total</h5>
                        <p class="text-muted text-sm mb-0">Performa Generated</p>
                      </td>
                      <td>
                        <h4 class="text-muted">₹ </h4>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-b-monthly" role="tabpanel" aria-labelledby="pills-b-monthly-tab"
              tabindex="0">
              <div class="table-responsive">
                <table class="table align-items-center mb-0 ">
                  <tbody class="list">
                    <tr>
                      <td>
                        <h5 class="mb-0">Total</h5>
                        <p class="text-muted text-sm mb-0">Performa Generated</p>
                      </td>
                      <td>
                        <h4 class="text-muted">₹</h4>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

  </div><!-- row -->

</div>
<script>
  $(function () {
    'use strict'
    var ctx1 = document.getElementById('chartBar1').getContext('2d');
    new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          data: [12, 25, 20, 32, 25, 18],
          backgroundColor: '#313131'
        }, {
          data: [22, 30, 25, 30, 20, 25],
          backgroundColor: '#cad0e8'
        }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false,
          labels: {
            display: false
          }
        },
        scales: {
          yAxes: [{
            display: false,
            ticks: {
              beginAtZero: false,
              fontSize: 10,
              max: 60,
              padding: 0
            }
          }],
          xAxes: [{
            gridLines: {
              display: false,
              borderDash: [10, 4],
              color: '#ced4da',
              drawBorder: false
            },
            barPercentage: 0.6,
            ticks: {
              beginAtZero: true,
              fontSize: 11,
              fontFamily: 'Arial'
            }
          }]
        }
      }
    });

    var ctx2 = document.getElementById('chartBar2').getContext('2d');
    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          data: [20, 25, 32, 18, 25, 23],
          backgroundColor: '#5c5a5a'
        }, {
          data: [22, 30, 25, 30, 20, 30],
          backgroundColor: '#1E2020'
        }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false,
          labels: {
            display: false
          }
        },
        scales: {
          yAxes: [{
            display: false,
            ticks: {
              beginAtZero: false,
              fontSize: 10,
              max: 60,
              padding: 0
            }
          }],
          xAxes: [{
            gridLines: {
              display: false,
              borderDash: [10, 4],
              color: '#ced4da',
              drawBorder: false
            },
            barPercentage: 0.6,
            ticks: {
              beginAtZero: true,
              fontSize: 11,
              fontFamily: 'Arial'
            }
          }]
        }
      }
    });   

  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= base_url('lib/chart.js/Chart.bundle.min.js') ?>"></script>


<?= $this->endSection("content") ?>