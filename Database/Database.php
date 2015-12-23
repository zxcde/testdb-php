<?php
class Database{
  //http://php.net/manual/en/pdo.constants.php
  public static function getDbh(){
    $url = "mysql:host=localhost;dbname=card_management;charset=utf8";
    $username = "root";
    $password = "abc13579";
    $dbh = new PDO($url, $username, $password);
    return $dbh;
  }
}
?>
