<?php include 'header.php'; 

?>
  
<div class="container-fluid text-center">
  <div class="row content">

    <div class="col-sm-8 text-left">
      <h1>Admin</h1>
      
      <hr>
    </div>
  </div>
</div>
<?php include 'footer.php' ;?>
</body>
</html>

 <?php
	require_once("classes/Database.php");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectam4b";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    } 

    $sql2 = "SELECT * FROM users";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
                
             echo "<h5>id: " . $row["user_id"]. "<br> naam: " . $row["user_name"]. "<br> email: " . $row["user_email"]. "<br><h5>";
         
             
         }
    } else {
         echo "0 results";
    }
    $conn->close();
?>