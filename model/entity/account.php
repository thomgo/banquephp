<?php

require_once "model/entity/entity.php";

class Account extends Entity {
  protected int $amount;
  protected string $opening_date;
  protected string $account_type;
  protected ?Operation $last_operation;
  protected array $operations = [];

  public function __construct(array $data = null) {
    if($data) {
      $this->hydrate($data);
    }
  }

  public function getAmount():int
  {
       return $this->amount;
  }


  public function setAmount(int $amount):Account
  {
      $this->amount = $amount;

      return $this;
  }

  public function getOpening_date(): string
  {
       return $this->opening_date;
  }


  public function setOpening_date(string $opening_date):Account
  {
      $this->opening_date = $opening_date;

      return $this;
  }

  public function getAccount_type():string
  {
       return $this->account_type;
  }


  public function setAccount_type(string $account_type):Account
  {
      $this->account_type = $account_type;

      return $this;
  }

  public function getLast_operation():?Operation
  {
       return $this->last_operation;
  }


  public function setLast_operation(Operation $last_operation):Account
  {
      $this->last_operation = $last_operation;

      return $this;
  }

  public function getOperations():array
  {
       return $this->operations;
  }


  public function addOperation(Operation $operation):Account
  {
      array_push($this->operations, $operation);

      return $this;
  }

}
