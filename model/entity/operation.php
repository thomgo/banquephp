<?php

require_once "model/entity/entity.php";

class Operation extends Entity {
  protected string $operation_type;
  protected float $operation_amount;
  protected string $registered;
  protected ?string $label;

  public function __construct(array $data = null) {
    if($data) {
      $this->hydrate($data);
    }
  }

  public function getOperation_type(): string
   {
       return $this->operation_type;
   }


  public function setOperation_type(string $operation_type): Operation
  {
      $this->operation_type = $operation_type;

      return $this;
  }

  // Getter now adding a minus sign if necessary since getter are made to deal with data formating
  public function getOperation_amount(): float
  {
      if($this->operation_type === "débit" && $this->operation_amount > 0) {
        return -$this->operation_amount;
      }
       return $this->operation_amount;
  }


  public function setOperation_amount(float $operation_amount):Operation
  {
      $this->operation_amount = $operation_amount;

      return $this;
  }

  public function getRegistered():string
  {
       return $this->registered;
  }


  public function setRegistered(string $registered):Operation
  {
      $this->registered = $registered;

      return $this;
  }

  public function getLabel():?string
  {
       return $this->label;
  }


  public function setLabel(?string $label):Operation
  {
      $this->label = $label;

      return $this;
  }

}
