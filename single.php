<?php
require "model/accountModel.php";

session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

if(!empty($_GET) && isset($_GET["id"])) {
  $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
  $operations = get_single_accounts($db, $id);
  $account = $operations[0];
  if(!$account || $account["user_id"] !== $_SESSION["user"]["id"]) {
    $error ="Nous avons rencontré un problème, aucun compte ne correspond à votre demande";
  }
}

require "view/singleView.php";
