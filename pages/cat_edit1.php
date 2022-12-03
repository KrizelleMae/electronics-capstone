<?php
include('../includes/connection.php');
			$id = $_POST['id'];
			$c = $_POST['category']; 
	   	
		
	 			$query = 'UPDATE category set CNAME ="'.$c.'" WHERE
					CATEGORY_ID ="'.$id.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("You've Update Category Successfully.");
			window.location = "custom.php";
		</script>