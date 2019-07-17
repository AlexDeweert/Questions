<?php 

    // QUESTION 5
    echo "Result: <br>";
    if(isset($_POST['action'],$_POST['name'],$_POST['breed'],$_POST['height'],$_POST['weight'],$_POST['age'])) {
        $action = $_POST['action'];
        $name = $_POST['name'];
        $breed = $_POST['breed'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $age = $_POST['age'];
        $actionclean = filter_var(trim($action), FILTER_SANITIZE_STRING);
        $nameclean = filter_var(trim($name), FILTER_SANITIZE_STRING);
        $breedclean = filter_var(trim($breed), FILTER_SANITIZE_STRING);
        $heightclean = filter_var(trim($height), FILTER_VALIDATE_INT,array('options' => array('min_range' => 1)));
        $weightclean = filter_var(trim($weight), FILTER_VALIDATE_INT,array('options' => array('min_range' => 1)));
        $ageclean = filter_var(trim($age), FILTER_VALIDATE_INT,array('options' => array('min_range' => 1)));

        if( empty($actionclean) || empty($nameclean) || empty($breedclean) || empty($heightclean) || empty($weightclean) || empty($ageclean) ) {
            echo("Error: Invalid input. Input must be strings or positive integers<br>");
        }
        else {
            echo("All input valid and sanitized<br>");
            echo("Post Received<br>");
            echo("Sanitized action: $actionclean<br>");
            echo("Sanitized name: $nameclean<br>");
            echo("Sanitized breed: $breedclean<br>");
            echo("Sanitized height: $heightclean<br>");
            echo("Sanitized weight: $weightclean<br>");
            echo("Sanitized age: $ageclean<br>");
            $vars = array($actionclean,$nameclean,$breedclean,$heightclean,$weightclean,$ageclean);
            echo("vars array: " . implode(", ",$vars) . "<br>");

            addHorseToDatabase($vars);
        }
    }
    else {
        $_POST = array();
        echo "No post";
    }
    echo "<p>";

?>

<form action = "question5.php" method = "post">
    <input name = "action" type = "text" placeholder = "Action"><br>
    <input name = "name" type = "text" placeholder = "Name"><br>
    <input name = "breed" type = "text" placeholder = "Breed"><br>
    <input name = "height" type = "text" placeholder = "Height"><br>
    <input name = "weight" type = "text" placeholder = "Weight"><br>
    <input name = "age" type = "text" placeholder = "Age">
    <input type = "submit">
</form>
