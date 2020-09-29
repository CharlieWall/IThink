<html>
<?php
include_once('header.php');
?>
<main>
<?php
if (isset($_GET['link']))
{
$link = $_GET['link'];
if ($link == 'post')
{
	include_once('post.php');
}
else if ($link == 'view')
{
	include_once('view.php');
}
}
else
{
	include_once('view.php');
}
?>
</main>
</body>
</html>