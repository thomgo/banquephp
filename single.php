<?php
require "data/acounts.php";

if(!empty($_GET) && isset($_GET["id"])) {
  $pos = htmlspecialchars($_GET["id"]);
  $account = get_accounts()[$pos];
}

require "view/singleView.php";
