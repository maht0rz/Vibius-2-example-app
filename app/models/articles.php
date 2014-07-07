<?php

namespace vibius\app\models;

class articles{

  protected $table = 'articles';

  public $sort = 'desc';
  public $limit = 5;
  public $order = 'id';

  function __construct(){

    $db = new \vibius\core\Db();
    $this->db = $db->connect();
    $this->cache = new \vibius\core\Cache();
  }

  public function getAll(){

    $query = "SELECT * FROM $this->table ORDER BY $this->order $this->sort LIMIT 0,$this->limit";

    $q = $this->db->prepare($query);
    $q->execute();

    $results = $q->fetchAll();

    return $results;

  }

  public function getByID($id){

    if(!$this->cache->exists('article'.(int)$id)){
      $query = "SELECT * FROM $this->table WHERE id=:id";

      $q = $this->db->prepare($query);
      $q->execute(array(
        ':id' => $id
      ));

      $results = $q->fetchAll();
      $this->cache->createVars('3600','article'.(int)$id,$results);

    }

    $results = $this->cache->getVars('article'.(int)$id);
    return $results;

  }

  public function insert($title,$text,$author){

    $query = "INSERT INTO $this->table (title,text,author) VALUES (:title,:txt,:author)";


    $q = $this->db->prepare($query);
    $q->execute(array(
      ':title' => $title,
      ':txt' => $text,
      ':author' => $author
    ));

  }

  public function deleteByID($id){

    $query = "DELETE FROM $this->table WHERE id=:id";

    $q = $this->db->prepare($query);
    $q->execute(array(
      ':id' => $id,
    ));

  }

}
