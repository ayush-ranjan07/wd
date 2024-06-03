<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();


if(isset($_SESSION['page_views'])) {
    $_SESSION['page_views']++;
} else {
    $_SESSION['page_views'] = 1;
}

echo "Page views: " . $_SESSION['page_views'];
?>
</body>
</html>