<?php
require "model/entity/user.php";
require "model/entity/account.php";
require "model/entity/operation.php";
require "model/accountModel.php";
require "model/operationModel.php";

// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

$accountModel = new AccountModel();

if(!empty($_POST) && isset($_POST["operation"])) {
  // Check for empty values (array filter removes empty values from array)
  $empty_values = array_filter($_POST);
  // If some values are empty
  if(count($empty_values) !== count($_POST)) {
    $error = "Tous les champs doivent être remplis";
  }
  else {
    // Try to find the account selected in the form
    $account = $accountModel->getAccountAmount($_POST["account_id"], $_SESSION["user"]);
    // If an account has been found
    if($account) {
      $operation = new Operation($_POST);
      $account->updateAmount($operation);
      // Register the operation in DB
      $operationModel = new OperationModel();
      $result = $operationModel->makeOperation($operation, $account);
      // If the operation and the update has successfully been registered
      if($result) {
        $success = "Votre opération a bien été enregistrée";
      }
      else {
        $error = "Votre opération n'a pas pu être réalisée";
      }
    }
  }
}

// Get all the accounts for one user
$accountList = $accountModel->getAccountList($_SESSION["user"]);

require "view/operationView.php";
