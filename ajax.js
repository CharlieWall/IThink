$(document).ready(function()
{
	var count = 1;
	$("button").click(function()
	{
		count = count++;
		$("#status").load("viewprocess.php");
	})
});