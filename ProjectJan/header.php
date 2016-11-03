<head>
  <title>Home</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='./stylesheets/style.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  
</head>
    <?php // include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");

$login = new Login();

if ($login->isUserLoggedIn() == true) {
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Home</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='./stylesheets/style.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  
</head>
<body>
    <nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='/2016-2017/Projectimplementatie/index.php'><span class='glyphicon glyphicon-home'></span></a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='/2016-2017/Projectimplementatie/index.php'>Home</a></li>
        <li><a href='/2016-2017/Projectimplementatie/about.php'>About</a></li>
        <li><a href='/2016-2017/Projectimplementatie/download.php'>Download</a></li>
        <li><a href='/2016-2017/Projectimplementatie/register.php'>Register</a></li>
        <li><a href='/2016-2017/Projectimplementatie/login.php'>Login</a></li>
        <li><p class='white'>Koop snel de nieuwe 'Olie dropjes' voor maar €1.50.</p></li>
      </ul>
    </div>
  </div>
</nav>";

} 
else if ($login->isUserAdmin() == true){
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Home</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/web/stylesheets/style.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  
</head>
<body>
    <nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='/2016-2017/Projectimplementatie/index.php'><span class='glyphicon glyphicon-home'></span></a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='/2016-2017/Projectimplementatie/index.php'>Home</a></li>
        <li><a href='/2016-2017/Projectimplementatie/about.php'>About</a></li>
        <li><a href='/2016-2017/Projectimplementatie/download.php'>Download</a></li>
        <li><a href='/2016-2017/Projectimplementatie/register.php'>Register</a></li>
        <li><a href='/2016-2017/Projectimplementatie/admin.php'>Admin</a></li>
        <li><a href='/2016-2017/Projectimplementatie/login.php'>Login</a></li>
        <li><p class='white'>Koop snel de nieuwe 'Olie dropjes' voor maar €1.50.</p></li>
      </ul>
    </div>
  </div>
</nav>";
}else {
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Home</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/web/stylesheets/style.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  
</head>
<body>
    <nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='/2016-2017/Projectimplementatie/index.php'><span class='glyphicon glyphicon-home'></span></a>
    </div>
    <div class='collapse navbar-collapse' id='myNavbar'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='/2016-2017/Projectimplementatie/index.php'>Home</a></li>
        <li><a href='/2016-2017/Projectimplementatie/about.php'>About</a></li>
        <li><a href='/2016-2017/Projectimplementatie/register.php'>Register</a></li>
        <li><a href='/2016-2017/Projectimplementatie/login.php'>Login</a></li>
        <li><p class='white'>Koop snel de nieuwe 'Olie dropjes' voor maar €1.50.</p></li>
      </ul>
    </div>
  </div>
</nav>";
}
?>