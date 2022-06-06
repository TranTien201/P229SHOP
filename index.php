<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>P229 Shop</title>
</head>
<body>
	
	<h1>
		<?php
			spl_autoload_register(function($class){
				include_once 'system/libs/'.$class.'.php';
			});
			include_once 'apps/config/config.php';

			$main = new main();

		?>
	</h1>
	
</body>
</html>
