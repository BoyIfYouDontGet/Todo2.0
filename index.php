<!DOCTYPE>
<html>
<head>
<title> To-Do2 List</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="col-xs-2">
					<nav class="list-group">
						<a class="list-group-item" href="login.php"> Login </a>
						<a class="list-group-item" href="logout-user.php"> Logout </a>
						<a class="list-group-item" href="register.php"> Register </a>
						
						</nav>
			</div>


<div class="wrap">
	<div class="task-list">
	<ul>
	<?php require("includes/connect.php"); 
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
	$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
	if ($result = $mysqli->query($query)) {
		$numrows = $result->num_rows;
		if ($numrows>0) {
			while($row = $result->fetch_assoc()){
				$task_id = $row['id'];
				$task_name = $row["task"];
				echo '<li>
				<span>'.$task_name.'</span>
                <img id="'.$task_id.'"" class="delete-button" width="10px" src="images/close.svg"/>
				</li>';
			}
		}
	}
	?>
	</ul>
</div>
<form class="add-new-task" autocomplete="off">
<input type="text" name="new-task" placeholder="Add new item..."/>
</form>
</div>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); 
	function add_task(){
		$('.add-new-task').submit(function(){
var new_task = $('.add-new-task input[name=new-task]').val();
if (new_task != '') {
	$.post('includes/add-task.php', {task: new_task}, function(data){
$('add-new-task input[name=new-task]').val();
	$(data).appendTo('.task-list ul').hide().fadeIn();
	});
}
return false;
		});
	}
	$('.delete-button').click(function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');
		$.post('includes/delete-task.php', {id: task_id}, function(){
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
});
</script>

<?php
require_once(__DIR__ . "/php/Controller/login-verify.php");
require_once(__DIR__ . "/php/View/header.php");
if(authenticateUser()){
require_once(__DIR__ . "/php/View/navigation.php");
}
require_once(__DIR__ . "/php/Controller/create-db.php");
require_once(__DIR__ . "/php/View/footer.php");
require_once(__DIR__ . "/php/Controller/read-posts.php");
?>

</html>