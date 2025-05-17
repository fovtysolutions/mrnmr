<?php 
    $db = \Config\Database::connect();
    $setting = $db->table('setting')->get();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo _ec((!empty($setting->title) ? $setting->title : null)) ?> :: <?php echo _ec((!empty($title) ? $title : null)) ?></title>
        <link rel="icon" href="<?= base_url() ?>/images/favicon1.png" type="image/gif" sizes="20x20">
        <?php _ec( $this->include('Backend\Admin\Views\css'), false )?>
    </head>
    <body class="az-body az-light">
        <div class="">
            <?=$content?>
        </div>
        <?php _ec( $this->include('Backend\Admin\Views\script'), false )?>
    </body>
</html>