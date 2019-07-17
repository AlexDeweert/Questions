<?php 
    //QUESTION 6
    function addHorseToDatabase($vars) {

        try {
            $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

            $preparedStatement = $dbh->prepare("INSERT INTO horse (action,name,breed,height,weight,age) VALUES (:action,:name,:breed,:height,:weight,:age)");
            $preparedStatement->bindParam(':action',$vars[0]);
            $preparedStatement->bindParam(':name',$vars[1]);
            $preparedStatement->bindParam(':breed',$vars[2]);
            $preparedStatement->bindParam(':height',$vars[3]);
            $preparedStatement->bindParam(':weight',$vars[4]);
            $preparedStatement->bindParam(':age',$vars[5]);

            $stmt->execute();

            //Could do more here to disconnect properly
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
?>
