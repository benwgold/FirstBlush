<!DOCTYPE html>
<html>
<head>
    <title>Facebook Sweetness</title>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
    <script src="/assets/js/global.js" type="text/javascript"></script>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/assets/css/site-specific.css" rel="stylesheet" media="screen">
    <script src="/assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/assets/css/jquery.rondell.css" type="text/css" media="all" title="Screen"/>
    <script type="text/javascript" src="/assets/js/modernizr-2.0.6.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.rondell.js"></script>
</head>
<body>
    <div class="container">
            <h1 class="text-center">first blush</h1>
            <?php if (isset($logout_url)):  ?>
                <a href="<?php echo $logout_url?>">Logout of this thing</a>
                <br/>
            <?php endif; ?>