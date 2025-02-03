<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include("layouts/css") ?>
    <link rel="icon" id="favicon" href="<?=base_url('assets/img/logoicon.png')?>">
    <title>MR & MR</title>
</head>
    <body class="az-body az-light">
        <div>
            <?= $this->renderSection("auth_content") ?>
        </div>
        <!-- Scripts -->
        <?= $this->include("layouts/script") ?>
    </body>
</html>