<?php

abstract class Entity {
  protected ?int $id;

  public function getId():int
  {
      return $this->id;
  }


  public function setId(int $id):User
  {
      $this->id = $id;

      return $this;
  }

  protected function hydrate(array $data) {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if(method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}

 ?>
