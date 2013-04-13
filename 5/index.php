<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <form action="" method="POST" id="formReg">
            <input type="text" id="email" name="email">
            <input type="password" id="pass" name="pass">
            <input type="password" id="pass2">
            <button type="submit" id="subm">Submit</button>
        </form>
		<?php
		if($_SERVER["REQUEST_METHOD"] === "POST"){
			require 'DB_reg.php';
			$db->regNewUser($_POST["email"],$_POST["pass"]);
		}
		?>
    </body>
</html>
