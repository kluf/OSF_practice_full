<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'DB_reg.php';
        $url = $_SERVER["REQUEST_URI"];
        $db->activateUser($url);
        echo $url;
        ?>
    </body>
</html>
