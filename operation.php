<?php
require "model/accountModel.php";
require "model/operationModel.php";

// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

if(!empty($_POST) && isset($_POST["operation"])) {
  // Check for empty values (array filter removes empty values from array)
  $empty_values = array_filter($_POST);
  // If some values are empty
  if(count($empty_values) !== count($_POST)) {
    $error = "Tous les champs doivent être remplis";
  }
  else {
    $account = get_only_account($db, $_POST["account_id"]);
    // If an account has been found
    if($account) {
      if($_POST["operation_type"] === "débit") {
        $account["amount"] = floatval($account["amount"]) - floatval($_POST["amount"]);
        $_POST["amount"] = "-" . $_POST["amount"];
      }
      else {
        $account["amount"] = floatval($account["amount"]) + floatval($_POST["amount"]);
      }
      $new_op = new_operation($db, $_POST);
      if($new_op) {
        $result = update_account_amount($db, $account);
        if($result) {
          $success = "Votre opération a bien été enregistrée";
        }
      }
    }
  }
}

// Get all the accounts types for one user
$account_list = get_account_list($db, $_SESSION["user"]);

require "view/operationView.php";
