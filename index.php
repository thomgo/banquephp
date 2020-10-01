<?php
require "model/connexion.php";
require "model/accountModel.php";

$accounts = get_accounts($db);

require "view/indexView.php";
?>
