<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <form action = "question4.php" method = "post" enctype = "multipart/form-data">
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        function displayImage() {
            $img = file_get_contents($_FILES["file"]["tmp_name"]);
            $filename = $_FILES["file"]["name"];
            file_put_contents("./$filename",$img);
            echo("<div id = \"divbg\" style = \"background-image:url('$filename')\">a</div>");
        }
        
        if( isset($_POST["submit"])) {
            displayImage();
        }
    ?>
</body>
</html>
