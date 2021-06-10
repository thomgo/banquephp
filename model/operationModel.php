<?php
require_once "model.php";

class OperationModel extends Model {
  // Register a new operation in database
  public function addOperation(Operation $operation, int $accountId) {
    $query = $this->db->prepare(
      "INSERT INTO Operation(operation_type, amount, registered, account_id)
      VALUES(:operation_type, :amount, NOW(), :account_id)"
    );
    $result = $query->execute([
      "operation_type" => $operation->getOperation_type(),
      "amount" => $operation->getOperation_amount(),
      "account_id" => $accountId
    ]);
    return $result;
  }

  public function makeOperation(Operation $operation, Account $account) {
    try {
      $this->db->beginTransaction();
      $this->addOperation($operation, $account->getId());
      $accountModel = new AccountModel();
      $accountModel->updateAccountAmount($account);
      $this->db->commit();
      return true;
    } 
    catch (PDOException $e) {
      $this->db->rollBack();
      echo $e->getMessage();
      return false;
    }
  }
}

