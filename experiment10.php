<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="process.php" method="post">
    <select name="colors[]" multiple>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
    </select>
    <input type="submit" value="Submit">
</form>
<?php
if(isset($_POST['colors'])) {
    $colors = $_POST['colors'];
    echo "Selected colors: " . implode(", ", $colors);
} else {
    echo "No colors selected.";
}
?>


<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
echo "Cookie 'user' is set!";
?>
<?php
header("Location: https://www.google.com");
exit();
?>
<?php
// Function definition
function greet($name) {
    echo "Hello, $name!";
}

// Function call
greet("Alice");
?>

</body>
</html>