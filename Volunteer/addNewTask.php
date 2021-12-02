









<?php

include 'ManageTaskName.php';


//connect to database
//select database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');


if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}


$newTask = $_POST['newtaskname'];
$tasknamelegal = True;




//if (!empty($newTask)) {
	
	//NEEd code to say that if task is the same dont insert
	
		/// there should be a loop that checks if the taskname is the same as the one on database, if so trigger an error message
	$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table");
    while($rowtasks=mysqli_fetch_array($tasks_table_results)) {
		$taskid = $rowtasks['task_id'];
	    $taskname = $rowtasks['task_name'];
		
		if ($taskname == $newTask || empty($newTask)){		
			$tasknamelegal = False;	
		
	    }
		
		
		if (strcasecmp($taskname,$newTask) == 0) {
			$tasknamelegal = False;	
		}
		
		
	}

//}



if ($tasknamelegal == False){
	echo "Error: Task Names must be unique or cannot be empty";
}


if ($tasknamelegal == True) {
	$sql = "INSERT INTO tasks_table (task_name) VALUES ('$newTask')";
		    //execute the query
			if(mysqli_query($db,$sql))
				header("refresh:3; url=ManageTaskName.php");
		
	        else
				echo "Task Name Not Updated";
			
			echo $newTask. "   Successfully  Added";
}






?>