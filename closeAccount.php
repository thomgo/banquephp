<?php
require "model/entity/User.php";
require "model/accountModel.php";

session_start();

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $accountModel = new AccountModel();
    $result = $accountModel->deleteAccount($_GET["id"], $_SESSION["user"]);
}

header("Location: index.php");
?>