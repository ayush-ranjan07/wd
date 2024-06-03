<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File Upload</title>
</head>
<body>
<h2>Upload a File</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload File" name="submit">
</form><?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;  }
  if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
  if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
      echo "Uploaded Image:<br>";
     echo '<img src="' . $target_file . '" alt="Uploaded Image" style="max-width: 500px; max-height: 500px;">';  } else {
            echo "Sorry, there was an error uploading your file.";     }
}
}
?></body>
</html>