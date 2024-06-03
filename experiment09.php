<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Combined Program</title>
</head>
<body>
    <h1>PHP Combined Program</h1>
    
    <h2>PHP Information</h2>
    <p><a href="?action=phpinfo">Show PHP Info</a></p>
    
    <h2>Submit Your Information</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="age">Age:</label>
        <input type="text" id="age" name="age"><br><br>
        
        <label for="number">Enter a number to find its factorial:</label>
        <input type="text" id="number" name="number"><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'phpinfo') {
        // Display PHP information
        phpinfo();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $number = htmlspecialchars($_POST['number']);
        
        echo "<h2>Submitted Information</h2>";
        echo "Name: " . $name . "<br>";
        echo "Age: " . $age . "<br>";
        
        // Calculate factorial
        function factorial($n) {
            if ($n == 0) {
                return 1;
            } else {
                return $n * factorial($n - 1);
            }
        }
        
        if (is_numeric($number) && $number >= 0) {
            $factorial = factorial($number);
            echo "Factorial of " . $number . " is " . $factorial . "<br>";
        } else {
            echo "Please enter a valid non-negative number for factorial calculation.<br>";
        }
        
        // Demonstrate if-else and while loop
        echo "<h2>If-Else and While Loop Example</h2>";
        $exampleNumber = 10;
        if ($exampleNumber > 0) {
            echo "$exampleNumber is positive.<br>";
        } else {
            echo "$exampleNumber is not positive.<br>";
        }
        
        echo "Counting to 5:<br>";
        $count = 1;
        while ($count <= 5) {
            echo "$count ";
            $count++;
        }
    }
    ?>
</body>
</html>
