<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobals in PHP</title>
</head>
<body>
    <h1>Superglobals in PHP</h1>

    <h2>$_SERVER</h2>
    <p>Server Name: <?php echo $_SERVER['SERVER_NAME']; ?></p>
    <p>Request Method: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>

    <h2>$_GET</h2>
    <form method="get" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <input type="submit" value="Submit">
    </form>
    <p>Name: <?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?></p>

    <h2>$_POST</h2>
    <form method="post" action="">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age">
        <input type="submit" value="Submit">
    </form>
    <p>Age: <?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?></p>

    <h2>$_SESSION</h2>
    <?php
    session_start();
    $_SESSION['user'] = "John Doe";
    ?>
    <p>Session User: <?php echo $_SESSION['user']; ?></p>

    <h2>$_COOKIE</h2>
    <?php
    setcookie("user", "Jane Doe", time() + 3600, "/"); // 1-hour expiry
    ?>
    <p>Cookie User: <?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : 'Cookie not set yet'; ?></p>

    <h2>$_REQUEST</h2>
    <p>Request Name: <?php echo isset($_REQUEST['name']) ? $_REQUEST['name'] : ''; ?></p>
    <p>Request Age: <?php echo isset($_REQUEST['age']) ? $_REQUEST['age'] : ''; ?></p>
</body>
</html>





















Superglobal variables in PHP are not objects with methods, so they do not have functions in the object-oriented sense. Instead, they are arrays that store specific types of information and are used in conjunction with PHP's array functions and other operations. Here are some common operations and functions you might use with these superglobal arrays:

### `$_GLOBALS`
The `$_GLOBALS` array references all variables available in the global scope. It is mainly used for accessing global variables inside functions and methods.

- **Access a Global Variable**:
  ```php
  $globalVar = "Hello, World!";
  function test() {
      echo $GLOBALS['globalVar'];
  }
  test(); // Outputs: Hello, World!
  ```

### `$_SERVER`
The `$_SERVER` array contains information about headers, paths, and script locations.

- **Common Elements**:
  ```php
  echo $_SERVER['PHP_SELF']; // The filename of the currently executing script
  echo $_SERVER['SERVER_NAME']; // The name of the server host
  echo $_SERVER['HTTP_USER_AGENT']; // The user agent string of the browser
  echo $_SERVER['REMOTE_ADDR']; // The IP address from which the user is viewing the page
  ```

### `$_GET`
The `$_GET` array is an associative array of variables passed to the current script via the URL parameters (query string).

- **Access Query Parameters**:
  ```php
  // URL: http://example.com/test.php?name=John
  echo $_GET['name']; // Outputs: John
  ```

### `$_POST`
The `$_POST` array is an associative array of variables passed to the current script via the HTTP POST method.

- **Access Form Data**:
  ```php
  // HTML form: <form method="post"><input name="name"></form>
  echo $_POST['name']; // Outputs the value of the input field 'name'
  ```

### `$_FILES`
The `$_FILES` array is an associative array of items uploaded to the current script via the HTTP POST method.

- **Handle File Upload**:
  ```php
  // HTML form: <input type="file" name="fileToUpload">
  if ($_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
      $tmp_name = $_FILES['fileToUpload']['tmp_name'];
      $name = basename($_FILES['fileToUpload']['name']);
      move_uploaded_file($tmp_name, "uploads/$name");
  }
  ```

### `$_COOKIE`
The `$_COOKIE` array is an associative array of variables passed to the current script via HTTP cookies.

- **Set and Access Cookies**:
  ```php
  setcookie("user", "John Doe", time() + 3600, "/"); // Set a cookie
  echo $_COOKIE['user']; // Access the cookie value
  ```

### `$_SESSION`
The `$_SESSION` array is an associative array containing session variables available to the current script.

- **Start a Session and Use Session Variables**:
  ```php
  session_start();
  $_SESSION['user'] = "John Doe";
  echo $_SESSION['user']; // Outputs: John Doe
  ```

### `$_REQUEST`
The `$_REQUEST` array contains the contents of `$_GET`, `$_POST`, and `$_COOKIE`.

- **Access Request Data**:
  ```php
  // URL: http://example.com/test.php?name=John
  echo $_REQUEST['name']; // Outputs: John
  // HTML form: <form method="post"><input name="age"></form>
  echo $_REQUEST['age']; // Outputs the value of the input field 'age'
  ```

### `$_ENV`
The `$_ENV` array is an associative array of variables passed to the current script via the environment method.

- **Access Environment Variables**:
  ```php
  echo $_ENV['PATH']; // Outputs the system PATH environment variable
  ```

### Practical Examples Using Functions

Here are some practical examples demonstrating functions used with these superglobals:

#### Example: Display Server Information
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info</title>
</head>
<body>
    <h1>Server Information</h1>
    <p>PHP Self: <?php echo $_SERVER['PHP_SELF']; ?></p>
    <p>Server Name: <?php echo $_SERVER['SERVER_NAME']; ?></p>
    <p>HTTP User Agent: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
    <p>Remote Address: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
</body>
</html>
```

#### Example: Form Handling with `$_GET` and `$_POST`
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
</head>
<body>
    <h1>Form Handling</h1>
    <form method="get" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <input type="submit" value="Submit">
    </form>
    <p>Name from GET: <?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?></p>

    <form method="post" action="">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age"><br><br>
        <input type="submit" value="Submit">
    </form>
    <p>Age from POST: <?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?></p>
</body>
</html>
```

#### Example: File Upload with `$_FILES`
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>
    <form method="post" enctype="multipart/form-data" action="">
        <label for="fileToUpload">Select a file:</label>
        <input type="file" id="fileToUpload" name="fileToUpload"><br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['fileToUpload']['tmp_name'];
            $name = basename($_FILES['fileToUpload']['name']);
            move_uploaded_file($tmp_name, "uploads/$name");
            echo "File uploaded successfully: $name";
        } else {
            echo "File upload failed!";
        }
    }
    ?>
</body>
</html>
```

#### Example: Working with Sessions
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Example</title>
</head>
<body>
    <h1>Session Example</h1>
    <?php
    session_start();
    if (!isset($_SESSION['views'])) {
        $_SESSION['views'] = 0;
    }
    $_SESSION['views']++;
    echo "Page views: " . $_SESSION['views'];
    ?>
</body>
</html>
```

These examples illustrate the basic operations you can perform using PHP superglobal arrays. They show how you can access and manipulate different types of data in a web application context.