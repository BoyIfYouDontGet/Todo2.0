<html>
<head>
   <title></title>
</head>
<body>
<?php
   require_once (__DIR__ . "/../Model/config.php");
   $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
   $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
// someone picks a new username then the query makes the password.
   $query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username'");
   if($query->num_rows == 1) {
      $row = $query->fetch_array();
      if($row["password"] === crypt($password, $row["salt"])) {
         $_SESSION["authenticated"] = true;
         echo "<p>Login Successful!</p>";
      }
      else {
         echo "<p>Invalid username and password</p>";
      }
   }
      else {
         echo "<p>Invalid username and password</p>";
      }
   
?>
<a href="http://localhost/Todo2/index.php">
<button type="button" class="btn btn-primary">Continue</button>
</body>
</html>