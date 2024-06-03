<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_COOKIE['last_visited'])) {
    $last_visited = $_COOKIE['last_visited'];
    echo "Welcome back! You last visited on: " . $last_visited;
} else {
    echo "Welcome! This is your first visit.";
}


$current_date_time = date("Y-m-d H:i:s");
setcookie("last_visited", $current_date_time, time() + (86400 * 30), "/"); 
?>

</body>
</html>