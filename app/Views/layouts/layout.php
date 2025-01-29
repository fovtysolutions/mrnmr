<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include("layouts/css") ?>
    <link rel="icon" id="favicon" href="<?=base_url('assets/img/logo.png')?>">
    <style>
        @media (min-width: 1200px) {
            .az-iconbar-aside.show + .az-content {
                margin-left: 294px;
            }
        }
    </style>
</head>
    <body class="az-body az-light">
        <?= $this->include("layouts/sidebar") ?>
        <div class="az-content az-content-dashboard-six">
            <?= $this->include("layouts/header") ?>
            <?= $this->renderSection("content") ?>
        </div>
        <!-- Scripts -->
        <?= $this->include("layouts/script") ?>
    </body>
</html>