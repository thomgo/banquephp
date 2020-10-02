<?php
require "model/accountModel.php";

session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

$accounts = get_accounts($db, $_SESSION["user"]);

require "view/indexView.php";
?>
