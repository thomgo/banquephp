<?php

require_once "model/entity/entity.php";

class Account extends Entity {
  const ACCOUNT_TYPES = ["Compte courant", "Livret A", "PEL", "PEA", "PERP"];
  const MIN_AMOUNT = 50;

  protected float $amount;
  protected string $opening_date;
  protected string $account_type;
  protected ?Operation $last_operation = null;
  protected array $operations = [];
  protected User $user;

  public function __construct(array $data = null) {
    if($data) {
      $this->hydrate($data);
    }
  }

  public function getAmount():float
  {
       return $this->amount;
  }


  public function setAmount(float $amount):Account
  {
    // check if amount reaches the requested minimum
    // Note : using php filter validate float causes the local server to shutdown if filter does not validate the float value
    if($amount > self::MIN_AMOUNT) {
      $this->amount = $amount;
      return $this;
    }
    throw new Exception("<li>Montant minimum : 50 euros</li>");
  }

  public function updateAmount(Operation $operation) {
    $newAmount = $this->getAmount() + $operation->getOperation_amount();
    $this->setAmount($newAmount);
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
    // If the account type is not in the authorized list throw exception
    if(in_array($account_type, self::ACCOUNT_TYPES)) {
      $this->account_type = $account_type;
      return $this;
    }
    throw new Exception("<li>Type de compte non reconnu : $account_type</li>");

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

  public function getUser():User
  {
       return $this->user;
  }


  public function setUser(User $user):Account
  {
      $this->user = $user;

      return $this;
  }

}
