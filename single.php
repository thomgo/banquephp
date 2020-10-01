<?php
require "model/accountModel.php";

if(!empty($_GET) && isset($_GET["id"])) {
  $id = htmlspecialchars($_GET["id"]);
  $account = get_single_accounts($db, $id);
}

require "view/singleView.php";
