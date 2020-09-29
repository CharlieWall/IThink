<html>
<head>
<title>Wall</title>
<link rel = "stylesheet" href = "styles\style.css">
<script src = "httpsL//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
</script>
</head>
<body>
<div class = "b">
<button>Refresh</button>
<div id = "user">
</div>
<div id = "status" class = "status">
<?php
require('viewprocess.php');
$newView = new view();
$newView->viewConnect();
?>
</div>
</div>
</body>
</html>