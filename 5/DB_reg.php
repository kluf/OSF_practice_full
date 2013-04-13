<?php
class DB_reg {
    private $db;
    function __construct() {
        try{
        $this->db = new PDO("mysql:host=mysql.hostinger.com.ua;dbname=u371190354_users",'u371190354_roter','asdf:LKJ');
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function regNewUser($email,$pass,$salt = "alskdjf",$val_url="chek.php?id="){
	$val_url .= md5(uniqid("",true));
        try{
            $stmt = $this->db->prepare("CALL add_user1('$email','$pass','$salt','$val_url')");
            $stmt->execute();
            $message = "<html><head><title>Ğåºñòàö³ÿ</title></head><body><p>please go to this link, if you are register <br><a href='kluf.p.ht/5/".$val_url."'>kluf.p.ht/5/".$val_url."</a></p></body></html>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: Site register <metal_god@ovi.com>' . "\r\n";
            mail("metal_god@ovi.com", "registration", $message,$headers);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function activateUser($url){
    $arr = array();
    $arr = explode("/", $url);
    $url = $arr[count($arr)-1];
    try{
        $stmt = $this->db->prepare("CALL validate_user1('$url')");
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    }
}
$db = new DB_reg();
?>
