<?php
class post
{
	/**
	* Connects to the database if connection is successful
	*
	* @param string $table name of the table
	* @param string $connect mysqli_connect statement
	* 
	* @author Charlie Wall
	*/ 
	function postConnect()
	{
		require_once('settings.php');
		if (!$connect)
		{
			echo "Could not connect to database";
		}
		else
		{
			$this->storeDatabase($connect, $table);
		}
	}
	
	function createStatement($connect, $table)
	{
		$statement = $connect->prepare("INSERT INTO $table(post_title, post_status, post_hashtags, post_date, post_likes) VALUES (?, ?, ?, ?, ?)");
		$statement->bind_param("ssssi", $this->title, $this->status, $this->hashtags, $this->postdate, $this->likes);
		return $statement;
	}
	
	function setPost($connect, $table)
	{
		$statement = $this->createStatement($connect, $table);
		$count = 0;
		
		date_default_timezone_set('Pacific/Auckland');
	
		$this->title = $_POST["title"];
		$this->status = $_POST["status"];
		$this->hashtags = $_POST["hashtags"];
		$this->postdate = date('y/m/d h:i a', time());
		$this->likes = $count;
		
		return $statement;
	}
	
	function storeDatabase($connect, $table)
	{
		$statement = $this->setPost($connect, $table);
		if(!$statement)
		{
			echo $statement;
			echo "Could not store in database";
		}
		else
		{
			$statement->execute();
			header("Location: index.php?post=success");
			$statement->close();
			$connect->close();
			exit();
			
		}
		
	}
}

$newConnect = new connect();
$newConnect->connect();
echo $newConnect;
//$newPost = new post();
//$newPost->postConnect();
?>