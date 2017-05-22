<!DOCTYPE html>
<html>
<head>
    <title></title>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
session_start();
session_destroy();
header('Location: http://www.mytest.me/Facebook-Login/');
?>

</body>
</html>
