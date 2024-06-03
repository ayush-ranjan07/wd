<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $file_name = "example.txt";
        $content = "Hello this is a example text";
        $file = fopen($file_name,"w");
        
        if($file){
            fwrite($file_name,$content);
            fclose($file);
            echo "The file is written. <br>" ;
        }
        else{
            echo "The file cannot be opened";
        }

        $file = fopen($file_name,"r");
        if($file){
            $filecontent = fread($file,filesize($file_name));
            fclose($file);
            echo "The content of the file:";
            echo nl2br(htmlspecialchars($filecontent));
        }
        else{
            echo "The file cannot be opened";
        }
    ?>
</body>
</html>
