<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Database Operations</title>
</head>
<body>
<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Part 1: Create a File and Write Data into It
$filename = "example.txt";
$text_to_write = "Hello, this is a test of writing to a file.";
$file = fopen($filename, "w");

if ($file) {
    fwrite($file, $text_to_write);
    fclose($file);
    echo "Text has been written to the file.<br>";
} else {
    echo "Unable to open the file for writing.<br>";
}

// Part 3: Connect to the Database in MySQL using PHP
$servername = "localhost";
$username = "root";  // Change this if you use a different username
$password = "";      // Change this if you use a different password
$dbname = "employee_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the database.<br>";

// Part 4: CRUD Operations Using PHP

// Insert Data
$sql = "INSERT INTO employees (name, position, salary) VALUES ('John Doe', 'Manager', 50000.00)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Read Data
$sql = "SELECT id, name, position, salary FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Position: " . $row["position"]. " - Salary: " . $row["salary"]. "<br>";
    }
} else {
    echo "0 results";
}

// Update Data
$sql = "UPDATE employees SET salary = 60000.00 WHERE name = 'John Doe'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully.<br>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Delete Data
$sql = "DELETE FROM employees WHERE name = 'John Doe'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.<br>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
</body>
</html>

<!-- 
CREATE DATABASE employee_db;

USE employee_db;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    position VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL
); -->

</body>
</html>