<?php
class view
{
	function viewConnect()
	{
		require_once('settings.php');
		if (!$connect)
		{
			echo "Could not connect to database";
		}
		else
		{
			$this->viewPost($connect, $table);
		}
	}
	
	function getPost($table)
	{
		$query = "SELECT * FROM  $table";
		return $query;
	}
	
	function viewPost($connect, $table)
	{
		$query = $this->getPost($table);
		$status = mysqli_query($connect, $query);
		
		if(!$status)
		{
			echo "There is an error in $query";
		}
		else
		{
			while($row = mysqli_fetch_assoc($status))
			{
				echo "<div class = 'title'>", $row["post_title"], "</div>";
				echo "<div class = 'date'>", $row["post_date"], "</div>";
				echo "<div class = 'post'>", $row["post_status"], "</div>";
				echo "<div class = 'hashtags'>", $row["post_hashtags"], "</div>";
				"<br>";
				//echo "<div class = 'likes'>", $row["post_likes"], "</div>";
			}
			
			mysqli_free_result($status);
		}
		
		mysqli_close($connect);
	}
}
?>