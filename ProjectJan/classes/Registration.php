<?php
	require_once("Database.php");

class Registration
{
    
    private $user_name;
    private $user_email;
    private $user_password_hash;
    private $user_role;
    private $activated;

    //Properties
    public function getUser_name() { return $this->user_name; }
    public function getUser_email() { return $this->user_email;}
    public function getUser_password_hash() { return $this->user_password_hash; }
    public function getUser_role() { return $this->user_role; }
    public function getActivated() { return $this->activated;}

    public function setUser_name($value) { $this->user_name = $value; }
    public function setUser_email($value) { $this->user_email = $value;}
    public function setUser_password_hash($value) { $this->user_password_hash = value; }
    public function setUser_role($value) { $this->user_role = $value; }
    public function setActivated($value) { $this->activated = $value;}

    private $db_connection = null;

    public $errors = array();

    public $messages = array();

    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }


    private function registerNewUser()
    {
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Empty Username";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Empty Password";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Password and password repeat are not the same";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Password has a minimum length of 6 characters";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Email cannot be empty";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $user_name = $this->db_connection->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                $user_password = $_POST['user_password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that username / email address is already taken.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_name, user_password_hash, user_email)
                            VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');";
                    $query_new_user_insert = $this->db_connection->query($sql);
                    
                    self::send_email($user_name, $user_email);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = "Your account has been created successfully. You can now log in.";
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
    }
    
    
    private static function send_email($user_name, $user_email)
		{
            $to = "$user_email";
			$subject = "Activatiemail Oil's Well";
			$message = "Geachte heer/mevrouw<br>";
												
			$message .= '<style>a { color:red;}</style>';
			$message .= "Hartelijk dank voor het registreren bij Oil's Well"."<br>";
			$message .= "U kunt de registratie voltooien door op de onderstaande"."<br>";
			$message .= "activatielink te klikken:"."<br>";
			
            $message .= "klik <a href='http://localhost/2016-2017/Projectimplementatie/activate.php?&user_name=".$user_name."'>hier</a> om uw account te activeren"."<br>";
			
			$message .= "Met vriendelijke groet,"."<br>";
			$message .= "Jan Schollaert"."<br>";
		
			$headers = 'From: no-reply@oilswell.nl'."\r\n";
        
			$headers .= "Content-type: text/html; charset=iso-8859-1"."\r\n";		
			$headers .= 'X-Mailer: PHP/' . phpversion();			
			
			mail($to, $subject, $message, $headers); 
		}
    
		public static function check_if_activated($user_name)
		{
			global $database;
			
			$query = "SELECT `activated`
					  FROM	 `users`
					  WHERE	 `user_name` = '".$user_name."'";
					  
			$result = $database->fire_query($query);			
			$record = mysqli_fetch_array($result);
			
			return ( $record['activated'] == 'no') ? true : false;
		}
    
		public static function activate_account_by_user_name($user_name)
		{
			global $database;
			$query = "UPDATE `users`
					  SET `activated` = 'yes'
					  WHERE `user_name` = '".$user_name."'";
					  
			$database->fire_query($query);
			
		}
}
