<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="shortcut icon" href="" />
    <script type="text/javascript">
        var PATH  = '<?php _ec( base_url()."/" )?>';
        var csrf = "<?php _ec( csrf_hash() ) ?>";
    </script>
</head>
<body>
	<?=$content?>
</body>
</html>