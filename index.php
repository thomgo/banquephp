<?php
require "model/accountModel.php";

session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

$accounts = get_accounts($db);

require "view/indexView.php";
?>
