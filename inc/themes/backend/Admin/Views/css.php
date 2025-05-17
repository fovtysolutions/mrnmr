<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?= csrf_hash() ?>">
<title>Document</title>
<link rel="icon" href="<?= base_url() ?>/images/favicon1.png" type="image/gif" sizes="20x20">
<!-- Vendor CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/ionicons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
<link href="<?= base_url('assets/lib/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/lib/typicons.font/typicons.css') ?>" rel="stylesheet" type="text/css" />
<!-- Azia CSS -->
<link href="<?= base_url('assets/css/azia.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />

<!-- tostr css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
  /* Loader */
  .loader-dots-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  width: 100%;
  padding: 15px;
}

.dot {
  height: 14px;
  width: 14px;
  margin-right: 10px;
  border-radius: 50%;
  animation: pulse 1.5s infinite ease-in-out;
}

.dot:last-child {
  margin-right: 0;
}

/* Apply different colors to each dot */
.dot:nth-child(1) { background-color: #adb5bd; animation-delay: -0.3s; }
.dot:nth-child(2) { background-color: #6c757d; animation-delay: -0.2s; }
.dot:nth-child(3) { background-color: #495057; animation-delay: -0.1s; }
.dot:nth-child(4) { background-color: #343a40; animation-delay: 0s; }
.dot:nth-child(5) { background-color: #212529; animation-delay: 0.1s; }

@keyframes pulse {
  0% {
    transform: scale(0.8);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2);
  }
  50% {
    transform: scale(1.2);
    box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
  }
  100% {
    transform: scale(0.8);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2);
  }
}

  /* Loader */

  .controls-pages-cnt select {
    color: #202125;
    padding: 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    /* // width: max-content; */
    height: 38px;
    border-width: 0;
    background-color: #e9ecef;
    margin-left: 0;
    font-weight: 500;
    border-radius: 0;
    position: relative;
    z-index: 1;
    /* Ensure the select element is above dropdown options */

  }

  .controls select:focus {
    border-color: #007BFF;
    outline: none;
    background-color: #f9f9f9;
    /* Light background when dropdown is open */
  }

  /* Hover effect on select box */
  .controls select:hover {
    background-color: #f1f1f1;
  }

  /* Custom styles for the options inside the select */
  .controls select option {
    padding: 8px;
    font-size: 14px;
    background-color: #ffffff;
    /* Default background for options */
    color: #596882;
    /* Default text color */
    transition: background-color 0.2s, color 0.2s;
    /* Smooth transition for hover and active states */
  }

  /* Hover effect on options when the dropdown is open */
  .controls select option:hover {
    background-color: #007BFF;
    /* Background color when hovering over an option */
    color: #fff;
    /* Text color when hovering */
  }

  /* Active state for the option when selected */
  .controls select option:active {
    background-color: #0056b3;
    /* Darker blue background when the option is actively selected */
    color: #fff;
    /* White text for active option */
  }

  /* sider active link */

  .az-iconbar-body .nav-sub .nav-sub-item.active>.nav-sub-link {
    color: #3e9142;
    ;
  }

  /* Login page */

  .az-column-signup {
    padding: 20px 40px;
    width: 600px;
    height: 100vh;
  }
  .az-signup-header h2{
    color: #000000;

 }  
 .az-column-signup .btn-primary {
    background: #000000;
    padding: 12px 35px !important;
    font-size: 15px !important;
    margin-top: 12px !important;
  }

  .az-column-signup-left {
    background-image: url('../assets/img/bg-auth.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    /* Ensure content is on top of the background image */
    z-index: 1;
  }

  .az-column-signup-left::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-image: linear-gradient(#0a6ab4c4,rgba(240, 240, 240, 0.76)); */
    background-image: url('../assets/img/bg-auth.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    z-index: 1;
    transform: scaleX(-1);
    pointer-events: none;
  }

  .az-column-signup-left>div {
    position: relative;
    z-index: 2;
    padding: 20px;
    color: white;
  }
  .az-column-signup-left h2{
    font-family: "Bebas Neue", sans-serif;
    font-size: 45px;
    font-weight: 700;
    color: #fff;
    line-height: 1.3;
  }

  .btn-outline-indigo {
    border-color: white;
    color: white;
  }

  .btn-outline-indigo:hover,
  .btn-outline-indigo:focus {
    background-color: white;
    color: #086BAF;
  }

  .password-container {
    position: relative;
  }

  .toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #888;
  }

  .toggle-password:hover {
    color: #555;
  }

  /* Login page */

  /* Timeline section */
  .timeline-wrapper {
    position: relative;
  }

  .timeline-line {
    position: absolute;
    left: 20px;
    top: 30px;
    width: 2px;
    background-color: #d4d9df;
    height: calc(100% - 30px);
  }

  .timeline-entry {
    margin: 20px 0;
    position: relative;
    padding-left: 50px;
  }

  .timeline-icon {
    position: absolute;
    left: 0;
    top: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 24px;
  }

  .timeline-entry-1 .timeline-icon {
    background-color: #418F43;
  }

  .timeline-entry-2 .timeline-icon {
    background-color: #035185;
  }

  .timeline-entry-3 .timeline-icon {
    background-color: #418F43;
  }

  .timeline-entry-4 .timeline-icon {
    background-color: #035185;
  }

  .timeline-entry-5 .timeline-icon {
    background-color: #418F43;
  }

  .timeline-content {
    background: #f8f9fa;
    border-radius: 5px;
    padding: 10px;
    position: relative;
  }

  label.col-form-label span {
    color: red;
    margin-right: 2px;
  }

  .current {
    color: #ffffff;
    background-color: #418f43;
  }

  /* Timeline section */
  .nav-link {
    padding: 1rem 0;
  }

  /* Extra Large Devices (Desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {}

  /* Large Devices (Laptops, 992px and up) */
  @media only screen and (min-width: 992px) and (max-width: 1199px) {}

  /* Medium Devices (Tablets, 768px and up) */
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .az-content .az-content-profile .container{
      flex-direction: column;
    }
  }

  /* Small Devices (Landscape phones, 576px and up) */
  @media only screen and (min-width: 576px) and (max-width: 767px) {}

  /* Extra Small Devices (Portrait phones, less than 576px) */
  @media only screen and (max-width: 575px) {
    .nav .circle {
      width: 30px !important;
      height: 30px !important;
      font-size: 12px !important;
    }

    .nav .stepper {
      flex-wrap: nowrap !important;
    }

    .nav .flex-column {
      flex-direction: row !important;
    }

    .nav-link {
      padding: 0px;
    }

    .stepper {
      align-items: unset;
    }

    .stepper::before {
      top: 30%;
    }

    .step::before {
      top: 30%;
    }

    .step-text {
      display: block;
      padding-top: 0px;
      margin-top: 0px;
    }

    /* card */
    .card-body {
      padding: 0px;
    }

    .card .customer-card td {
      font-size: 12px !important;
    }

    .customer-card.table th,
    .table td {
      padding: 9px 10px;
      font-size: 12px;
    }
  }
</style>