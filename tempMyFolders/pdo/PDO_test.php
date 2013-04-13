<?php
class user{
    public $id;
    public $name;
    public $email;
    function nameToUpperCase(){
        return strtoupper($this->name);
    }
}
try{
$conn = new PDO('sqlite2:users.db');
$user = new user();
/*$name = "O'Brian";
$name = $conn->quote($name);
$sql = "INSERT INTO user(name,email) VALUES ($name,'mr@brian.uk')";
$res = $conn->exec($sql);
echo $res;*/
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = 3;
$stmt = $conn->prepare("SELECT * FROM user WHERE id= :id");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
while($row = $stmt->fetch()){
    echo $row['name'];
}
//$stmt = $conn->query($sql);
//$res = $stmt->setFetchMode(PDO::FETCH_INTO,$res);
//echo $res->nameToUpperCase();
/*$res = $stmt->fetchAll(PDO::FETCH_CLASS,'user');
foreach ($res as $user) {
    echo $user->nameToUpperCase();
}*/
/*echo $res->name;
$res = $stmt->fetch(PDO::FETCH_ASSOC);
foreach ($res as $k=>$v) {
    echo $v.":".$k."<br>";
}*/
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
