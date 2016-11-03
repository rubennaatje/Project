<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'projectam4b';
 
    try {
        $dbh = new PDO('mysql:host='. $hostname .';dbname='. $database, $username, $password);
    } catch(PDOException $e) {
        echo '<h1>An error has occurred.</h1><pre>', $e->getMessage() ,'</pre>';
    }
 
    $sth = $dbh->query('SELECT * FROM game ORDER BY highscore DESC LIMIT 10');
    $sth->setFetchMode(PDO::FETCH_ASSOC);
 
    $result = $sth->fetchAll();
 
    if(count($result) > 0) {
        foreach($result as $r) {
            echo "email: ", $r['email'], "\t naamspel: ", $r['naamspel'], "\t datum: ", $r['startdatumentijd'], "\t highscore: ", $r['highscore'], "\n <br>";
        }
    }
?>