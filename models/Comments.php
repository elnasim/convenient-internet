<?php

require_once 'components/Db.php';

class Comments
{

  public function all()
  {
    $sql   = "SELECT * FROM comments";
    $query = Db::$db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function add($data)
  {
    $sql   = "INSERT INTO comments (name, email, text) VALUES (:name, :email, :text)";
    $query = Db::$db->prepare($sql);
    $query->execute($data);

    return $this->all();
  }
}
