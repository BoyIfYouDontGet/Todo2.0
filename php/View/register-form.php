<?php
require_once(__DIR__ . "/../Model/config.php");
?>

<h1>Register</h1>

<form method="post" action="<?php echo $path . "Controller/create-user.php"; ?>">
    <div>
        <label for="email">Email: </label>
        <input type="text" name="email" />
        </div>
    
    <div>
        <label for="username">Username: </label>
        <input type="text" name="username" />
        </div>
    
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" />
    </div>
    
    <div>
        <button type="submit" class="btn btn-large">Submit</button>
    </div>
</form>