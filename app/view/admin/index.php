<?php die('Access Denied'); ?>
<!Doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{$data}</title>
    <meta name="keywords" content="{$data}" />
    <meta name="description" content="{$data}" />
</head>

<body>
    {include('admin/header.php')}

    <h1>{$data}</h1>

    {include('admin/footer.php')}
</body>

</html>