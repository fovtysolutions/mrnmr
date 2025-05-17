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
        <?php
            $path = 'inc/Core/';
            $map  = directory_map($path);
            if (is_array($map) && sizeof($map) > 0)
            foreach ($map as $key => $value) {
                $css  = str_replace("\\", '/', $path.$key.'assets/css/style.css');  
                if (file_exists($css)) {
                    echo "<link href=".base_url($css)." rel=\"stylesheet\">";
                }   
            }   
        ?>
        <?php _ec( $this->renderSection('frontcss'), false )?>
    </head>
    <body class="az-body az-light">
        <?php _ec( $this->include('Backend\Admin\Views\sidebar'), false )?>
        <div class="az-content az-content-dashboard-six">
            <?php _ec( $this->include('Backend\Admin\Views\header'), false )?>
            <?=$content?>
        </div>
        <?php // _ec( $this->include('Backend\Admin\Views\footer'), false )?>
        <?php
            $path = 'inc/Core/';
            $map  = directory_map($path);
            if (is_array($map) && sizeof($map) > 0)
            foreach ($map as $key => $value) {
                $script  = str_replace("\\", '/', $path.$key.'assets/js/script.js');  
                if (file_exists($script)) {
                    echo "<link href=".base_url($script)." rel=\"stylesheet\">";
                }   
            }   
        ?>
        <?php _ec( $this->include('Backend\Admin\Views\script'), false )?>
        <?php _ec( $this->renderSection('script'), false )?>
    </body>
</html>