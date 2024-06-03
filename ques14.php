<!DOCTYPE html>
<html>
<head>
    <title>File Operations</title>
</head>
<body>

<?php
// Function to insert text into a text file
function insertText($filename, $text) {
    // Open the file in append mode
    $file = fopen($filename, "a") or die("Unable to open file!");
    // Write the text to the file
    fwrite($file, $text);
    // Close the file
    fclose($file);
}

// Function to read text from a text file
function readText($filename) {
    // Open the file for reading
    $file = fopen($filename, "r") or die("Unable to open file!");
    // Read the file contents
    $content = fread($file, filesize($filename));
    // Close the file
    fclose($file);
    return $content;
}

// Function to copy content from one file to another
function copyFile($source, $destination) {
    // Read content from source file
    $content = file_get_contents($source);
    // Write content to destination file
    file_put_contents($destination, $content);
}

// Define filenames
$textFile = "example.txt";
$copyFileSource = "source.txt";
$copyFileDestination = "destination.txt";

// Insert text into the text file
insertText($textFile, "This is a sample text. ");

// Read text from the text file
$readText = readText($textFile);

// Copy content from one file to another
copyFile($copyFileSource, $copyFileDestination);

// Display read text and copy status
echo "<h2>Read Text:</h2>";
echo "<p>$readText</p>";
echo "<p>Content copied from '$copyFileSource' to '$copyFileDestination'.</p>";
?>

</body>
</html>
