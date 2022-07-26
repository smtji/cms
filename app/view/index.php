<?php die('Access Denied'); ?>
<!Doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{$data}</title>
    <meta name="keywords" content="{$data}" />
    <meta name="description" content="{$data}" />
    <link rel="icon" type="image/x-icon" href="/assets/images/icon.svg" />
    <link rel="stylesheet" type="text/css" href="/assets/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/share.min.css" />
    <script type="text/javascript" src="/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery/jquery.share.min.js"></script>
    <script type="text/javascript" src="/assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="/assets/js/wow.min.js"></script>
</head>

<body>
    {include('header.php')}

    <h1>{$data}</h1>

    {include('banner.php')}

    {include('footer.php')}
</body>

</html>