<?php 

require_once 'lib.inc.php';
$db = "./db/";
$dayFile = $db . date("Ymd");
initDb($db);
initDayFile($db, $dayFile);

if(isset($_POST)){
	serializePost($_POST, $dayFile, $db);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>YOLog</title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width" content="initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>YOLog</h1>
	</header>
	<nav>
		<form method="post" action="index.php">
			<header>
				<input type="text" name="head" autofocus>
			</header>
			<textarea name="content"></textarea>
			<button type="submit">Poster</button>
		</form>
	</nav>
	<main>
		<?php 
			displayPosts(date("Ymd"), $db);
		?>
	</main>
</body>
</html>