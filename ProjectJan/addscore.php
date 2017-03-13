<?php 
     /*   $db = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error()); 
        mysqli_select_db($db, 'sqltest') or die('Could not select database');
 
        $name = $_GET['name'];
        $score = $_GET['score']; 
        $hash = $_GET['hash']; 
 
        $secretKey="mySecretKey";

        $real_hash = md5($name . $_GET['score'] . $secretKey); 
        if($real_hash == $hash) {
            $query = "insert into scores values (NULL, '$name', '$score');"; 
            $result = mysqli_query($db, $query) or die('Query failed: ' . mysqli_error()); 
        }*/
?>

<?php 
        $db = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error()); 
        mysqli_select_db($db, 'projectam4b') or die('Could not select database');
 
        $email = $_GET['email'];
        $naamspel = 'Oils Well';
        $startdatumentijd = $_GET['startdatumentijd'];
        $einddatumentijd = date("Y-m-d H:i:s");
        $highscore = $_GET['highscore'];
        $hash = $_GET['hash'];
 
        $secretKey="mySecretKey";

        $real_hash = md5($email . $secretKey);
        if($real_hash == $hash) { 
            $query = "insert into game values (NULL, '$email', '$naamspel', '$startdatumentijd', '$einddatumentijd', '$highscore');";
            
            $result = mysqli_query($db, $query) or die('Query failed: ' . mysqli_error()); 
        }else{
            echo "verkeerde hash";
        }
?>
