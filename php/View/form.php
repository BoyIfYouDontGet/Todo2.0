<?php
require_once(__DIR__ . "/../Model/config.php");
require_once(__DIR__ . "/../Controller/login-verify.php");
//We want our user that is not logged in to not have access to create a post
//The path variable is the path to outr project
if(!authenticateUser()) {
    header("Location: " . $path) . "index.php";
    die();
}
?>

<h1>Create  Blog  Post</h1>

<form method="post" action="<?php echo $path . "Controller/create-post.php"; ?>">
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title" />
        </div>
    
    <div>
        <label for="post">Post: </label>
        <textarea name="post"></textarea>
    </div>
    
    <div>
        <button type="submit">Submit</button>
    </div>
</form>