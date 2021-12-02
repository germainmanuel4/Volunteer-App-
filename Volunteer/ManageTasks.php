






<?php

 $time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");
    while($rowtimeslots=mysqli_fetch_array($time_slots_table_results))
    {
		
		$variable2 = $rowtimeslots['time_slot_id'];
		if ($variable1 == $variable2) {
			
			//echo $rowtimeslots["time_slot_name"];
			/*?>
			
			echo 
	        <tr>
			<td><?php echo $rowtimeslots["time_slot_name"]; ?></td>
			<td><?php echo $rowvolunteertimes["task_id"]; ?></td>
			<td><?php echo $rowvolunteertimes["description"]; ?></td>
			<td><?php echo<a href=delete.php?id=".$rowvolunteertimes['time_id'].">Remove</a> ?></td>
	        </tr>
	        <?php */
			
			echo "<tr>";
			echo "<td>" .$rowtimeslots["time_slot_name"]. "</td>";
			echo "<td>" .$rowvolunteertimes["task_id"]. "</td>";
			echo "<td>" .$rowvolunteertimes["description"]. "</td>";
			echo "<td><a href=delete.php?delete=".$rowvolunteertimes['time_id'].">Remove</a></td>";
			
			break;	
			
			
			
			
        }
	}
	
?>