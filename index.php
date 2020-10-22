<?php
require "model/entity/user.php";
require "model/accountModel.php";
// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

// Get all the accounts with the last operation
$accountModel = new AccountModel();
$accounts = $accountModel->getAccounts($db, $_SESSION["user"]);

require "view/indexView.php";
?>
