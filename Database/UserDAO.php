<?php
include("Database.php");
class UserDAO{
  public static function getAllUser($limit, $offset){
    $dbh = Database::getDbh();

    $sql = "select * FROM sysuser ";
    if($limit>=0 && $offset>=0){
      $sql.="limit ? offset ?";
    }
    $stmt = $dbh->prepare($sql) or die();
    if($limit>=0 && $offset>=0){
      $stmt->bindParam(1, $limit, PDO::PARAM_INT);
      $stmt->bindParam(2, $offset, PDO::PARAM_INT);
    }
    $stmt->execute();
    $result = $stmt->fetchAll();

    $dbh = null;
    return $result;
  }

  public static function insertUser($username, $password, $created_date, $role){
    $dbh = Database::getDbh();

    $sql = "insert into sysuser(username, password, created_date, role) "
          ."values (?,?,?,?)";
    $stmt = $dbh->prepare($sql) or die();
    $stmt->execute(array($username, $password, $created_date, $role));
    $result = $dbh->lastInsertId();

    $dbh = null;
    return $result;
  }

  public static function updateUser($userid, $username, $password, $role){
    $dbh = Database::getDbh();

    $sql = "update sysuser set username = ?, password = ?, role = ? where userid = ? ";
    $stmt = $dbh->prepare($sql) or die();
    $stmt->bindParam(1, $username, PDO::PARAM_STR);
    $stmt->bindParam(2, $password, PDO::PARAM_STR);
    $stmt->bindParam(3, $role, PDO::PARAM_STR);
    $stmt->bindParam(4, $userid, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();

    $dbh = null;
    return $result;
  }

  public static function deleteUser($userid){
    $dbh = Database::getDbh();

    $sql = "delete from sysuser where userid = ? ";
    $stmt = $dbh->prepare($sql) or die();
    $stmt->bindParam(1, $userid, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();

    $dbh = null;
    return $result;
  }
}
?>
